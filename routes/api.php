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

Route::get('certificates','App\Http\Controllers\Front\CertificateController@index');
Route::get('gallery','App\Http\Controllers\Front\GalleryController@index');


// ADMIN
Route::get('admin/orders','App\Http\Controllers\Admin\OrderController@orders_index');
Route::get('admin/order-items','App\Http\Controllers\Admin\OrderItemController@orderItems_index');

Route::get('admin/certificates','App\Http\Controllers\Admin\CertificateController@index');
Route::post('admin/certificates','App\Http\Controllers\Admin\CertificateController@store');
Route::post('admin/temp-cert-upload','App\Http\Controllers\Admin\CertificateController@temp_cert_image_store');

Route::get('admin/gallery','App\Http\Controllers\Admin\GalleryController@index');
Route::post('admin/gallery','App\Http\Controllers\Admin\GalleryController@store');
Route::post('admin/temp-gal-upload','App\Http\Controllers\Admin\GalleryController@temp_gal_image_store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
