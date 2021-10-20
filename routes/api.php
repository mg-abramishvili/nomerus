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

Route::post('/login', 'App\Http\Controllers\Admin\AuthController@login');
Route::post('/me', 'App\Http\Controllers\Admin\AuthController@me');

Route::get('admin/orders','App\Http\Controllers\Admin\OrderController@orders_index')->middleware('auth:sanctum');
Route::get('admin/order-items','App\Http\Controllers\Admin\OrderItemController@orderItems_index')->middleware('auth:sanctum');

Route::get('admin/certificates','App\Http\Controllers\Admin\CertificateController@index')->middleware('auth:sanctum');
Route::post('admin/certificates','App\Http\Controllers\Admin\CertificateController@store')->middleware('auth:sanctum');
Route::get('admin/certificate/{id}','App\Http\Controllers\Admin\CertificateController@cert_item')->middleware('auth:sanctum');
Route::post('admin/certificate/{id}','App\Http\Controllers\Admin\CertificateController@cert_update')->middleware('auth:sanctum');
Route::post('admin/certificates/add_image_upload','App\Http\Controllers\Admin\CertificateController@add_image_store')->middleware('auth:sanctum');

Route::get('admin/gallery','App\Http\Controllers\Admin\GalleryController@index')->middleware('auth:sanctum');
Route::post('admin/gallery','App\Http\Controllers\Admin\GalleryController@store')->middleware('auth:sanctum');
Route::post('admin/gallery/add_image_upload','App\Http\Controllers\Admin\GalleryController@temp_gal_image_store')->middleware('auth:sanctum');
Route::get('admin/gallery-del/{id}','App\Http\Controllers\Admin\GalleryController@delete_item')->middleware('auth:sanctum');

Route::get('admin/cities','App\Http\Controllers\Admin\CityController@index')->middleware('auth:sanctum');
Route::get('admin/addresses','App\Http\Controllers\Admin\AddressController@index')->middleware('auth:sanctum');
Route::post('admin/addresses','App\Http\Controllers\Admin\AddressController@store')->middleware('auth:sanctum');
Route::get('admin/address/{id}','App\Http\Controllers\Admin\AddressController@address_item')->middleware('auth:sanctum');
Route::get('admin/address/{id}/delete','App\Http\Controllers\Admin\AddressController@address_item_delete')->middleware('auth:sanctum');
Route::post('admin/address/{id}','App\Http\Controllers\Admin\AddressController@address_update')->middleware('auth:sanctum');

Route::get('admin/types/{city}','App\Http\Controllers\Admin\TypeController@index')->middleware('auth:sanctum');
Route::get('admin/type/{type_id}/{city_id}','App\Http\Controllers\Admin\TypeController@type_item')->middleware('auth:sanctum');
Route::put('admin/type/{type_id}/{city_id}','App\Http\Controllers\Admin\TypeController@type_item_update')->middleware('auth:sanctum');

Route::get('admin/services','App\Http\Controllers\Admin\ServiceController@index')->middleware('auth:sanctum');
Route::get('admin/service/{id}','App\Http\Controllers\Admin\ServiceController@service_item')->middleware('auth:sanctum');
Route::post('admin/service/{id}','App\Http\Controllers\Admin\ServiceController@service_update')->middleware('auth:sanctum');
Route::post('admin/services/add_image_upload','App\Http\Controllers\Admin\ServiceController@add_image_store')->middleware('auth:sanctum');

Route::get('admin/transports','App\Http\Controllers\Admin\TransportController@transports_index')->middleware('auth:sanctum');

Route::get('admin/partners','App\Http\Controllers\Admin\PartnerController@index')->middleware('auth:sanctum');
Route::post('admin/partners','App\Http\Controllers\Admin\PartnerController@store')->middleware('auth:sanctum');
Route::get('admin/partner/{id}','App\Http\Controllers\Admin\PartnerController@partner_item')->middleware('auth:sanctum');
Route::post('admin/partner/{id}','App\Http\Controllers\Admin\PartnerController@partner_update')->middleware('auth:sanctum');
Route::post('admin/partners/add_image_upload','App\Http\Controllers\Admin\PartnerController@add_image_store')->middleware('auth:sanctum');

Route::get('admin/leads','App\Http\Controllers\Admin\LeadController@index')->middleware('auth:sanctum');

Route::get('admin/text','App\Http\Controllers\Admin\TextController@index')->middleware('auth:sanctum');
Route::post('admin/text','App\Http\Controllers\Admin\TextController@update')->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
