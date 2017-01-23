<?php

/*
|--------------------------------------------------------------------------
| Installer Routes
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'install', 'as' => 'Installer::', 'namespace' => 'Installer'], function () {
	Route::get('/', [
		'as' => 'welcome',
		'middleware' => ['validate_steps'],
		'uses' => 'InstallerController@welcome',
	]);

	Route::get('requirements', [
		'as' => 'requirements',
		'middleware' => ['validate_steps'],
		'uses' => 'InstallerController@requirements',
	]);

	Route::get('permissions', [
		'as' => 'permissions',
		'middleware' => ['validate_steps'],
		'uses' => 'InstallerController@permissions',
	]);

	Route::get('setup', [
		'as' => 'setup',
		'middleware' => ['validate_steps'],
		'uses' => 'InstallerController@setup',
	]);

	Route::post('setup/save', [
		'as' => 'setupSave',
		'uses' => 'InstallerController@store',
	]);

	Route::get('user', [
		'as' => 'user',
		'middleware' => ['validate_steps'],
		'uses' => 'InstallerController@user',
	]);

	Route::post('user/save', [
		'as' => 'userStore',
		'uses' => 'InstallerController@userStore',
	]);

	Route::get('final', [
		'as' => 'final',
		'middleware' => ['validate_steps'],
		'uses' => 'InstallerController@finish',
	]);
});
