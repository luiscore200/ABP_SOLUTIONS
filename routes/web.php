<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;
use App\Http\Controllers\CityController;



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

//Route::get('/', function () {return view('welcome');});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {return view('dashboard');});
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/info-city', function () {return view('info-city');})->name('info-city');
    Route::get('/my-cities', function () {return view('my-cities');})->name('my-cities');
    

});
