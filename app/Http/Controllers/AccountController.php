<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view('account',[
            'title' => 'Account Maintanance',
            'categories' => Category::all()
        ]);
    }
}
