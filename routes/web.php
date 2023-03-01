<?php

use App\Http\Controllers\Admin\PlatController as AdminPlatController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\ActuController as AdminActuController;



use App\Http\Controllers\ActuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
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

// routes du front office

// page d'accueil

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/hello/{name}',[HelloController::class,'index'])->name('hello');

// @todo creer les routes pour les pages Menu, Contact et reservation

Route::get('/menu',[MenuController::class, 'index'])->name('menu');

Route::get('/contact',[ContactController::class, 'index'])->name('contact');

Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');

Route::get('/mention-legales', function () {
    return view('mentions-legales');
})->name('mentions-legales');

// routes du back office

//CRUD actu
Route::get('/admin/actu', [AdminActuController::class,'index'])->middleware('auth')->name('admin.actu.index');

Route::get('/admin/actu/create',[AdminActuController::class,'create'])->middleware('auth')->name('admin.actu.create');
Route::post('/admin/actu',[AdminActuController::class,'store'])->middleware('auth')->name('admin.actu.store');

Route::get('/admin/actu/{id}/edit', [AdminActuController::class,
'edit'])->middleware('auth')->name('admin.actu.edit');
Route::put('/admin/actu/{id}', [AdminActuController::class,
'update'])->middleware('auth')->name('admin.actu.update');

Route::delete('/admin/actu/{id}',[AdminActuController::class,'delete'])->middleware('auth')->name('admin.actu.delete');

// CRUD plat
//@todo liste des plats

Route::get('/admin/plat', [AdminPlatController::class,
'index'])->middleware('auth')->name('admin.plat.index');

Route::get('/admin/plat/create',[AdminPlatController::class,'create'])->middleware('auth')->name('admin.plat.create');
Route::post('/admin/plat',[AdminPlatController::class,'store'])->middleware('auth')->name('admin.plat.store');

Route::get('/admin/plat/{id}/edit', [AdminPlatController::class,
'edit'])->middleware('auth')->name('admin.plat.edit');
Route::put('/admin/plat/{id}', [AdminPlatController::class,
'update'])->middleware('auth')->name('admin.plat.update');

Route::delete('/admin/plat/{id}',[AdminPlatController::class,'delete'])->middleware('auth')->name('admin.plat.delete');


// CRUD réservation
Route::get('/admin/reservation', [AdminReservationController::class,
'index'])->middleware('auth')->name('admin.reservation.index');


Route::get('/admin/reservation/create', [AdminReservationController::class,
'create'])->middleware('auth')->name('admin.reservation.create');
Route::post('/admin/reservation', [AdminReservationController::class,
'store'])->middleware('auth')->name('admin.reservation.store');

Route::get('/admin/reservation/{id}/edit', [AdminReservationController::class,
'edit'])->middleware('auth')->name('admin.reservation.edit');
Route::put('/admin/reservation/{id}', [AdminReservationController::class,
'update'])->middleware('auth')->name('admin.reservation.update');

Route::delete('/admin/reservation/{id}',[AdminReservationController::class,'delete'])->middleware('auth')->name('admin.reservation.delete');

//routes de breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
