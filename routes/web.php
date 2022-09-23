<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ContactController;

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
    return view('index');
});

Route::get('/confirm', [SessionController::class, 'getSes']);
Route::post('/confirm', [SessionController::class, 'postSes']);
Route::post('/complete', [SessionController::class, 'complete']);

Route::get('/manage', [ContactController::class, 'index']);
Route::Post('/search', [ContactController::class, 'search']);
Route::get('/search', [ContactController::class, 'search']);
Route::Post('/delete', [ContactController::class, 'delete']);
