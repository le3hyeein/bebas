<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Like;
use Illuminate\Http\Request;

class FotosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2000',
        ]);

        $foto = New Foto;
        $foto->deskripsi= $request->deskripsi;
        $foto->user_id = auth()->user()->id;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationaPath = public_path('/image');
            $file->move($destinationaPath, $fileName);
            $foto->image = $fileName;
        }

        $foto->save();
        return back()->withNotif('Berhasil  menambahkan foto');
    }

    public function like(foto $foto)
{
    // Pastikan user telah login
    if (auth()->check()) {
        // Periksa apakah user sudah "like" foto ini sebelumnya
        if (!$foto->likes()->where('user_id', auth()->id())->exists()) {
            // Jika belum, tambahkan "like" baru
            $foto->likes()->create(['user_id' => auth()->id()]);
        }
    }

    // Redirect kembali ke halaman sebelumnya atau ke halaman foto
    return back();
}

    public function delete($id)
    {
        $post = Foto::find($id);

        if(!$post) {
            return back()->withError('Foto tidak ditemukan.');
        }

        // hapus di penyimpanan
        $image_path = public_path('/image/'.$post->image);
        if(file_exists($image_path)) {
            unlink($image_path);
        }

        $post->delete();

        return back()->withNotif('Foto berhasil di hapus');
    }
}
