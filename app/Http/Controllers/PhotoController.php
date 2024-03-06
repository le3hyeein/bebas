<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('photos.index', compact('photos'));
    }

}
