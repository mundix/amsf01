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
 * la ruta para un candidate seria
 * edmundo-pichardo/1
*/

Route::post('login',['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('user.reset',['as'=>'user_reset','uses'=>'UsersController@reset']);
Route::post('reset.password',['as'=>'reset','uses'=>'UsersController@reset']);

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
    /**
     *      Rutas Relacionadas al Producto
    */
    Route::get('products',['as'=>'products','uses'=>'ProductsController@index']);
    Route::get('products.view',['as'=>'products_view','uses'=>'ProductsController@show']);

    Route::group(['before'=>'is_admin-or-is_super_admin'],function()
    {
        Route::get('product.add', ['as' => 'product_add', 'uses' => 'ProductsController@add']);
        Route::post('product.add', ['as' => 'product_save', 'uses' => 'ProductsController@save']);

        Route::get('product.edit/{slug}/{id}', ['as' => 'product_edit', 'uses' => 'ProductsController@edit']);
        Route::post('product.edit/{slug}/{id}', ['as' => 'product_update', 'uses' => 'ProductsController@update']);

        Route::get('product.delete/{id}', ['as' => 'product_delete', 'uses' => 'ProductsController@delete']);
    });
    /**
     * Rutas de Las categorias de Productos
    */
    Route::get('products.categories',['as'=>'products_categories','uses'=>'ProductsCategoriesController@index']);
    Route::get('products.categories.view',['as'=>'products_categories_view','uses'=>'ProductsCategoriesController@show']);

//    Route::group(['before'=>'is_admin-or-is_super_admin'],function()
//    {
        Route::get('product.category.add', ['as' => 'product_category_add', 'uses' => 'ProductsCategoriesController@add']);
        Route::post('product.category.add', ['as' => 'product_category_save', 'uses' => 'ProductsCategoriesController@save']);

        Route::get('product.category.edit/{id}', ['as' => 'product_category_edit', 'uses' => 'ProductsCategoriesController@edit']);
        Route::post('product.category.edit/{id}', ['as' => 'product_category_update', 'uses' => 'ProductsCategoriesController@update']);

        Route::get('product.category.show', ['as' => 'product_category_show', 'uses' => 'ProductsCategoriesController@show']);

        Route::get('product.category.delete/{id}', ['as' => 'product_category_delete', 'uses' => 'ProductsCategoriesController@delete']);
//    });
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

    /**
     * Compras
    */

    Route::get('buy',['as'=>'make_buy','uses'=>'OperationsController@buy']);
    Route::post('buy',['as'=>'add_buy','uses'=>'OperationsController@saveBuy']);

    /**
     * Credito
    */
    Route::get('credits',['as'=>'make_credit','uses'=>'OperationsController@credit']);
    Route::post('credits',['as'=>'make_credit','uses'=>'OperationsController@saveCredit']);

    /**
     * Angular Search Products
    */
    Route::get('products.search',['as'=>'products_search','uses'=>'ProductsController@search'] );
//    Route::get('products.slug',['as'=>'products_slug','uses'=>'ProductsController@slug'] );

    /**
     * *************************
     * Invoice Details
     * *************************
    */
    Route::get('invoice.details/{id}',['as'=>'invoices','uses'=>'InvoicesController@show']);

    /**
     * *************************
     * Client Administrator
     * *************************
    */
    Route::get('clients.dashboard',['as'=>'clients','uses'=>'ClientsController@dashboard']);
    Route::get('client.view',['as'=>'client_view','uses'=>'ClientsController@show']);

    Route::group(['before'=>'is_admin-or-is_super_admin'],function()
    {
        Route::get('client.add',['as'=>'client_add','uses'=>'ClientsController@add']);
        Route::post('client.add',['as'=>'client_save','uses'=>'ClientsController@save']);

        Route::get('client.edit/{id}',['as'=>'client_edit','uses'=>'ClientsController@edit']);
        Route::post('client.edit',['as'=>'client_update','uses'=>'ClientsController@update']);

        Route::get('client.delete/{id}',['as'=>'client_delete','uses'=>'ClientsController@delete']);
    });
    /**
     * **********************
     * Supplyer
     * **********************
    */
    Route::get('supplyers.dashboard',['as'=>'supplyers','uses'=>'SupplyersController@dashboard']);
    Route::get('supplyer.view',['as'=>'supplyer_view','uses'=>'SupplyersController@show']);

    Route::group(['before'=>'is_admin-or-is_super_admin'],function()
    {
        Route::get('supplyer.add', ['as' => 'supplyer_add', 'uses' => 'SupplyersController@add']);
        Route::post('supplyer.add', ['as' => 'supplyer_save', 'uses' => 'SupplyersController@save']);

        Route::get('supplyer.edit/{id}', ['as' => 'supplyer_edit', 'uses' => 'SupplyersController@edit']);
        Route::post('supplyer.edit', ['as' => 'supplyer_update', 'uses' => 'SupplyersController@update']);

        Route::get('supplyer.delete/{id}', ['as' => 'supplyer_delete', 'uses' => 'SupplyersController@delete']);

    });
    /**
     * **********************
     * Emplyee
     * **********************
    */
    Route::get('employees.dashboard',['as'=>'employees','uses'=>'UsersController@dashboard']);
    Route::put('employee.view', ['as'=>'employee_view','uses'=>'UsersController@show']);

    Route::group(['before'=>'is_admin-or-is_super_admin'],function()
    {
        Route::get('employee.add', ['as'=>'employee_add','uses'=>'UsersController@add']);
        Route::get('employee.add', ['as'=>'employee_add','uses'=>'UsersController@add']);

        Route::get('employee.delete/{id}', ['as'=>'employee_delete','uses'=>'UsersController@delete']);
        Route::get('employee.reset/{id}', ['as'=>'employee_reset','uses'=>'UsersController@delete']);
    });

    /**
     * Formularios Account, informacion de la cuetna
     */
    Route::get('account',['as' => 'account','uses' => 'UsersController@account']);
    Route::put('account',['as' => 'update_account','uses' => 'UsersController@updateAccount']);

    Route::get('profile',['as' => 'profile','uses' => 'UsersController@profile']);
    Route::put('profile',['as' => 'update_profile','uses' => 'UsersController@updateProfile']);

    /**
     *******************************
     * Report's
     *******************************
    */
    /**
     * Reportes de Ventas
    */
    Route::group(['before'=>'is_admin-or-is_super_admin'],function()
    {
        Route::get('reports.sale', ['as' => 'reports_sale', 'uses' => 'OrdersController@sale']);
        Route::post('reports.sale', ['as' => 'reports_sale', 'uses' => 'OrdersController@sale']);

        /**
         *
         * Reportes de Compras
         *
         */
        Route::get('reports.buy', ['as' => 'reports_buy', 'uses' => 'OrdersController@buy']);
        Route::post('reports.buy', ['as' => 'reports_buy', 'uses' => 'OrdersController@buy']);

        /**
         *
         * Ventas por [day,month]
         *
         */
        Route::get('reports.sales/{by}/{type}', ['as' => 'reports_by', 'uses' => 'OrdersController@sales_by']);
    });
});