<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HelloController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/hello/{name}',[HelloController::class,'index'])->name('hello');

// @todo creer les routes pour les pages Menu, Contact et reservation

Route::get('/menu',[MenuController::class, 'index'])->name('menu');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');

Route::get('/mention-legales', function () {
    return view('mentions-legales');
})->name('mentions-legales');