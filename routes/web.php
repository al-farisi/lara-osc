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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'StorefrontController@index');

Route::get('/metro', function () {
    return view('layouts.metro');
});

Route::get('paypal/express-checkout', 'PaypalController@expressCheckout')->name('paypal.express-checkout');
Route::get('paypal/express-checkout-success', 'PaypalController@expressCheckoutSuccess');
Route::post('paypal/notify', 'PaypalController@notify');

Route::post('/charge', 'CheckoutController@charge');

// Route::get('auth/facebook', 'FacebookController@redirectToProvider')->name('facebook.login');
// Route::get('auth/facebook/callback', 'FacebookCOntroller@handleProviderCallback');

// Route::get('auth/twitter', 'TwitterController@redirectToProvider')->name('twitter.login');
// Route::get('auth/twitter/callback', 'TwitterController@handleProviderCallback');

// Route::get('auth/google', 'GoogleController@redirectToProvider')->name('google.login');
// Route::get('auth/google/callback', 'GoogleController@handleProviderCallback');

Route::get('auth/{provider}', 'SocialMediaController@redirectToProvider')->name('provider_redirection');
Route::get('auth/{provider}/callback', 'SocialMediaController@handleProviderCallback');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Route::auth();

Route::group(['middleware' => ['auth']], function() {


	Route::get('/home', 'HomeController@index');


	//Route::resource('users','UserController');
	Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:permission-maintain']]);
	Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:permission-maintain']]);
	Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:permission-maintain']]);
	Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show','middleware' => ['permission:permission-maintain']]);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:permission-maintain']]);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:permission-maintain']]);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:permission-maintain']]);

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

	Route::get('categories',['as'=>'categories.index','uses'=>'CategoryController@index','middleware' => ['permission:category-maintain']]);
	Route::get('categories/create',['as'=>'categories.create','uses'=>'CategoryController@create','middleware' => ['permission:category-maintain']]);
	Route::post('categories/create',['as'=>'categories.store','uses'=>'CategoryController@store','middleware' => ['permission:category-maintain']]);
	Route::get('categories/{id}',['as'=>'categories.show','uses'=>'CategoryController@show','middleware' => ['permission:category-maintain']]);
	Route::get('categories/{id}/edit',['as'=>'categories.edit','uses'=>'CategoryController@edit','middleware' => ['permission:category-maintain']]);
	Route::patch('categories/{id}',['as'=>'categories.update','uses'=>'CategoryController@update','middleware' => ['permission:category-maintain']]);
	Route::delete('categories/{id}',['as'=>'categories.destroy','uses'=>'CategoryController@destroy','middleware' => ['permission:category-maintain']]);

	Route::get('sub_categories',['as'=>'sub_categories.index','uses'=>'SubCategoryController@index','middleware' => ['permission:category-maintain']]);
	Route::get('sub_categories/create',['as'=>'sub_categories.create','uses'=>'SubCategoryController@create','middleware' => ['permission:category-maintain']]);
	Route::post('sub_categories/create',['as'=>'sub_categories.store','uses'=>'SubCategoryController@store','middleware' => ['permission:category-maintain']]);
	Route::get('sub_categories/{id}',['as'=>'sub_categories.show','uses'=>'SubCategoryController@show','middleware' => ['permission:category-maintain']]);
	Route::get('sub_categories/{id}/edit',['as'=>'sub_categories.edit','uses'=>'SubCategoryController@edit','middleware' => ['permission:category-maintain']]);
	Route::patch('sub_categories/{id}',['as'=>'sub_categories.update','uses'=>'SubCategoryController@update','middleware' => ['permission:category-maintain']]);
	Route::delete('sub_categories/{id}',['as'=>'sub_categories.destroy','uses'=>'SubCategoryController@destroy','middleware' => ['permission:category-maintain']]);

	Route::get('products',['as'=>'products.index','uses'=>'ProductController@index','middleware' => ['permission:product-list|product-create|product-edit|product-delete']]);
	Route::get('products/create',['as'=>'products.create','uses'=>'ProductController@create','middleware' => ['permission:product-create']]);
	Route::post('products/create',['as'=>'products.store','uses'=>'ProductController@store','middleware' => ['permission:product-create']]);
	Route::get('products/{id}',['as'=>'products.show','uses'=>'ProductController@show']);
	Route::get('products/{id}/edit',['as'=>'products.edit','uses'=>'ProductController@edit','middleware' => ['permission:product-edit']]);
	Route::patch('products/{id}',['as'=>'products.update','uses'=>'ProductController@update','middleware' => ['permission:product-edit']]);
	Route::delete('products/{id}',['as'=>'products.destroy','uses'=>'ProductController@destroy','middleware' => ['permission:product-delete']]);
});