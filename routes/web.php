<?php

//default
Route::get("/", "main\HomeController@top");
//Demo (Delete after site publish.)
Route::get("/tables_check_view_html", function () {
    return view("tables_check_view_html");
});

Route::get('routes/{route}/favorite', 'main\RouteController@favorite')->name('routes.favorite');
Route::get("mypage/", "main\MypageController@index")->name('mypage');

Route::get("routes/", "main\RouteController@index");
Route::get("routes/{route}", "main\RouteController@show")->name('routes.show');
Route::get("favorite/", "main\FavoriteController@index")->name('favorite');
Route::get("history/", "main\HistoryController@index")->name('history');
Route::get("history/{route}", "main\HistoryController@create")->name('history.create');
Route::post("history/store", "main\HistoryController@store");
Route::get('/dashboard', 'Dashboard\DashboardController@index')->middleware('auth:admins');
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('login', 'Dashboard\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Dashboard\Auth\LoginController@login')->name('login');
    Route::resource('mount', "Dashboard\MountsController");
    Route::resource('route', "Dashboard\RoutesController");
    Route::resource('checkpoint', "Dashboard\CheckpointsController");
});

Auth::routes(['verify' => true]);
