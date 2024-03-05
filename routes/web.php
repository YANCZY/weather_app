<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });


Route::controller(Controller::class)->group(function(){
        Route::get('/register','register')->name('register');
        Route::get('/login','index')->name('login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/test', [WeatherController::class, 'index'])->name('home');
// Route::post('/test', [WeatherController::class, 'showResults'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/',[WeatherController::class, 'dashboard']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [WeatherController::class,'index'])->name('home'); 
    Route::post('/dashboard', [WeatherController::class, 'showResults'])->name('search');
    Route::get('/logout',[WeatherController::class, 'destroy'])->name('logout');

});

require __DIR__.'/auth.php';
