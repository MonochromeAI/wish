<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;

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

Route::redirect('/', '/home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(ImageController::class)->prefix('image')->group(function () {
    Route::get('', 'index')->name('images');
    Route::get('create', 'create')->name('images.create');
    Route::post('store', 'store')->name('images.store');
    Route::get('edit/{image}', 'edit')->name('images.edit');
    Route::patch('edit/{image}', 'update')->name('images.update');
    Route::delete('destroy/{image}', 'destroy')->name('images.destroy');
});
Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('', 'index')->name('users');
    Route::get('edit/{id}', 'edit')->name('users.edit');
    Route::patch('edit/{id}', 'update')->name('users.update');
    Route::delete('destroy/{id}', 'destroy')->name('users.destroy');
});
Route::controller(MenuController::class)->prefix('menu')->group(function () {
    Route::get('', 'index')->name('menu.index');
    Route::get('create', 'create')->name('menu.create');
    Route::post('store', 'store')->name('menu.store');
    Route::get('edit/{menu}', 'edit')->name('menu.edit');
    Route::patch('edit/{menu}', 'update')->name('menu.update');
    Route::delete('destroy/{menu}', 'destroy')->name('menu.destroy');
}); 
Route::controller(ChefController::class)->prefix('chef')->group(function () {
    Route::get('', 'index')->name('chef.index');
    Route::get('create', 'create')->name('chef.create');
    Route::post('store', 'store')->name('chef.store');
    Route::get('edit/{id}', 'edit')->name('chef.edit');
    Route::patch('edit/{id}', 'update')->name('chef.update');
    Route::delete('destroy/{id}', 'destroy')->name('chef.destroy');
}); 
Route::controller(ReservationController::class)->prefix('reservation')->group(function () {
    Route::get('', 'index')->name('reservation.index');
    Route::get('create', 'create')->name('reservation.create');
    Route::post('store', 'store')->name('reservation.store');
    Route::get('edit/{id}', 'edit')->name('reservation.edit');
    Route::patch('edit/{id}', 'update')->name('reservation.update');
    Route::delete('destroy/{id}', 'destroy')->name('reservation.destroy');
}); 
