<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    use HasFactory;

    public function index()
    {
        $fotos = Foto::all();

        return view('home', compact('fotos'));
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
