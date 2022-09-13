<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\ {
  AdminGoodsCategoriesController,
  AdminDifferentController,
  AdminGoodsController,
  AdminApiGoodsOptionController,
  AdminApiFileController
};
use App\Http\Controllers\GoodsApiUserController;
use App\Http\Controllers\LocalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum', 'auth.role:boss,admin,manager'])
->prefix('gov')
->name('gov.api.')
->group(function () {

  Route::prefix('categories')
  ->controller(AdminGoodsCategoriesController::class)
  ->name('categories.')
  ->group(function () {
    Route::get('/', 'index')->name('all');
    Route::post('store', 'store')->name('store');
    Route::post('delete', 'delete')->name('delete');
  });

  Route::prefix('goods')
  ->controller(AdminGoodsController::class)
  ->name('goods.')
  ->group(function () {
    Route::post('store', 'store')->name('store');
    Route::post('get', 'get')->name('get');

    Route::prefix('option')
    ->controller(AdminApiGoodsOptionController::class)
    ->name('option.')
    ->group(function () {
      Route::post('get/first', 'getGoodsOptionFirst')->name('get.first');
      Route::post('get', 'getGoodsOptions')->name('get');
      Route::post('store', 'store')->name('store');
    });
  });

  Route::prefix('file')
  ->controller(AdminApiFileController::class)
  ->name('file.')
  ->group(function () {
    Route::post('upload', 'upload')->name('upload');
    Route::post('get', 'get')->name('get');
    Route::post('get/previews', 'getPreviews')->name('get.previews');
    Route::post('delete', 'delete')->name('delete');
  });

  Route::controller(AdminDifferentController::class)
  ->prefix('different')
  ->group(function () {
    Route::get('get-goods-types', 'getGoodsTypes');
  });
});

Route::controller(GoodsApiUserController::class)
  ->prefix('user/goods')
  ->name('user.goods.')
  ->group(function () {
    GoodsApiUserController::get('get', 'get')->name('get');
  });

if (app()->isLocal()) {
  Route::controller(LocalController::class)
    ->prefix('local')
    ->group(function () {
      Route::get('/auth-boss', 'authenticationBoss');
      Route::post('/test-upload', 'testUpload');
      Route::get('/get-samples-images', 'getSamplesImages');
    });
}