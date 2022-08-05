<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\{
    AdminGoodsCategoriesController,
    AdminDifferentController,
    AdminGoodsController
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
        Route::resource('goods', AdminGoodsController::class);
        
        Route::controller(AdminDifferentController::class)
            ->prefix('different')
            ->group(function () {
                Route::get('get-goods-types', 'getGoodsTypes');
            });
    });