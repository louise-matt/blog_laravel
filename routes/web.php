<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;

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
    return view('home');
})->name('home');

// Movies
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies', [MovieController::class, 'save'])->name('movies.save');

Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('/movies/{movie}/update', [MovieController::class, 'update'])->name('movies.update');

Route::delete('/movies/{movie}/delete', [MovieController::class, 'delete'])->name('movies.delete');

// Movies categories
Route::get('/categories', [CategoryController::class, 'categories'])->name('movies.categories');

// Médias 
Route::post('/upload', [FileController::class, 'upload'])->name('upload');



