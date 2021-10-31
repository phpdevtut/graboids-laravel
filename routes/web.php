<?php

use App\Http\Controllers\GraboidsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/smth', function () {
    return view('something');
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/graboids/{graboidId}', [GraboidsController::class, 'show'])
    ->name('home.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
