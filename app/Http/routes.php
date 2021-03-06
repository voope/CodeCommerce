<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::pattern('id', '[0-9]+');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'where'=>['id'=>'[0-9]+']], function () {

    Route::group(['prefix' => 'categories'], function () {
        Route::get('', ['as'=>'categories', 'uses'=>'AdminCategoriesController@index']);
        Route::post('', ['as'=>'categories', 'uses' => 'AdminCategoriesController@store']);
        Route::get('create', ['as'=>'categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::get('{id}/destroy', ['as'=>'categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::get('{id}/edit', ['as'=>'categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('{id}/update', ['as'=>'categories.update', 'uses' => 'AdminCategoriesController@update']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('', ['as'=>'products', 'uses'=>'AdminProductsController@index']);
        Route::post('', ['as'=>'products', 'uses' => 'AdminProductsController@store']);
        Route::get('create', ['as'=>'products.create', 'uses' => 'AdminProductsController@create']);
        Route::get('{id}/destroy', ['as'=>'products.destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::get('{id}/edit', ['as'=>'products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('{product}', ['as'=>'products.update', 'uses' => 'AdminProductsController@update']);

        Route::group(['prefix' => 'images'], function () {
            Route::get('{id}/product', ['as'=>'products.images', 'uses' => 'AdminProductsController@images']);
            Route::get('create/{id}/product', ['as'=>'products.images.create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('store/{id}/product', ['as'=>'products.images.store', 'uses' => 'AdminProductsController@storeImage']);
            Route::get('destroy/{id}/image', ['as'=>'products.images.destroy', 'uses' => 'AdminProductsController@destroyImage']);
        });
        
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('', ['as'=>'orders', 'uses'=>'AdminOrdersController@index']);
        Route::post('{order}/update', ['as'=>'orders.update', 'uses' => 'AdminOrdersController@update']);
    });

});



Route::get('/', 'StoreController@index');
Route::get('/home', 'StoreController@index');

Route::get('/category/{category}', ['as' => 'category', 'uses' => 'StoreController@category']);
Route::get('/product/{product}', ['as' => 'product', 'uses' => 'StoreController@product']);
Route::get('/tags/{id}', ['as' => 'tags', 'uses' => 'StoreController@tags']);

Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
Route::post('cart/update/{id}', ['as' => 'cart.update', 'uses' => 'CartController@update']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);

});



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
