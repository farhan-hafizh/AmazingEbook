<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('profile',
            [
                'title' => "Profile",
                'user' => Auth::user(),
                'categories' => Category::all()
            ]
        );
    }
    public function edit(Request $request){
        $user=Auth::user();
        
        $user->firstname=$request->input('firstname');
        $user->middlename=$request->input('middlename');
        $user->lastname=$request->input('lastname');
        $user->email=$request->input('email');
        $user->gender=$request->input('gender');
        $user->email=$request->input('email');

        if($request->input('password')!=null)
            $user->password=bcrypt($request->input('password'));

        if($request->file('picture')!=null){
            unlink(public_path("profile/img/".$user->picture));
            $picture=$request->file('picture');
            $pictureName=time()."_".$picture->getClientOriginalName();
    
            $picture->move(public_path('profile/img'), $pictureName);
            $user->picture=$pictureName;
        }
        $user->save();
        return back();
    }
}
