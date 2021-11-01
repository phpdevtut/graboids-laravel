<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GraboidsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HunterController;
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

// Admin ////////////////////

Route::get('/admin', [AdminPanelController::class, 'index'])
    ->name('admin.index');
Route::get('/admin/add-article', [NewsController::class, 'add'])
    ->name('admin.addarticle');
Route::get('/admin/add-hunter', [HunterController::class, 'add'])
    ->name('admin.addhunter');

Route::get('/admin/hunters', [HunterController::class, 'index'])
    ->name('admin.index');
Route::get('/admin/hunters/{hunterId}/edit', [HunterController::class, 'edit'])
    ->name('admin.edithunter');
Route::get('/admin/hunters/{hunterId}', [HunterController::class, 'update'])
    ->name('admin.updatehunter');

Route::get('/admin/graboids', [GraboidsController::class, 'index'])
    ->name('admin.index');
Route::get('/admin/graboids/{graboidsId}/edit', [GraboidsController::class, 'edit'])
    ->name('admin.editgraboids');
Route::get('/admin/graboids/{graboidsId}', [GraboidsController::class, 'update'])
    ->name('admin.updategraboids');

Route::get('/admin/news', [NewsController::class, 'index'])
    ->name('admin.index');
Route::get('/admin/news/{newsId}/edit', [NewsController::class, 'edit'])
    ->name('admin.editnews');
Route::get('/admin/news/{newsId}', [NewsController::class, 'update'])
    ->name('admin.updatenews');

Route::get('/admin/users', [UsersController::class, 'index'])
    ->name('admin.index');
Route::get('/admin/users/{usersId}/edit', [UsersController::class, 'edit'])
    ->name('admin.editusers');



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
Route::get('/hunters', [HunterController::class, 'index'])
    ->name('hunters.index');
Route::get('/hunters/{hunterId}', [HunterController::class, 'show'])
    ->name('hunters.show');
Route::get('/hunters/{hunterId}/delete', [HunterController::class, 'delete'])
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
