<?php

use App\Http\Controllers\Admin\AdminIndexController;

Route::controller(AdminIndexController::class)
    ->prefix('gov')
    ->middleware(['auth', 'auth.role:boss,admin,manager'])
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });