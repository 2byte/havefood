<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\ {
  AdminGoodsCategoriesController,
  AdminDifferentController,
  AdminGoodsController,
  AdminApiGoodsOptionController
};

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
  Route::resource('categories', AdminGoodsCategoriesController::class);

  Route::prefix('goods')
  ->controller(AdminGoodsController::class)
  ->name('goods.')
  ->group(function () {
    Route::post('store', 'store')->name('store');
    Route::get('get', 'get')->name('get');

    Route::prefix('option')
    ->controller(AdminApiGoodsOptionController::class)
    ->name('option.')
    ->group(function () {
      Route::get('get', 'getGoodsOptions')->name('get');
    });
  });

  Route::controller(AdminDifferentController::class)
  ->prefix('different')
  ->group(function () {
    Route::get('get-goods-types', 'getGoodsTypes');
  });
});