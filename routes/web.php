<?php

use App\Http\Controllers\BelongController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamTaskController;
use Illuminate\Support\Facades\Route;
Use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('task', TaskController::class);

Route::resource('team', TeamController::class);

Route::controller(BelongController::class)
->prefix('belong')->name('belong.')->group(function() {
    Route::post('/{team}/belong', 'belong')->name('belong');
    Route::post('/{team}/unbelong', 'unbelong')->name('unbelong');
});

Route::resource('team_task', TeamTaskController::class);
