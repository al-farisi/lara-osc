<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::auth();

Route::group(['middleware' => ['auth']], function() {


	Route::get('/home', 'HomeController@index');


	Route::resource('users','UserController');


	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	Route::get('permissions',['as'=>'permissions.index','uses'=>'PermissionController@index','middleware' => ['permission:permission-maintain']]);
	Route::get('permissions/create',['as'=>'permissions.create','uses'=>'PermissionController@create','middleware' => ['permission:permission-maintain']]);
	Route::post('permissions/create',['as'=>'permissions.store','uses'=>'PermissionController@store','middleware' => ['permission:permission-maintain']]);
	Route::get('permissions/{id}',['as'=>'permissions.show','uses'=>'PermissionController@show','middleware' => ['permission:permission-maintain']]);
	Route::get('permissions/{id}/edit',['as'=>'permissions.edit','uses'=>'PermissionController@edit','middleware' => ['permission:permission-maintain']]);
	Route::patch('permissions/{id}',['as'=>'permissions.update','uses'=>'PermissionController@update','middleware' => ['permission:permission-maintain']]);
	Route::delete('permissions/{id}',['as'=>'permissions.destroy','uses'=>'PermissionController@destroy','middleware' => ['permission:permission-maintain']]);

	Route::get('products',['as'=>'products.index','uses'=>'ProductController@index','middleware' => ['permission:product-list|product-create|product-edit|product-delete']]);
	Route::get('products/create',['as'=>'products.create','uses'=>'ProductController@create','middleware' => ['permission:product-create']]);
	Route::post('products/create',['as'=>'products.store','uses'=>'ProductController@store','middleware' => ['permission:product-create']]);
	Route::get('products/{id}',['as'=>'products.show','uses'=>'ProductController@show']);
	Route::get('products/{id}/edit',['as'=>'products.edit','uses'=>'ProductController@edit','middleware' => ['permission:product-edit']]);
	Route::patch('products/{id}',['as'=>'products.update','uses'=>'ProductController@update','middleware' => ['permission:product-edit']]);
	Route::delete('products/{id}',['as'=>'products.destroy','uses'=>'ProductController@destroy','middleware' => ['permission:product-delete']]);
});