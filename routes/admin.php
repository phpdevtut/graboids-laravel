<?php

use App\Http\Controllers\Admin\GraboidsController;
use App\Http\Middleware\AllowedToEnterAdminPanel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HuntersController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\UsersController;

// Admin ////////////////////

Route::middleware(AllowedToEnterAdminPanel::class)->group(function() {
    Route::get('/admin', [AdminPanelController::class, 'index'])
        ->name('admin.index');
    Route::get('/admin/article/new', [ArticlesController::class, 'new'])
        ->name('admin.article.new');
    Route::post('admin/article', [ArticlesController::class, 'store'])
        ->name('admin.article.store');

    Route::get('/admin/hunter/new', [HuntersController::class, 'new'])
        ->name('admin.hunter.new');
    Route::post('/admin/hunter', [HuntersController::class, 'store'])
        ->name('admin.hunter.store');

    Route::get('/admin/hunters', [HuntersController::class, 'index'])
        ->name('admin.hunters.index');
    Route::get('/admin/hunters/{hunterId}/edit', [HuntersController::class, 'edit'])
        ->name('admin.edithunter');
    Route::post('/admin/hunters/{hunterId}', [HuntersController::class, 'update'])
        ->name('admin.updatehunter');

    Route::get('/admin/graboids', [GraboidsController::class, 'index'])
        ->name('admin.graboids.index');
    Route::get('/admin/graboids/{graboidsId}/edit', [GraboidsController::class, 'edit'])
        ->name('admin.editgraboids');
    Route::get('/admin/graboids/{graboidsId}', [GraboidsController::class, 'update'])
        ->name('admin.updategraboids');

    Route::get('/admin/news', [ArticlesController::class, 'index'])
        ->name('admin.news.index');
    Route::get('/admin/news/{newsId}/edit', [ArticlesController::class, 'edit'])
        ->name('admin.editnews');
    Route::post('/admin/news/{newsId}', [ArticlesController::class, 'update'])
        ->name('admin.updatenews');

    Route::get('/admin/users', [UsersController::class, 'index'])
        ->name('admin.index');
    Route::get('/admin/users/{usersId}/edit', [UsersController::class, 'edit'])
        ->name('admin.editusers');
});
