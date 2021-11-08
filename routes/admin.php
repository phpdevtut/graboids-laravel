<?php

use App\Http\Controllers\Admin\GraboidsController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Middleware\AllowedToEnterAdminPanel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HuntersController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\UsersController;

// Admin ////////////////////

Route::middleware(AllowedToEnterAdminPanel::class)->group(function() {
// Admin Panel
    Route::get('/admin', [AdminPanelController::class, 'index'])
        ->name('admin.index');

// Hunters
    Route::get('/admin/hunters', [HuntersController::class, 'index'])
        ->name('admin.hunters.index');
    Route::get('/admin/hunters/new', [HuntersController::class, 'new'])
        ->name('admin.hunters.new');
    Route::post('/admin/hunters', [HuntersController::class, 'store'])
        ->name('admin.hunters.store');
    Route::get('/admin/hunters/{hunterId}/edit', [HuntersController::class, 'edit'])
        ->name('admin.hunters.edit');
    Route::post('/admin/hunters/{hunterId}', [HuntersController::class, 'update'])
        ->name('admin.hunters.update');

// Graboids
    Route::get('/admin/graboids', [GraboidsController::class, 'index'])
        ->name('admin.graboids.index');
    Route::get('/admin/graboids/{graboidsId}/edit', [GraboidsController::class, 'edit'])
        ->name('admin.graboids.edit');
    Route::get('/admin/graboids/{graboidsId}', [GraboidsController::class, 'update'])
        ->name('admin.graboids.update');


// News
    Route::get('/admin/news', [ArticlesController::class, 'index'])
        ->name('admin.news.index');
    Route::get('/admin/article/new', [ArticlesController::class, 'new'])
        ->name('admin.articles.new');
    Route::post('admin/article', [ArticlesController::class, 'store'])
        ->name('admin.articles.store');
    Route::get('/admin/news/{newsId}/edit', [ArticlesController::class, 'edit'])
        ->name('admin.news.edit');
    Route::post('/admin/news/{newsId}', [ArticlesController::class, 'update'])
        ->name('admin.news.update');


// Users
    Route::get('/admin/users', [UsersController::class, 'index'])
        ->name('admin.users.index');
    Route::get('/admin/users/{userId}/edit', [UsersController::class, 'edit'])
        ->name('admin.users.edit');
    Route::post('/admin/users/{userId}', [UsersController::class, 'update'])
        ->name('admin.users.update');

// Messages
    Route::get('/admin/messages', [ContactsController::class, 'index'])
        ->name('admin.messages.index');
    Route::get('/admin/{messageId}/open', [ContactsController::class, 'open'])
        ->name('admin.messages.open');
});
