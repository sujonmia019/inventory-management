<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //Profile
    public function index(){
        $user = Auth::user();
        return view('pages.profile.form', compact('user'));
    }

    // Profile Update 
    public function update(Request $request){
        $userId = Auth::user();

        $request->validate([
            'avatar'    => 'nullable|image|mimes:png,jpg,jpeg',
            'full_name' => 'nullable|min:4',
            'email'     => 'nullable|unique:users,email,'.$userId->id,
            'phone'     => 'nullable|unique:users,phone,'.$userId->id,
        ]);

        $userId->update([
            'name'   => $request->full_name,
            'email'  => $request->email,
            'phone'  => $request->phone,
            'gender' => $request->gender
        ]);

        if ($request->hasFile('avatar')) {
            $userId->addMedia($request->avatar)->toMediaCollection('avatar');
        }

        $notification = array(
            'message'   =>  'Profile Updated successfull',
            'alert-type'    =>  'success'
        );

        return back()->with($notification);

    }

    // Password Change 
    public function passwordChange(){
        $user = Auth::user();
        return view('pages.profile.password', compact('user'));
    }

    // Password Update 
    public function passwordChangeUpdate(Request $request, $id){

        $user = Auth::user();

        $request->validate([
            'current_password'  =>'required|min:8',
            'new_password'      =>'required|min:8',
            'confirm_password'  =>'required_with:new_password|same:new_password'
        ]);
        
        if (Hash::check($request->current_password, $user->password) === true) {
            if(!Hash::check($request->new_password, $user->password)){
                User::findOrFail($id)->update([
                    'password'  =>  Hash::make($request->new_password)
                ]);
                Auth::logout();

                return redirect()->route('login');
            }
            else{
                $notification = array(
                    'message'       =>  'New password can not be same as old password',
                    'alert-type'    =>  'error'
                );
        
                return back()->with($notification);
            }
        } else {
            $notification = array(
                'message'       =>  'Current password not match',
                'alert-type'    =>  'error'
            );
    
            return back()->with($notification);
        }

    }
}
