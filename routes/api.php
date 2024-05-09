<?php

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('test', 'App\Http\Controllers\test@return_index_page');

Route::post('return_destination', 'App\Http\Controllers\test@return_dest_page');

Route::post('search_destination', 'App\Http\Controllers\test@search_destination');

Route::post('search_dates', 'App\Http\Controllers\test@search_between_dates');

Route::post('return_specific_details_about_destinations', 'App\Http\Controllers\test@return_specific_destination');

Route::post('reservation', 'App\Http\Controllers\test@send_reservation_via_mail');

Route::post('getImagesfortrip', 'App\Http\Controllers\test@getImagesfortrip');
