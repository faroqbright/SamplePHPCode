<?php

namespace App\Http\Controllers;

use App\Rake;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use DB;

class RakeController extends Controller
{
    public function userRakes()
    {
        $user_ids = User::where('user_type', 'app_user')->pluck('id')->toArray();
        $rakes = Rake::with('user')->whereIn('user_id', $user_ids)->latest()->get();
        return view('user-rakes.index', compact('rakes'));
    }

    public function dailyRakes()
    {
        $admin_ids = User::where('user_type', 'admin')->pluck('id')->toArray();
        $rakes = Rake::with('user')->whereIn('user_id', $admin_ids)->latest()->get();
        return view('daily-rakes.index', compact('rakes'));
    }

    public function dailyRakeCreate(Request $request)
    {
        $data = $request->validate([
            'text' => 'required|string',
            'rake_points' => 'required',
            //'file' => 'required',
        ]);

        

        if($request->hasFile('file')) {
            
            $imageExtensions = array('jpg', 'JPG', 'png' ,'PNG' ,'jpeg' ,'JPEG');
            $videoExtensions = array("mov", "mp4", "3gp", "ogg");
            
            $file = $request->file;
            $extension = $file->getClientOriginalExtension();
            $file_name = time(). '.' .$extension;
            $file->move(public_path('uploads/rake/'), $file_name);

            $data['file'] = 'uploads/rake/' . $file_name;

            if(in_array($extension, $imageExtensions)) {
                $data['file_type'] = 'image';
            }

            if(in_array($extension, $videoExtensions)) {
                $data['file_type'] = 'video';
            }
        }

        $rake = new Rake($data);
        Auth::user()->rakes()->save($rake);
        
        $title = "Today Rake";
        $body = $request->text;
        
        $user_tokens = DB::table('users')->select('device_token')->where('user_type','app_user')->get();
        
        for ($i=0; $i < count($user_tokens) ; $i++)
        {

            if(empty($user_tokens[$i]->device_token))
            {

            }
            else
            {
                $tokens[] = $user_tokens[$i]->device_token;
                // $this->send_push_notification($title,$body,$tokens);
            }
            
        }
        
        $this->send_push_notification($title,$body,$tokens);
        
        return back()->with('success', 'Rake created successfully');
    }

    public function userRakeShow(Request $request, Rake $rake)
    {
        return view('user-rakes.show', compact('rake'));
    }

    public function dailyRakeShow(Request $request, Rake $rake)
    {
        return view('daily-rakes.show', compact('rake'));
    }

    public function destroy(Rake $rake)
    {
        $rake->delete();
        return back()->with('success', 'Rake deleted successfully');
    }
    
    
    
    
    public function send_push_notification($title , $body ,$tokens )
    {

        // echo $title;
        // print_r($tokens);
        // die;

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );


        
        //Custom data to be sent with the push
        $data = array
        (
            'message'      => 'here is a message. message',
            'title'        => $title,
            'body'         => $body,
            'smallIcon'    => 'small_icon',
            'some data'    => 'Some Data',
            'Another Data' => 'Another Data'
        );

        //This array contains, the token and the notification. The 'to' attribute stores the token.
        $arrayToSend = array(
                             'registration_ids' => $tokens,
                             'notification' => $data,
                             'priority'=>'high'
                              );



        //Generating JSON encoded string form the above array.
        $json = json_encode($arrayToSend);
        //Setup headers:
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        
        $headers[] = 'Authorization: key= AAAAMVOXUUE:APA91bEQ_3JFr0yTgoDv7sUDjr-0ENVE64SdYJduGEDzsJvoV6qjLifbn_4bhT4Dh3p_XQH-3QHZKeqScn5L_TMnJT7AZ7owdL8n7BAp3ay-Yfz96bCus2lg6de2WODB9GXL-TDWPQBm';


        //Setup curl, add headers and post parameters.
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);       

        //Send the request
        $response = curl_exec($ch);

        //Close request
        curl_close($ch);
        return $response;

        // echo $response;

    }




}
