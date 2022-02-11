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
            'firstname'=>'required|alpha|max:25',
            'middlename'=>'nullable|alpha|max:25',
            'lastname'=>'required|alpha|max:25',
            'email'=>'required|email',
            'gender'=>'required',
            'password'=> 'required|min:8|regex:/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/',
            'picture'=>'required|image'
        ];
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
