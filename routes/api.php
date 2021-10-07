<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('transports','App\Http\Controllers\FrontController@transports_index');
Route::get('transport/{id}/types','App\Http\Controllers\FrontController@transport_types');

Route::post('order','App\Http\Controllers\FrontController@order_save');
Route::get('order/{uid}','App\Http\Controllers\FrontController@order_item');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
