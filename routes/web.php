<?php

Route::get('/', function(){
	return redirect()->route('login');
});

Route::namespace('Auth')->group(function(){
	Route::get('/login', 'LoginController@showLoginForm');
	Route::post('/login', 'LoginController@login')->name('login');
	Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::middleware('auth')->group(function(){

	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/users', 'UsersController');
	Route::get('users/fetch/{user}', 'UsersController@fetch')->name('users.fetch');
	Route::get('import', 'UsersController@createBulk')->name('users.create.bulk');
	Route::post('import', 'UsersController@import')->name('import');

	Route::prefix('pegawai')->group(function(){
		Route::get('/pegawai/', 'PegawaiController@index')->name('pegawai.index');
		Route::get('/show/{nip?}', 'PegawaiController@detail')->name('pegawai.detail');
		Route::post('/fetch', 'PegawaiController@fetchAllSimAsnData')->name('pegawai.fetch');
		Route::get('/update/{pegawai}', 'PegawaiController@fetchSimAsnData')->name('pegawai.update');
	});

	Route::namespace('Admin')->group(function(){
		Route::resource('roles', 'RoleController');
		Route::resource('permissions', 'PermissionController');
	});

	Route::get('generate/apitoken', function(){
		return \Illuminate\Support\Str::random(60);
	});

	Route::get('setting', 'SettingController@index')->name('setting.index');
});
