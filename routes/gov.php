<?php

use App\Http\Controllers\Admin\ {
  AdminIndexController,
  AdminComponentTestController
};

Route::middleware(['auth', 'auth.role:boss,admin,manager'])
->group(function () {
  Route::controller(AdminIndexController::class)
  ->prefix('gov')
  ->name('admin.')
  ->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/list-goods/{category_id?}', 'listGoods')->name('list-goods');

    // Test pages (old tests)
    /*Route::get('goods-item-test', 'goodsItem')->name('goods-item-test');
    Route::get('form-file-picker', 'formFilePickerTest')->name('test.formFilePicker');
    Route::get('category-test', 'categoryTest')->name('category-test');
    */
    
    // tests pages with running components
    Route::controller(AdminComponentTestController::class)
    ->prefix('test')
    ->name('test.')
    ->group(function () {
      Route::get('goods-form', 'goodsForm')->name('goods.form');
      Route::get('goods-option-relationships', 'goodsOptionRelationships')->name('goods.goodsOptionRelationships');
      Route::get('goods-option-list', 'goodsOptionList')->name('goods.goodsOptionList');
      Route::get('goods-option-form', 'goodsOptionForm')->name('goods.goodsOptionForm');
      Route::get('goods-item', 'goodsItem')->name('goods.item');
    });
  });
});