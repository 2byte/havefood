<?php

use App\Http\Controllers\Admin\AdminIndexController;

Route::middleware(['auth', 'auth.role:boss,admin,manager'])
    ->group(function () {
        Route::controller(AdminIndexController::class)
        ->prefix('gov')
        ->name('admin.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/list-goods/{category_id?}', 'listGoods')->name('list-goods');
        });
    });