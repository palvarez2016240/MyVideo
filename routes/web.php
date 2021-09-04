<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CreadoresController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Models\Video;
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

Route::get('/', function () {

    $videos = Video::all();

    return view('home', compact('videos'));
})->name('home');

Route::resource('creators', CreadoresController::class);

Route::resource('videos', VideoController::class);

Route::resource('categorias', CategoriaController::class);
