<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\foto;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComments(Request $request, foto $foto)
    {
        $comment = New comment;
        $comment->content = $request->content;
        $comment->user_id = auth()->user()->id;
        $comment->id_photo = $foto->id;
        $comment->username = auth()->user()->username;

        $foto->comments()->save($comment);

        return back()->with('notif', 'Komentar terkirim');
    }
}
