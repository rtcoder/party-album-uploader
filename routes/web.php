<?php

use App\Http\Controllers\Admin\AlbumController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('albums', AlbumController::class);
});

require __DIR__ . '/auth.php';
