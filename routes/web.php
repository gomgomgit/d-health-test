<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SignaController;
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


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('loginProcess');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/', function() {
        return redirect()->route('recipes.create');
    });
    
    Route::prefix('/recipes')->controller(RecipeController::class)->name('recipes.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });
    Route::prefix('/drugs')->controller(DrugController::class)->name('drugs.')->group(function () {
        Route::get('', 'index')->name('index');
    });
    Route::prefix('/signas')->controller(SignaController::class)->name('signas.')->group(function () {
        Route::get('', 'index')->name('index');
    });
});