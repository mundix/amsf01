<?php

/**
 * Vista del login, como el root del site, ojo esto deberia tener una condicion
 * si estas logueado, deberia estar dentro.
*/
//Route::get('/',['as' => 'login','uses' => 'HomeController@index']);
Route::get('/',['as' => 'login','uses' => 'LoginController@index']);
Route::post('login.forgot',['as' => 'forgot_password','uses' => 'LoginController@forgot']);

Route::get('test',['as' => 'test','uses' => 'DashboardController@test']);

Route::get('get_config',['as' => 'config','uses' => 'HomeController@config']);



/**
 * Segmento para los buscadores Candiadtes, el cual tendra un controller llamado
 * Candidates y apunte al meotdo de category()
 * @param String $slug
 * @param Int $id
 * @return View
 * Esta seria l URL de la categoria
 *
 * candidates/backend-developer/1
 *
*/
//Route::get('candidates/{slug}/{id}',['as' => 'category','uses' => 'CandidatesController@category']);

/**
 * la ruta para un candidate seria
 * edmundo-pichardo/1
*/
//Route::get('{slug}/{id}',['as' => 'candidate', 'uses' => 'CandidatesController@show']);
Route::get('melons',['as'=>'product','uses'=> 'ProductsController@melon']);

Route::group(['before'=>'guest'],function()
{
    /**
     * Llamadas para el Registro
     */
    Route::get('sign-up',['as'=>'sign_up','uses'=> 'UsersController@signUp']);
    Route::post('sign-up',['as'=>'register','uses'=> 'UsersController@register']);
    /**
     * Login, viene del formulario de login de layout.blade.php
     */
});
Route::post('login',['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('user.reset',['as'=>'user_reset','uses'=>'UsersController@reset']);


/**
 * Group de Routas por Filtro
*/
Route::group(['before' => 'auth'], function()
{
    /**
     * Dashboard
    */
    Route::get('dashboard',['as'=>'home','uses'=>'DashboardController@index']);
    Route::get('logout',['as' => 'logout', 'uses' => 'AuthController@logout']);

    Route::get('employees',['as'=>'employees','uses'=>'UsersController@dashboard']);
    /**
     * Formularios Account, informacion de la cuetna
     */
    Route::get('account',['as' => 'account','uses' => 'UsersController@account']);
    Route::put('account',['as' => 'update_account','uses' => 'UsersController@updateAccount']);
    Route::get('profile',['as' => 'profile','uses' => 'UsersController@profile']);
    Route::put('profile',['as' => 'update_profile','uses' => 'UsersController@updateProfile']);

    Route::group(['before' => 'is_admin'],function(){
        /**
         * Admin Routes
         */
        Route::get('admin/candidate/{id}',['as' => 'admin_candidate_edit', function($id){
            return 'Editando un candidato:'.$id;
        }]);

    });

    /**
     * Rutas Relacionadas al Producto
    */
    Route::get('products',['as'=>'products','uses'=>'ProductsController@index']);

    Route::get('products.add',['as'=>'product_add','uses'=>'ProductsController@add']);
    Route::post('products.add',['as'=>'product_save','uses'=>'ProductsController@save']);

    Route::get('products.edit/{slug}/{id}',['as'=>'product_edit','uses'=>'ProductsController@edit']);
    Route::post('products.edit/{slug}/{id}',['as'=>'product_update','uses'=>'ProductsController@update']);
    Route::get('products/{slug}/{id}',['as'=>'product_show','uses'=>'ProductsController@show']);

    /**
     * Rutas de Las categorias de Productos
    */
    Route::get('products.categories',['as'=>'products_categories','uses'=>'ProductsCategoriesController@index']);
    Route::get('products.categories.add',['as'=>'product_category_add','uses'=>'ProductsCategoriesController@add']);
    Route::post('products.categories.add',['as'=>'product_category_save','uses'=>'ProductsCategoriesController@save']);

    Route::get('products.categories.edit/{slug}/{id}',['as'=>'product_category_edit','uses'=>'ProductsCategoriesController@edit']);
    Route::post('products.categories.edit/{slug}/{id}',['as'=>'product_category_edit','uses'=>'ProductsCategoriesController@edit']);
    Route::get('products.categories.show',['as'=>'product_category_show','uses'=>'ProductsCategoriesController@show']);

    /**
     * ###############################
     * Operaciones
     * ###############################
    */
    /**
     * Ventas
    */
    Route::get('sales',['as'=>'make_sale','uses'=>'OperationsController@sales']);
    Route::post('sales',['as'=>'add_sale','uses'=>'OperationsController@saveSales']);

    Route::get('buy',['as'=>'make_buy','uses'=>'OperationsController@buy']);
    Route::post('buy',['as'=>'add_buy','uses'=>'OperationsController@saveBuy']);

    Route::get('products.search',['as'=>'products_search','uses'=>'ProductsController@search'] );

    /**
     * Invoice Details
    */
    Route::get('invoice.details/{id}',['as'=>'invoices','uses'=>'InvoicesController@show']);

    /**
     * Client Administrator
    */
    Route::get('clients.dashboard',['as'=>'clients','uses'=>'ClientsController@dashboard']);

    Route::get('client.add',['as'=>'client_add','uses'=>'ClientsController@add']);
    Route::post('client.add',['as'=>'client_save','uses'=>'ClientsController@save']);

    Route::get('client.edit/{id}',['as'=>'client_edit','uses'=>'ClientsController@edit']);
    Route::post('client.edit',['as'=>'client_update','uses'=>'ClientsController@update']);

    Route::get('client.delete/{id}',['as'=>'client_delete','uses'=>'ClientsController@delete']);

//    Route::get('user.reset',function()
//    {
//       return \Hash::make('SupeR@.#-2014!');
//    });


});
