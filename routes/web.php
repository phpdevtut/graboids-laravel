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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);


/////////////////////////////
//Graboids
Route::get('/', [GraboidsController::class, 'index'])
    ->name('home');
Route::get('/graboids/{graboidId}', [GraboidsController::class, 'show'])
    ->name('home.show');

//Hunters
Route::get('/hunters', [HuntersController::class, 'index'])
    ->name('hunters.index');
Route::get('/hunters/{hunterId}', [HuntersController::class, 'show'])
    ->name('hunters.show');
Route::get('/hunters/{hunterId}/delete', [HuntersController::class, 'delete'])
    ->name('hunters.delete');

//News
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

//Upload
Route::get('/upload', [UploadController::class, 'index'])
    ->name('upload.index');

//About
Route::get('/about', [AboutController::class, 'index'])
    ->name('about.index');

//Contact
Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');


require __DIR__.'/auth.php';
