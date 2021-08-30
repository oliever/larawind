<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaizenController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::resource('users', \App\Http\Controllers\UsersController::class);
    //Route::post('upload', [\App\Http\Controllers\UploadController::class, 'upload']);
    //Route::resource('kaizen', App\Http\Controllers\KaizenController::class);

    Route::get('/', [KaizenController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [KaizenController::class, 'index'])->name('dashboard');
    Route::get('/kaizen/', [KaizenController::class, 'index'])->name('kaizen.index');
    Route::get('/kaizen/create', [KaizenController::class, 'create'])->name('kaizen.create');

    Route::get('/kaizen/{kaizen}', [KaizenController::class, 'show'])->name('kaizen.show');
    Route::get('/kaizen/pdf/{kaizen}', [KaizenController::class, 'pdf'])->name('kaizen.pdf');

    //Route::view('/', '')->name('home');
    //Route::view('', 'dashboard')->name('dashboard');
    Route::view('forms', 'forms')->name('forms');
    Route::view('cards', 'cards')->name('cards');
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('modals', 'modals')->name('modals');
    Route::view('tables', 'tables')->name('tables');
    Route::view('calendar', 'calendar')->name('calendar');
});
