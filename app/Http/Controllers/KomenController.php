<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use App\Models\foto;
use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function buatKomentar(Request $request, foto $foto) 
    {
        $komen = New Komen;
        $komen->content = $request->content;
        $komen->user_id = auth()->user()->id;

        $foto->komens()->save($komen);

        return back()->withNotif('Komentar terkirim');
    }
}