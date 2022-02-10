<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function user(){
        return $this->hasOne(User::class);
    }
    public function book(){
        return $this->hasMany(Book::class,'id','book_id');
    }
}
