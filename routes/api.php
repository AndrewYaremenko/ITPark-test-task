<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'films'], function () {
    Route::get('/', [FilmController::class, 'index'])->name('index');
    Route::post('/', [FilmController::class, 'store'])->name('store');
    Route::get('/{film}', [FilmController::class, 'show'])->name('show');
    Route::put('/{film}', [FilmController::class, 'update'])->name('update');
    Route::delete('/{film}', [FilmController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'genres'], function () {
    Route::get('/', [GenreController::class, 'index'])->name('index');
    Route::post('/', [GenreController::class, 'store'])->name('store');
    Route::get('/{genre}', [GenreController::class, 'show'])->name('show');
    Route::put('/{genre}', [GenreController::class, 'update'])->name('update');
    Route::delete('/{genre}', [GenreController::class, 'destroy'])->name('destroy');
});