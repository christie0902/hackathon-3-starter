<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Models\Animal;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'home')->name('home');
Route::get('/home/owners', [OwnerController::class, 'display'])->name('owner.display');
Route::get('/home/animals', [AnimalController::class, 'display'])->name('animal.display');
Route::get('/home/search-owner', [OwnerController::class, 'search']);
Route::get('/home/search-animal', [AnimalController::class, 'search']);


Route::get('/home/owners/{id}/detail', [OwnerController::class, 'getDetail'])->name('owner.detail');
Route::get('/home/animals/{id}/detail', [AnimalController::class, 'getDetail'])->name('animal.detail');