<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// FRONT
Route::post('order-item','App\Http\Controllers\Front\OrderItemController@orderItem_store');
Route::get('order-item/{uid}','App\Http\Controllers\Front\OrderItemController@orderItem');
Route::get('order-item-del/{uid}','App\Http\Controllers\Front\OrderItemController@orderItem_delete');
Route::post('order','App\Http\Controllers\Front\OrderController@order_store');

Route::get('cities','App\Http\Controllers\Front\CityController@cities_index');
Route::get('city-select/{city}','App\Http\Controllers\Front\CityController@city_select');
Route::get('city-detect','App\Http\Controllers\Front\CityController@city_detect');

Route::get('services','App\Http\Controllers\Front\ServiceController@index');

Route::get('text','App\Http\Controllers\Front\TextController@index');

Route::get('partners','App\Http\Controllers\Front\PartnerController@index');

Route::get('transports','App\Http\Controllers\Front\TransportController@transports_index');

Route::get('{city}/transport/{id}/types','App\Http\Controllers\Front\TypeController@transport_types');

Route::get('certificates','App\Http\Controllers\Front\CertificateController@index');
Route::get('gallery','App\Http\Controllers\Front\GalleryController@index');
Route::get('addresses','App\Http\Controllers\Front\AddressController@index');

Route::post('lead','App\Http\Controllers\Front\LeadController@store');

// ADMIN
Route::get('admin/orders','App\Http\Controllers\Admin\OrderController@orders_index');
Route::get('admin/order-items','App\Http\Controllers\Admin\OrderItemController@orderItems_index');

Route::get('admin/certificates','App\Http\Controllers\Admin\CertificateController@index');
Route::post('admin/certificates','App\Http\Controllers\Admin\CertificateController@store');
Route::get('admin/certificate/{id}','App\Http\Controllers\Admin\CertificateController@cert_item');
Route::post('admin/certificate/{id}','App\Http\Controllers\Admin\CertificateController@cert_update');
Route::post('admin/certificates/add_image_upload','App\Http\Controllers\Admin\CertificateController@add_image_store');

Route::get('admin/gallery','App\Http\Controllers\Admin\GalleryController@index');
Route::post('admin/gallery','App\Http\Controllers\Admin\GalleryController@store');
Route::post('admin/temp-gal-upload','App\Http\Controllers\Admin\GalleryController@temp_gal_image_store');

Route::get('admin/cities','App\Http\Controllers\Admin\CityController@index');
Route::get('admin/addresses','App\Http\Controllers\Admin\AddressController@index');
Route::post('admin/addresses','App\Http\Controllers\Admin\AddressController@store');
Route::get('admin/address/{id}','App\Http\Controllers\Admin\AddressController@address_item');
Route::post('admin/address/{id}','App\Http\Controllers\Admin\AddressController@address_update');

Route::get('admin/types/{city}','App\Http\Controllers\Admin\TypeController@index');
Route::get('admin/type/{type_id}/{city_id}','App\Http\Controllers\Admin\TypeController@type_item');
Route::put('admin/type/{type_id}/{city_id}','App\Http\Controllers\Admin\TypeController@type_item_update');

Route::get('admin/services','App\Http\Controllers\Admin\ServiceController@index');
Route::get('admin/service/{id}','App\Http\Controllers\Admin\ServiceController@service_item');
Route::post('admin/service/{id}','App\Http\Controllers\Admin\ServiceController@service_update');
Route::post('admin/services/add_image_upload','App\Http\Controllers\Admin\ServiceController@add_image_store');

Route::get('admin/transports','App\Http\Controllers\Admin\TransportController@transports_index');

Route::get('admin/partners','App\Http\Controllers\Admin\PartnerController@index');
Route::get('admin/leads','App\Http\Controllers\Admin\LeadController@index');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
