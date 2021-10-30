<?php

use Illuminate\Http\Response;

//default
Route::get("/", function () {
    return view("welcome");
});
//Demo (Delete after site publish.)
Route::get("/tables_check_view_html", function () {
    return view("tables_check_view_html");
});

//=======================================================================
//index
Route::get("mount/", "MountsController@index");
//create
Route::get("mount/create", "MountsController@create");
//show
Route::get("mount/{id}", "MountsController@show");
//store
Route::post("mount/store", "MountsController@store");
//edit
Route::get("mount/{id}/edit", "MountsController@edit");
//update
Route::put("mount/{id}", "MountsController@update");
//destroy
Route::delete("mount/{id}", "MountsController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("route/", "RoutesController@index");
//create
Route::get("route/create", "RoutesController@create");
//show
Route::get("route/{id}", "RoutesController@show");
//store
Route::post("route/store", "RoutesController@store");
//edit
Route::get("route/{id}/edit", "RoutesController@edit");
//update
Route::put("route/{id}", "RoutesController@update");
//destroy
Route::delete("route/{id}", "RoutesController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("checkpoint/", "CheckpointsController@index");
//create
Route::get("checkpoint/create", "CheckpointsController@create");
//show
Route::get("checkpoint/{id}", "CheckpointsController@show");
//store
Route::post("checkpoint/store", "CheckpointsController@store");
//edit
Route::get("checkpoint/{id}/edit", "CheckpointsController@edit");
//update
Route::put("checkpoint/{id}", "CheckpointsController@update");
//destroy
Route::delete("checkpoint/{id}", "CheckpointsController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("mounts_imag/", "MountsImageController@index");
//create
Route::get("mounts_imag/create", "MountsImageController@create");
//show
Route::get("mounts_imag/{id}", "MountsImageController@show");
//store
Route::post("mounts_imag/store", "MountsImageController@store");
//edit
Route::get("mounts_imag/{id}/edit", "MountsImageController@edit");
//update
Route::put("mounts_imag/{id}", "MountsImageController@update");
//destroy
Route::delete("mounts_imag/{id}", "MountsImageController@destroy");
//=======================================================================

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
