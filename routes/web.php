<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Livewire\Posts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [Posts::class, 'home'])->name('/');
Route::get('/privacy', [PagesController::class, 'privacy'])->name('privacy');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/post/{id}', [Posts::class, 'show']);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/dashboard', Posts::class)->name('dashboard');
    //Route::get('/posts', [Posts::class, 'render'])->name('posts');
    //Route::get('editor/upload', [Posts::class, 'upload'])->name('editor.image-upload'); 
});
