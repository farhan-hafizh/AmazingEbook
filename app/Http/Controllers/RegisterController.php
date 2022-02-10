<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register',[
            'title' => 'Register'
        ]);
    }
    public function register(Request $request){
        $rules=[
            'firstname'=>'required',
            'middlename'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'gender'=>'required',
            'role'=>'required',
            'password'=> 'required',
            'picture'=>'required|image'
        ];

        // $request->picture=$pictureName;
        // dd($request);
        $validated=$request->validate($rules);
        $picture=$request->file('picture');
        $pictureName=time()."_".$picture->getClientOriginalName();

        $picture->move(public_path('profile/img'), $pictureName);

        $validated['password']=bcrypt($request->password);
        $validated['picture']=$pictureName;
        // dd($validated);
        User::create($validated);

        return redirect('/login');
    }
}
