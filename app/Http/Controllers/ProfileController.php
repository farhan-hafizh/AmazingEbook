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
        $rules=[
            'firstname'=>'required|alpha|max:25',
            'middlename'=>'nullable|alpha|max:25',
            'lastname'=>'required|alpha|max:25',
            'email'=>'required|email',
            'gender'=>'required',
            'password'=> 'required|min:8|regex:/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/',
            'picture'=>'required|image'
        ];
        $validated=$request->validate($rules);
        $user->firstname=$validated['firstname'];
        if($validated['middlename']!=null)
            $user->middlename=$validated['middlename'];
        $user->lastname=$validated['lastname'];
        $user->email=$validated['email'];
        $user->gender=$validated['gender'];
        $user->email=$validated['email'];
        $user->password=bcrypt($validated['password']);

        unlink(public_path("profile/img/".$user->picture));
        $picture=$request->file('picture');
        $pictureName=time()."_".$picture->getClientOriginalName();
    
        $picture->move(public_path('profile/img'), $pictureName);
        $user->picture=$pictureName;
        $user->save();
        return back();
    }
}
