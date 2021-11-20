<?php

//default
Route::get("/", "main\HomeController@top");
//Demo (Delete after site publish.)
Route::get("/tables_check_view_html", function () {
    return view("tables_check_view_html");
});

Route::get("mypage/", "main\MypageController@index");
Route::get("mounts/show", "main\MountsController@show");
Route::get("mounts/", "main\MountsController@index");
Route::get("favorite/", "main\FavoriteController@index");
Route::get("history/", "main\HistoryController@index");

//=======================================================================
//index
Route::resource('mount', "manage\Mountcontroller");

//=======================================================================

//=======================================================================
//index
Route::get("route/", "manage\RoutesController@index");
//create
Route::get("route/create", "manage\RoutesController@create");
//show
Route::get("route/{id}", "manage\RoutesController@show");
//store
Route::post("route/store", "manage\RoutesController@store");
//edit
Route::get("route/{id}/edit", "manage\RoutesController@edit");
//update
Route::put("route/{id}", "manage\RoutesController@update");
//destroy
Route::delete("route/{id}", "manage\RoutesController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("checkpoint/", "manage\CheckpointsController@index");
//create
Route::get("checkpoint/create", "manage\CheckpointsController@create");
//show
Route::get("checkpoint/{id}", "manage\CheckpointsController@show");
//store
Route::post("checkpoint/store", "manage\CheckpointsController@store");
//edit
Route::get("checkpoint/{id}/edit", "manage\CheckpointsController@edit");
//update
Route::put("checkpoint/{id}", "manage\CheckpointsController@update");
//destroy
Route::delete("checkpoint/{id}", "manage\CheckpointsController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("mounts_imag/", "manage\MountsImageController@index");
//create
Route::get("mounts_imag/create", "manage\MountsImageController@create");
//show
Route::get("mounts_imag/{id}", "manage\MountsImageController@show");
//store
Route::post("mounts_imag/store", "manage\MountsImageController@store");
//edit
Route::get("mounts_imag/{id}/edit", "manage\MountsImageController@edit");
//update
Route::put("mounts_imag/{id}", "manage\MountsImageController@update");
//destroy
Route::delete("mounts_imag/{id}", "manage\MountsImageController@destroy");
//=======================================================================

Auth::routes(['verify' => true]);
