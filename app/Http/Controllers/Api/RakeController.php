<?php

namespace App\Http\Controllers\Api;

use App\Rake;
use App\User;
use App\Level;
use App\Point;
use App\RakeLike;
use App\ShareRake;
use App\RakeComment;
use App\FriendRequest;
use App\Traits\Validation;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
Use DB;


class RakeController extends Controller
{
    use ApiResponser;
    use Validation;

    public function index(Request $request)
    {
        $rakes = Rake::with('user')->withCount('likes', 'comments')->latest()->paginate(10);

        if(!$rakes->count()) {
            return $this->error('No rake found', 200);
        }

        return $this->success($rakes, "Successfully", 200);
    }

    public function myRakes(Request $request)
    {
        $pluck=ShareRake::where('user_id',Auth::user()->id)->pluck('rake_id');
        
        $rakes = Rake::with('user')->withCount('likes', 'comments')->where('user_id', Auth::id());
        if(count($pluck)>0)
        {
            $rakes = $rakes->orwherein('id',$pluck);
        }
        $rakes = $rakes->latest()->paginate(10);
        
        if(!$rakes->count()) {
            return $this->error('No rake found', 200);
        }

        return $this->success($rakes, "Successfully", 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'text' => 'required|string',
            // 'file' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'file' => 'required',
            'file_type' => 'required|string',
        ]);

        if ($request->hasFile('file')) {
            $imageName = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('uploads/rake'), $imageName);

            $data = array_merge($data, ['file' => 'uploads/rake/' . $imageName]);
        }

        $points = $this->rakeCreatePoints();
        $data['rake_points']=$points;
        $rake = new Rake($data);

        \Auth::user()->rakes()->save($rake);


        
        
                  
/*************** Push Notification **************************/
    
    $u_id = Auth::user()->id;
    $u_username = Auth::user()->username;
    
    $title = "Rake Notification";
    $body = "You got ".$points." points.";
    
    $get_token = DB::table('users')->select('device_token')->where('id',$u_id)->first();

    if(empty($get_token->device_token))
    {

    }
    else
    {
        $tokens[] = $get_token->device_token;
        $this->send_push_notification($title,$body,$tokens);
    }
    
    
    // $ids = DB::select("select `sender_id` from `friend_requests` where receiver_id = $u_id ");
    
    // return $results = DB::table('friend_requests')
    //         ->join('users', 'friend_requests.sender_id', '=', 'users.id')
    //         ->join('users as users_1', 'friend_requests.receiver_id', '=', 'users_1.id')
    //         ->select('friend_requests.sender_id','users.device_token')
    //         ->where('friend_requests.receiver_id', $u_id)
    //         ->get();
    
    $title_1 = "Rake Notification";
    $body_1 = $u_username." add new rake and got " . $points ." points." ;
            
    $ids = DB::table('users')->join('friend_requests', 'users.id', '=', 'friend_requests.sender_id')
    ->select('users.device_token','friend_requests.sender_id')
    ->where('friend_requests.receiver_id', $u_id)
    ->get();
    // die;
    
    if($ids)
    {
        for ($i=0; $i < count($ids) ; $i++)
        {

            if(empty($ids[$i]->device_token))
            {

            }
            else
            {
                $tokens_1[] = $ids[$i]->device_token;
                $this->send_push_notification($title_1,$body_1,$tokens_1);
            }
            
        }
    }
    
    // print_r($abc);
    // die;



