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


Route::get('/', [PagesController::class, 'index'])->name('/');
Route::get('/privacy', [PagesController::class, 'privacy'])->name('privacy');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::resource('/posts', Posts::class)->except('index');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/dashboard', [Posts::class,'index'])->name('dashboard');
    
    Route::get('editor/upload', [Posts::class, 'upload'])->name('editor.image-upload'); 
});
