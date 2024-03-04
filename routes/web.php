<?php

use App\Http\Controllers\CommentController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function() {
//     return view('dashboard');
// });


Auth::routes();
Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
    Route::get('/datagaleri', [App\Http\Controllers\DatagalerihController::class, 'index'])->name('datagaleri');
    Route::get('/edit', [App\Http\Controllers\EditController::class, 'index'])->name('edit');
    // Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

    Route::middleware(['auth', 'ceklevel:admin, user'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::get('/tambah', [App\Http\Controllers\TambahController::class, 'index'])->name('tambah');


    });
    Route::post('/fotos', [App\Http\Controllers\FotosController::class,'store'])->name('post.store');
    Route::post('/photos/{photo}/like', 'PhotoController@like')->name('photos.like');

    Route::post('comment/{foto}', [CommentController::class,'postComments'])->name('addComent');
    Route::get('delete/{id:id}', [App\Http\Controllers\FotosController::class, 'delete']);
    // web.php
// Route::post('/add-comment/{postId}', 'CommentController@store')->name('addComment');

Route::get('/datagaleri', [UserController::class, 'index'])->name('datagaleri.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

});
