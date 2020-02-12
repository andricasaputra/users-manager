<?php

Route::middleware('auth:api')->group(function(){
	Route::get('/users/', 'UsersController@show')->name('users.api');
	Route::post('/users/table', 'UsersController@showTable')->name('users.api.table');

	Route::get('/pegawai/', 'PegawaiController@show')->name('pegawai.api');
	Route::post('/pegawai/table', 'PegawaiController@showTable')->name('pegawai.api.table');

	Route::get('token/show', 'SettingController@showToken')->name('token.show');
	Route::post('token/generate', 'SettingController@generateToken')->name('token.generate');
});