<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;

class UserController extends Controller
{
    //

    public function profile()
    {
        return view('profile', array('user' => Auth::user()));
    }
    public function update_avatar(Request $request)
    {
        
        
        $avatar = $request->file('avatar');
        $filename = time() . "." . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename));
        
        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();

        return view('profile', array('user' => Auth::user()));
    }

    public function profilebg(Request $request)
    {
        $user_bg = User::find($request->id);
        $user_bg->bg_image = $request->a1;
        $user_bg->save();
    }

}