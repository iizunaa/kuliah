<?php

use App\Http\Controllers\DashboardFilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DaftarController;
use App\Models\history;
use App\Models\Like;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('admin');

Route::resource('/dashboard/films', DashboardFilmController::class)->middleware('auth');

Route::resource('/home', HomeController::class);

Route::middleware('auth')->group(function () {
    Route::get('/like/{id}', [LikeController::class,'like']);
});
Route::get('/history', [LikeController::class, 'index'])->Middleware('auth');

Route::resource('/daftar', DaftarController::class);