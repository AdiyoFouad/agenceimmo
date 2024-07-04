<?php

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\OptionController;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', [AuthController::class,'login'])->name('auth.login');
Route::post('/login', [AuthController::class,'doLogin'])->name('auth.login');
Route::delete('/logout', [AuthController::class,'doLogout'])->name('auth.logout');

Route::get('/', [HomeController::class,'index'])->name('index');

Route::prefix('/biens')->controller(\App\Http\Controllers\PropertyController::class)->name('property.')->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/{slug}-{property}', 'show')->name('show')->where([
        'property'=>'[0-9]+',
        'slug' => '[0-9a-z\-]+'
    ]);

    Route::post('/{property}/contact', 'contact')->name('contact')->where([
        'property'=>'[0-9]+'
    ]);

});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::resource('property', PropertyController::class)->except(['show']);

    Route::resource('option', OptionController::class)->except(['show']);


});

