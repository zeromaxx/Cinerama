<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MoviesController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authorize_login'])->name('authorize_login');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register_user', [AuthController::class, 'register_user'])->name('register_user');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function () {
    Route::get('movies', [MoviesController::class, 'movies'])->name('movies');
    Route::get('my_reservations', [MoviesController::class, 'my_reservations'])->name('my_reservations');
    Route::get('show_reservations', [MoviesController::class, 'show_reservations'])->name('show_reservations');
    Route::get('add_movie', [MoviesController::class, 'add_movie'])->name('add_movie');
    Route::post('add_moviePost', [MoviesController::class, 'add_moviePost'])->name('add_moviePost');
    Route::post('confirm_reservation', [MoviesController::class, 'confirm_reservation'])->name('confirm_reservation');
    Route::post('reserve_seats_post', [MoviesController::class, 'reserve_seats_post'])->name('reserve_seats_post');
    Route::get('reserve_movie_seats/{id}', [MoviesController::class, 'reserve_movie_seats'])->name('reserve_movie_seats');
});
