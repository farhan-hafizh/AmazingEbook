<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Detail;
use Illuminate\Http\Request;

class CategoryController extends Controller
{   
    public function show(Category $category){
        return view('category',[
            'title' => 'Category',
            'categories' => Category::all(),
            'books' => $category->books
        ]);  
    }
}