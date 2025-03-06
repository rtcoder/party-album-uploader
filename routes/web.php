<?php

use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

Route::get('/upload/{hash}', [MediaController::class, 'upload_form'])->name('media.upload_form');
Route::post('/upload/{hash}', [MediaController::class, 'upload']);

Route::get('/admin', fn() => redirect('/admin/albums'))->name('admin');

Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {
        Route::resource('albums', AlbumController::class);
        Route::get('*', fn() => redirect('/admin/albums'));
    });

require __DIR__ . '/auth.php';
