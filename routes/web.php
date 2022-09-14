<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(HomeController::class)
    ->name('home.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('goods-view', 'goodsView')->name('goods.view');
    });

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/gov.php';

Route::get('tables', [HomeController::class, 'index'])->name('tables');
Route::get('forms', [HomeController::class, 'index'])->name('forms');
Route::get('ui', [HomeController::class, 'index'])->name('ui');
Route::get('responsive', [HomeController::class, 'index'])->name('responsive');
Route::get('styles', [HomeController::class, 'index'])->name('styles');
Route::get('profile', [HomeController::class, 'index'])->name('profile');
Route::get('error', [HomeController::class, 'index'])->name('error');
