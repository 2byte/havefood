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
            
            // Test pages
            Route::get('goods-item-test', 'goodsItem')->name('goods-item-test');
            Route::get('form-file-picker', 'formFilePickerTest')->name('test.formFilePicker');
            Route::get('category-test', 'categoryTest')->name('category-test');
        });
    });