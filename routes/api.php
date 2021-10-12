<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// FRONT
Route::post('order-item','App\Http\Controllers\Front\OrderItemController@orderItem_store');
Route::get('order-item/{uid}','App\Http\Controllers\Front\OrderItemController@orderItem');
Route::post('order','App\Http\Controllers\Front\OrderController@order_store');

Route::get('cities','App\Http\Controllers\Front\CityController@cities_index');
Route::get('city-select/{city}','App\Http\Controllers\Front\CityController@city_select');
Route::get('city-detect','App\Http\Controllers\Front\CityController@city_detect');

Route::get('services','App\Http\Controllers\Front\ServiceController@index');

Route::get('text','App\Http\Controllers\Front\TextController@index');

Route::get('transports','App\Http\Controllers\Front\TransportController@transports_index');

Route::get('{city}/transport/{id}/types','App\Http\Controllers\Front\TypeController@transport_types');

Route::get('certificates','App\Http\Controllers\Front\CertificateController@index');
Route::get('gallery','App\Http\Controllers\Front\GalleryController@index');
Route::get('addresses','App\Http\Controllers\Front\AddressController@index');

// ADMIN
Route::get('admin/orders','App\Http\Controllers\Admin\OrderController@orders_index');
Route::get('admin/order-items','App\Http\Controllers\Admin\OrderItemController@orderItems_index');

Route::get('admin/certificates','App\Http\Controllers\Admin\CertificateController@index');
Route::post('admin/certificates','App\Http\Controllers\Admin\CertificateController@store');
Route::post('admin/temp-cert-upload','App\Http\Controllers\Admin\CertificateController@temp_cert_image_store');

Route::get('admin/gallery','App\Http\Controllers\Admin\GalleryController@index');
Route::post('admin/gallery','App\Http\Controllers\Admin\GalleryController@store');
Route::post('admin/temp-gal-upload','App\Http\Controllers\Admin\GalleryController@temp_gal_image_store');

Route::get('admin/cities','App\Http\Controllers\Admin\CityController@index');
Route::get('admin/addresses','App\Http\Controllers\Admin\AddressController@index');
Route::post('admin/addresses','App\Http\Controllers\Admin\AddressController@store');

Route::get('admin/types/{city}','App\Http\Controllers\Admin\TypeController@index');
Route::get('admin/type/{type_id}/{city_id}','App\Http\Controllers\Admin\TypeController@type_item');
Route::put('admin/type/{type_id}/{city_id}','App\Http\Controllers\Admin\TypeController@type_item_update');

Route::get('admin/services','App\Http\Controllers\Admin\ServiceController@index');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
