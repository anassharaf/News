<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('test',[ApiController::class , 'index']) ->middleware('checkpassword');
Route::post('test1',[ApiController::class , 'index1']);
Route::post('login',[ApiController::class , 'login']);
Route::get('useraccount',[ApiController::class , 'userAccount']);
