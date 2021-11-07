<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GraboidsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HuntersController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/smth', function () {
    return view('something');
});

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);


/////////////////////////////

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

//Graboids
Route::get('/graboids/{graboidId}', [GraboidsController::class, 'show'])
    ->name('home.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Hunters
Route::get('/hunters', [HuntersController::class, 'index'])
    ->name('hunters.index');
Route::get('/hunters/{hunterId}', [HuntersController::class, 'show'])
    ->name('hunters.show');
Route::get('/hunters/{hunterId}/delete', [HuntersController::class, 'delete'])
    ->name('hunters.delete');

//Upload
Route::get('/upload', [UploadController::class, 'index'])
    ->name('upload.index');

//About
Route::get('/about', [AboutController::class, 'index'])
    ->name('about.index');

//Contact
Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact.index');


require __DIR__.'/auth.php';
