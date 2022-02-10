<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function index(){
        return view('cart',[
            'title' => 'Cart',
            'categories' => Category::all(),
            'rent' => Rent::with(['book'])->where('user_id','=',Auth::id())->where('status','=',0)->get()
        ]);
    }
    public function rent(Book $book){
        Rent::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'status' => 0,
        ]);
        return redirect('/success');
    }
    public function delete($id){
        $rent = Rent::findOrFail($id);
        $rent->delete();
        return back();
    }
    public function submit(){
        Rent::where('user_id','=',Auth::id())->where('status','=',0)->update(['status' => 1]);
        return redirect('/success');
    }
}
