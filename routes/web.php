<?php

use App\Http\Controllers\Admin\PlatController as AdminPlatController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\EtiquetteController as AdminEtiquetteController;
use App\Http\Controllers\Admin\ActuController as AdminActuController;
use App\Http\Controllers\Admin\CategorieController as AdminCategorieController;
use App\Http\Controllers\Admin\Photo_ambianceController as AdminPhotoAmbianceController;
use App\Http\Controllers\Admin\Photo_platController as AdminPhoto_platController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\Photo_ambianceController;
use App\Http\Controllers\Photo_platController;
use App\Http\Controllers\ActuController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EtiquetteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
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

//Restaurant

Route::get('/restaurant', [RestaurantController::class,'index'])->name('restaurant');


// page d'accueil

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/hello/{name}',[HelloController::class,'index'])->name('hello');

Route::get('/menu',[MenuController::class, 'index'])->name('menu');

Route::get('/contact',[ContactController::class, 'index'])->name('contact');

Route::get('/actu', [ActuController::class,'index'])->name('actu');

// Route::get('/reservation', function () {
//     return view('reservation');
// })->name('reservation');

Route::get('/reservation', [ReservationController::class,'index'])->name('reservation');
Route::post('/reservation', [ReservationController::class,'store'])->name('reservation');


Route::get('/mention-legales', function () {
    return view('mentions-legales');
})->name('mentions-legales');

// routes du back office

//CRUD actu
Route::get('/admin/actu', [AdminActuController::class,'index'])->middleware('auth')->name('admin.actu.index');

Route::get('/admin/actu/create',[AdminActuController::class,'create'])->middleware('auth')->name('admin.actu.create');
Route::post('/admin/actu',[AdminActuController::class,'store'])->middleware('auth')->name('admin.actu.store');

Route::get('/admin/actu/{id}/edit', [AdminActuController::class,'edit'])->middleware('auth')->name('admin.actu.edit');
Route::put('/admin/actu/{id}', [AdminActuController::class,'update'])->middleware('auth')->name('admin.actu.update');

Route::delete('/admin/actu/{id}',[AdminActuController::class,'delete'])->middleware('auth')->name('admin.actu.delete');

// CRUD plat


Route::get('/admin/plat', [AdminPlatController::class,
'index'])->middleware('auth')->name('admin.plat.index');

Route::get('/admin/plat/create',[AdminPlatController::class,'create'])->middleware('auth')->name('admin.plat.create');
Route::post('/admin/plat',[AdminPlatController::class,'store'])->middleware('auth')->name('admin.plat.store');

Route::get('/admin/plat/{id}/edit', [AdminPlatController::class,'edit'])->middleware('auth')->name('admin.plat.edit');
Route::put('/admin/plat/{id}', [AdminPlatController::class,'update'])->middleware('auth')->name('admin.plat.update');

Route::delete('/admin/plat/{id}',[AdminPlatController::class,'delete'])->middleware('auth')->name('admin.plat.delete');

// CRUD photo_plats


Route::get('/admin/photo_plat', [AdminPhoto_platController::class,
'index'])->middleware('auth')->name('admin.photo_plat.index');

Route::get('/admin/photo_plat/create',[AdminPhoto_platController::class,'create'])->middleware('auth')->name('admin.photo_plat.create');
Route::post('/admin/photo_plat',[AdminPhoto_platController::class,'store'])->middleware('auth')->name('admin.photo_plat.store');

Route::get('/admin/photo_plat/{id}/edit', [AdminPhoto_platController::class,'edit'])->middleware('auth')->name('admin.photo_plat.edit');
Route::put('/admin/photo_plat/{id}', [AdminPhoto_platController::class,'update'])->middleware('auth')->name('admin.photo_plat.update');

Route::delete('/admin/photo_plat/{id}',[AdminPhoto_platController::class,'delete'])->middleware('auth')->name('admin.photo_plat.delete');

// CRUD Categorie

Route::get('/admin/categorie', [AdminCategorieController::class,
'index'])->middleware('auth')->name('admin.categorie.index');

Route::get('/admin/categorie/create',[AdminCategorieController::class,'create'])->middleware('auth')->name('admin.categorie.create');
Route::post('/admin/categorie',[AdminCategorieController::class,'store'])->middleware('auth')->name('admin.categorie.store');

Route::get('/admin/categorie/{id}/edit', [AdminCategorieController::class,'edit'])->middleware('auth')->name('admin.categorie.edit');
Route::put('/admin/categorie/{id}', [AdminCategorieController::class,'update'])->middleware('auth')->name('admin.categorie.update');

Route::delete('/admin/categorie/{id}',[AdminCategorieController::class,'delete'])->middleware('auth')->name('admin.categorie.delete');

// CRUD PhotoAmbiance


Route::get('/admin/photo_ambiance', [AdminPhotoAmbianceController::class,
'index'])->middleware('auth')->name('admin.photo_ambiance.index');

Route::get('/admin/photo_ambiance/create',[AdminPhotoAmbianceController::class,'create'])->middleware('auth')->name('admin.photo_ambiance.create');
Route::post('/admin/photo_ambiance',[AdminPhotoAmbianceController::class,'store'])->middleware('auth')->name('admin.photo_ambiance.store');

Route::get('/admin/photo_ambiance/{id}/edit', [AdminPhotoAmbianceController::class,'edit'])->middleware('auth')->name('admin.photo_ambiance.edit');
Route::put('/admin/photo_ambiance/{id}', [AdminPhotoAmbianceController::class,'update'])->middleware('auth')->name('admin.photo_ambiance.update');

Route::delete('/admin/photo_ambiance/{id}',[AdminPhotoAmbianceController::class,'delete'])->middleware('auth')->name('admin.photo_ambiance.delete');

// CRUD Etiquette


Route::get('/admin/etiquette', [AdminEtiquetteController::class,
'index'])->middleware('auth')->name('admin.etiquette.index');

Route::get('/admin/etiquette/create',[AdminEtiquetteController::class,'create'])->middleware('auth')->name('admin.etiquette.create');
Route::post('/admin/etiquette',[AdminEtiquetteController::class,'store'])->middleware('auth')->name('admin.etiquette.store');

Route::get('/admin/etiquette/{id}/edit', [AdminEtiquetteController::class,'edit'])->middleware('auth')->name('admin.etiquette.edit');
Route::put('/admin/etiquette/{id}', [AdminEtiquetteController::class,'update'])->middleware('auth')->name('admin.etiquette.update');

Route::delete('/admin/etiquette/{id}',[AdminEtiquetteController::class,'delete'])->middleware('auth')->name('admin.etiquette.delete');



// CRUD réservation
Route::get('/admin/reservation', [AdminReservationController::class,
'index'])->middleware('auth')->name('admin.reservation.index');


Route::get('/admin/reservation/create', [AdminReservationController::class,'create'])->middleware('auth')->name('admin.reservation.create');
Route::post('/admin/reservation', [AdminReservationController::class,'store'])->middleware('auth')->name('admin.reservation.store');

Route::get('/admin/reservation/{id}/edit', [AdminReservationController::class,'edit'])->middleware('auth')->name('admin.reservation.edit');
Route::put('/admin/reservation/{id}', [AdminReservationController::class,'update'])->middleware('auth')->name('admin.reservation.update');

Route::delete('/admin/reservation/{id}',[AdminReservationController::class,'delete'])->middleware('auth')->name('admin.reservation.delete');

// Dashboard

Route::get('/admin/dashboard', [AdminDashboardController::class,'index'])->middleware('auth')->name('admin.dashboard');


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
