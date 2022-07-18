<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // logout
    public function logout()
    {
        Auth::logout();
        return Redirect('/');
    }

    public function Forgot_Password(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!empty($user)) {

            $subject = "Email and Password";
            $message = url('confirm', base64_encode($user->id));

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: FacePop PHP/";

            mail($request->email, $subject, $message);
        } else {
            return redirect('forgot')->with('message', 'email doesnot exist');
        }

        return redirect('/');
    }

    public function Confirm_Password($id)
    {
        return view('auth.confirmpassword', compact('id'));
    }

    public function Update_Password(Request $request)
    {

        $this->validate($request, [
            // 'newpassword'      => 'required',
            'confirmpassword' => 'required',
            'newpassword' => 'required_with:newpassword|same:confirmpassword',
            // 'confirmpassword' => 'required',

        ]);

        $pass = User::find($request->user_id);
        $pass->password = Hash::make($request->confirmpassword);
        $pass->save();
        return redirect('/');
    }

    //upload image
    public function upload_profile(Request $request)
    {
        if ($request->has('profile_img')) {
            $file = $request->file('profile_img');
            $file_name = time() . '.profile_' . $file->getClientOriginalName();
            $location = app()->basePath('public/assets/imgs');
            $file->move($location, $file_name);
            // $image = 'public/assets/imgs/'. $file_name;
        }
        User::where('id', Auth::user()->id)->update(['image' => $file_name]);
        echo asset('public/assets/imgs') . '/' . $file_name;
    }
}
