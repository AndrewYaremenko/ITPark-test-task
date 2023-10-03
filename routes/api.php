<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FilmController;
use App\Http\Controllers\API\GenreController;

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

Route::group(['prefix' => 'films', 'as' => 'films.'], function () {
    Route::get('/', [FilmController::class, 'index'])->name('index');
    Route::post('/', [FilmController::class, 'store'])->name('store');
    Route::get('/{id}', [FilmController::class, 'show'])->name('show');
    Route::put('/{id}', [FilmController::class, 'update'])->name('update');
    Route::delete('/{id}', [FilmController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'genres', 'as' => 'genres.'], function () {
    Route::get('/', [GenreController::class, 'index'])->name('index');
    Route::post('/', [GenreController::class, 'store'])->name('store');
    Route::get('/{id}', [GenreController::class, 'show'])->name('show');
    Route::put('/{id}', [GenreController::class, 'update'])->name('update');
    Route::delete('/{id}', [GenreController::class, 'destroy'])->name('destroy');
});