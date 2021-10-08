<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// FRONT
Route::post('order-item','App\Http\Controllers\Front\OrderItemController@orderItem_store');
Route::get('order-item/{uid}','App\Http\Controllers\Front\OrderItemController@orderItem');
Route::post('order','App\Http\Controllers\Front\OrderController@order_store');

Route::get('cities','App\Http\Controllers\Front\CityController@cities_index');

Route::get('transports','App\Http\Controllers\Front\TransportController@transports_index');

Route::get('{city}/transport/{id}/types','App\Http\Controllers\Front\TypeController@transport_types');

// ADMIN
Route::get('admin/orders','App\Http\Controllers\Admin\OrderController@orders_index');
Route::get('admin/order-items','App\Http\Controllers\Admin\OrderItemController@orderItems_index');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
