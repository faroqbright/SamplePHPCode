<?php

namespace App\Http\Controllers;

use App\Rake;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function dashboard()
    {
        $adminIds = User::whereNotIn('user_type', ['admin'])->pluck('id')->toArray();
        $AppUsersCount = User::whereNotIn('user_type', ['admin'])->count();
        $submittedRakesCount = Rake::whereNotIn('user_id', $adminIds)->count();
        $admin_ids = User::where('user_type', 'admin')->pluck('id')->toArray();
        $dailyRake = Rake::whereIn('user_id', $admin_ids)->latest()->first();
        $dailyLeader = User::where('is_daily_leader', 1)->pluck('username')->first();

        return view('home.dashboard', compact('AppUsersCount', 'submittedRakesCount', 'dailyRake', 'dailyLeader'));
    }

    public function profile()
    {
        return view('home.profile', ['user'=> Auth::user()]);
    }

    public function profileUpdate(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/profile_image'), $imageName);

            $data['image'] = 'uploads/profile_image/'.$imageName;
        }

        Auth::user()->update($data);
        return back()->with('success', 'Profile updated successfully');
    }

    public function changePassword()
    {
        return view('home.changePassword');
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'confirmpassword' => 'required',
            'newpassword' => 'required_with:newpassword|same:confirmpassword',
            // 'confirmpassword' => 'required',

        ]);

        if ((Hash::check($request->oldpassword, Auth::user()->password))) {

            Auth::user()->update(['password' => Hash::make($request->confirmpassword)]);
            return back()->with('success', 'Password changed successfully');
        }
    }
}
