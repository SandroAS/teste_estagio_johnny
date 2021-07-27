<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    /** Formulário de Login */
    Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('login', 'AuthController@login')->name('login.do');

    /** Rotas Protegidas */
    Route::group(['middleware' => ['auth']], function () {

        /** Dashboard Home */
        Route::get('home', 'AuthController@home')->name('home');

        /** Usuários */
        Route::resource('users', 'UserController');

        /** Produtos */
        Route::post('products/image-set-cover', 'ProductController@imageSetCover')->name('products.imageSetCover');
        Route::delete('products/image-remove', 'ProductController@imageRemove')->name('products.imageRemove');
        Route::resource('products', 'ProductController');

        // /** Pedidos */
        Route::post('requests/get-data-owner', 'RequestController@getDataOwner')->name('requests.getDataOwner');
        Route::post('requests/get-data-acquirer', 'RequestController@getDataAcquirer')->name('requests.getDataAcquirer');
        Route::post('requests/get-data-product', 'RequestController@getDataProduct')->name('requests.getDataProduct');
        Route::resource('requests', 'RequestController');
    });

    /** Logout */
    Route::get('logout', 'AuthController@logout')->name('logout');
});
