<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Livewire\Posts\Posts;

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


// Route::get('/posts', function(){
//     return view('livewire.posts');
// });
Route::middleware(['auth:sanctum', 'verified'])->get('/post', [Posts::class, 'render'])->name('draft');
// Route::get('/', function () {
//     return view('home');
// })->name('/');
Route::get('/', [PagesController::class, 'index'])->name('/');
Route::get('/privacy', [PagesController::class, 'privacy'])->name('privacy');
Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
