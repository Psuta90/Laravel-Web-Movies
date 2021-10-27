<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });
// admin

Auth::routes([  'register' => false, // Register Routes...

'reset' => false, // Reset Password Routes...

'verify' => false, ]);

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/input-movies', [InputMoviesController::class, 'index'])->name('admin_inputmovies.index');
Route::get('/admin/input-serial', [InputSerialController::class, 'index'])->name('admin_inputserial.index');
Route::post('/admin/input-serial/store', [InputSerialController::class, 'store'])->name('admin_inputserial.store');
Route::post('/admin/input-movies/store', [InputMoviesController::class, 'store'])->name('admin_inputmovies.store');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('index');
Route::get('/all-movies', [Movies_PageController::class, 'index'])->name('moviespage');
Route::get('/all-serial', [AllSerialController::class, 'index'])->name('serialpage');
Route::get('/film/{PM}', [HomeController::class, 'show'])->name('film.show');
Route::get('/TV/{TV}', [HomeController::class, 'show'])->name('tv.show');
Route::get('/{slug}', [Serial_TVController::class, 'show'])->name('serial.show');