/***********************************************************/

        
        
        return $this->success(['points' => $points], 'Rake created successfully', 200);
    }

    public function show(Request $request, $rake)
    {
        $rake = Rake::where('id', $rake)->with('user')->first();
        return $this->success($rake, "Successfully", 200);
    }

    public function destroy(Request $request, Rake $rake)
    {
        $rake->delete();
        return $this->success(null, 'Rake deleted successfully', 200);
    }

    public function rakeLike(Request $request)
    {
        $like = RakeLike::withTrashed()
                ->where([['rake_id',$request->rake_id],['user_id', Auth::id()]])->first();

        if($like && $like->trashed()) {
            $like->restore();
            return $this->success(null, "Successfully", 200);
        }

        if($like) {
            return $this->error("Already like this rake", 400);
        }

        RakeLike::create(['rake_id' => $request->rake_id, 'user_id' => Auth::id()]);
        // $points = $this->rakeLikePoints();
        
        
/*************** Push Notification **************************/
    
    // $u_id = Auth::id();
    
    // $title = "Rake Notification";
    // $body = "You got ".$points." points.";
    
    // $get_token = DB::table('users')->select('device_token')->where('id',$u_id)->first();

    // if(empty($get_token->device_token))
    // {

    // }
    // else
    // {
    //     $tokens[] = $get_token->device_token;
    //     $this->send_push_notification($title,$body,$tokens);
    // }
    
    // print_r($abc);
    // die;



/***********************************************************/

        
        
        return $this->success(['points' => $points], "Successfully", 200);
    }

    public function unLikeRake(Request $request)
    {
        $like = RakeLike::where(['user_id'=> Auth::id(), 'rake_id' => $request->rake_id])->first();
        if ($like) {
            $like->delete();
        }
        return $this->success(null, 'Like deleted successfully', 200);
    }

    public function follow(Request $request)
    {
        $sender_id = $request->sender_id;
        $receiver_id = $request->receiver_id;
        if($sender_id == $receiver_id){
            return $this->error("Wrong Ids", 400);
        }else{
            $check_data = FriendRequest::where([['sender_id',$sender_id],['receiver_id',$receiver_id]])->first();
            if(empty($check_data)){
                $follow_data = [
                        'sender_id'=> $sender_id,
                        'receiver_id'=> $receiver_id
                    ];
                $inserted = FriendRequest::create($follow_data);
                
                 
/*************** Push Notification **************************/
    
    $get_username = DB::table('users')->select('username')->where('id',$sender_id)->first();
    // print_r($get_username);
    // die;
    $title = "Rake Notification";
    $body = $get_username->username." followed you";
    
    $get_token = DB::table('users')->select('device_token')->where('id',$receiver_id)->first();

    if(empty($get_token->device_token))
    {

    }
    else
    {
        $tokens[] = $get_token->device_token;
        $this->send_push_notification($title,$body,$tokens);
    }
    
    // print_r($abc);
    // die;



/***********************************************************/


                return $this->success($inserted->id, "Successfully", 200);
            }else{
                return $this->error("Already friend this user", 400);
            }
        }
    }

    public function unFollow(Request $request)
    {
        $sender_id = $request->sender_id;
        $receiver_id = $request->receiver_id;
        if($sender_id == $receiver_id){
            return $this->error("Wrong Ids", 400);
        }else{
            $check_data = FriendRequest::where([['sender_id',$sender_id],['receiver_id',$receiver_id]])->first();
            if(empty($check_data)){
                return $this->error("Not friend this user", 400);
            }else{
                $request_id = $check_data->id;
                $affectedRows = FriendRequest::where('id', $request_id)->delete();
                return $this->success([], "Successfully", 200);
            }
        }
    }

    public function getRakeComments(Rake $rake)
    {
        $comments = RakeComment::where('rake_id', $rake->id)->with('user:id,username,image')->get();
        return $this->success($comments, "Successfully", 200);
    }

    public function addRakeComment(Request $request)
    {
        $rake = Rake::where('id', $request->rake_id)->firstOrFail();
        $user = User::where('id', $request->user_id)->firstOrFail();

        $inserted = RakeComment::create($request->only(['rake_id', 'user_id', 'comment']));
        return $this->success(['comment_id' => $inserted->id], "Successfully", 200);
    }

    private function rakeCreatePoints()
    {
        $points = Point::where('event', 'Rake create')->first();
        $randomPoints = rand($points->min, $points->max);
        Auth::user()->update(['points' => Auth::user()->points + $randomPoints]);
        $this->maintainLevel();
        return $randomPoints;
    }

    private function rakeLikePoints()
    {
        $points = Point::where('event', 'Rake like')->first();
        $randomPoints = rand($points->min, $points->max);
        Auth::user()->update(['points' => Auth::user()->points + $randomPoints]);
        $this->maintainLevel();
        return $randomPoints;
    }

    private function maintainLevel()
    {
        $level = Level::where([['max', '>=', Auth::user()->points], ['min', '<=', Auth::user()->points]])->first();
        if ($level) {
            Auth::user()->update(['level_id' => $level->id]);
        }
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
    
    public function ShareRake(Request $request){
        $rake = Rake::where(['id'=>$request->rake_id])->first();
        $user=Auth::user();
        $data= new ShareRake;
        $data->user_id=$user->id;
        $data->rake_id=$request->rake_id;
        $data->save();
        User::where('id',$user->id)->update(['points'=> $user->points + $rake->rake_points]);
        
         return response()->json(['status' => 200, 'message' => 'data added successfully']);
        
    }
    
    
    
    public function shareRakeWithCreateRake(Request $request)
    {
        $data = $request->validate([
            'text' => 'required|string',
            // 'file' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'file' => 'required',
            'file_type' => 'required|string',
        ]);

        if ($request->hasFile('file')) {
            $imageName = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('uploads/rake'), $imageName);

            $data = array_merge($data, ['file' => 'uploads/rake/' . $imageName]);
        }
        
        $rake = Rake::where(['id'=>$request->rake_id])->first();
        // User::where('id',$user->id)->update(['points'=> $user->points + $rake->rake_points]);
        
        
        $points = $this->rakeCreatePoints();
        // $data['rake_points']=$points;
        $data['rake_points']=$rake->rake_points;
        $rake = new Rake($data);

        \Auth::user()->rakes()->save($rake);


        
        
                  
/*************** Push Notification **************************/
    
    $u_id = Auth::user()->id;
    $u_username = Auth::user()->username;
    
    $title = "Rake Notification";
    $body = "You got ".$points." points.";
    
    $get_token = DB::table('users')->select('device_token')->where('id',$u_id)->first();

    if(empty($get_token->device_token))
    {

    }
    else
    {
        $tokens[] = $get_token->device_token;
        $this->send_push_notification($title,$body,$tokens);
    }
    
    
    // $ids = DB::select("select `sender_id` from `friend_requests` where receiver_id = $u_id ");
    
    // return $results = DB::table('friend_requests')
    //         ->join('users', 'friend_requests.sender_id', '=', 'users.id')
    //         ->join('users as users_1', 'friend_requests.receiver_id', '=', 'users_1.id')
    //         ->select('friend_requests.sender_id','users.device_token')
    //         ->where('friend_requests.receiver_id', $u_id)
    //         ->get();
    
    $title_1 = "Rake Notification";
    $body_1 = $u_username." add new rake and got " . $points ." points." ;
            
    $ids = DB::table('users')->join('friend_requests', 'users.id', '=', 'friend_requests.sender_id')
    ->select('users.device_token','friend_requests.sender_id')
    ->where('friend_requests.receiver_id', $u_id)
    ->get();
    // die;
    
    if($ids)
    {
        for ($i=0; $i < count($ids) ; $i++)
        {

            if(empty($ids[$i]->device_token))
            {

            }
            else
            {
                $tokens_1[] = $ids[$i]->device_token;
                $this->send_push_notification($title_1,$body_1,$tokens_1);
            }
            
        }
    }
    
    // print_r($abc);
    // die;



/***********************************************************/

        
        
        return $this->success(['points' => $points], 'Rake created successfully', 200);
    }


}
