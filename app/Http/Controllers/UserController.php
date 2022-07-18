<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('user_type', 'app_user')->orderBy('created_at', 'DESC')->get();
        return view('app-users.index', compact('users'));
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }

    public function dailyLeaderToggle(Request $request, User $user)
    {
        $user->update(['is_daily_leader' => $user->is_daily_leader ? 0 : 1]);
        User::where('id', '!=', $user->id)->update(['is_daily_leader' => 0]);
        return back();
    }
    
    public function edit(Request $request, User $user)
    {
        // echo $user;
        return view('app-users.edit', compact('user'));
    }
    
    public function userStore(Request $request, User $user)
    {
        $check_status = User::where('email',$request->email)->first();
        if(empty($check_status)){
            
            $data = $request->only(['username', 'link', 'address','email','phone']);
    
            if($request->has('profile_image'))
            {
                $file = $request->file('profile_image');
                $file_name = time().$file->getClientOriginalName();
                $location = 'uploads/profile_image/';
                $file->move(public_path($location), $file_name);
    
                $data['image'] = $location . $file_name;
            }
    
            // \Auth::user()->update($data);
            
            User::create($data);
    
            return back()->with('success', 'User created successfully');
        }else{
            return back()->with('success', 'Email already save in DB.');
        }
    }
    
    public function userUpdate(Request $request, User $user)
    {
        $data = $request->only(['username', 'link', 'address','email','phone']);

        if($request->has('profile_image'))
        {
            $file = $request->file('profile_image');
            $file_name = time().$file->getClientOriginalName();
            $location = 'uploads/profile_image/';
            $file->move(public_path($location), $file_name);

            $data['image'] = $location . $file_name;
        }

        $user->update($data);
        
        return back()->with('success', 'User updated successfully');
    }
    
    
    
}
