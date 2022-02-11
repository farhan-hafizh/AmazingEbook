<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view('account',[
            'title' => 'Account Maintanance',
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }
    public function displayUpdate(User $user){
        return view('account-update',[
            'title' => 'Account Maintanance',
            'categories' => Category::all(),
            'user' => $user
        ]); 
    }
    public function delete($id){
        $user = User::findOrFail($id);
        unlink(public_path("profile/img/".$user->picture));
        $user->delete();
        return back();
    }
    public function edit($id, Request $request){
        $user = User::findOrFail($id);
        $user->role=$request->input('role');
        $user->save();
        return redirect('/success');
    }
}
