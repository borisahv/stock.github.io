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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

//Item Routes
Route::resource('item', 'ItemController');
Route::any('/createitem', 'ItemController@create')->name('createItem');
Route::any('/edititem/{id}', 'ItemController@edit')->name('editItem');
Route::any('/showitem', 'ItemController@show')->name('showItem');
Route::any('/inventory', 'ItemController@inventory')->name('inventory');
Route::any('/editinventory/{id}', 'ItemController@editInventory')->name('editInventory');
Route::any('/deleteitem/{id}', 'ItemController@delete')->name('deleteItem');

//Customer Routes
Route::resource('customer', 'CustomerController');
Route::any('/createcustomer', 'CustomerController@create')->name('createCustomer');
Route::any('/editcustomer/{id}', 'CustomerController@edit')->name('editCustomer');
Route::any('/showcustomer', 'CustomerController@show')->name('showCustomer');
Route::any('/deletecustomer/{id}', 'CustomerController@delete')->name('deleteCustomer');

//Command Routes
Route::resource('command', 'CommandController');
Route::any('/createcommand', 'CommandController@create')->name('createCommand');
Route::any('/editcommand/{id}', 'CommandController@edit')->name('createCommand');
Route::any('/showcommand', 'CommandController@show')->name('showCommand');

//Supplier Routes
Route::resource('supplier', 'SupplierController');
Route::any('/createsupplier', 'SupplierController@create')->name('createSupplier');
Route::any('/editsupplier/{id}', 'SupplierController@edit')->name('editSupplier');
Route::any('/showsupplier', 'SupplierController@show')->name('showSupplier');
Route::any('/deletesupplier/{id}', 'SupplierController@delete')->name('deleteSupplier');
Route::any('/createsupplierajax', 'SupplierController@createAjax')->name('createSupplierAjax');

//Category Routes
Route::resource('category', 'CategoryController');
Route::any('/createcategory', 'CategoryController@create')->name('createCategory');
Route::any('/editcategory/{id}', 'CategoryController@edit')->name('editCategory');
Route::any('/showcategory', 'CategoryController@show')->name('showCategory');
Route::any('/deletecategory/{id}', 'CategoryController@delete')->name('deleteCategory');
Route::any('/createcategoryajax', 'CategoryController@createAjax')->name('createCategoryAjax');

//Basket Routes
Route::resource('basket', 'BasketController');
Route::any('/createbasket', 'BasketController@create')->name('createBasket');
Route::any('/editbasket/{id}', 'BasketController@edit')->name('editBasket');
Route::any('/showbasket', 'BasketController@show')->name('showBasket');

//Sale Routes
Route::resource('sale', 'SaleController');
Route::any('/createsale/{id?}', 'SaleController@create')->name('createSale');
Route::any('/editsale/{id}', 'SaleController@edit')->name('editSale');
Route::any('/showsale', 'SaleController@show')->name('showSale');
Route::any('/print/{id}', 'SaleController@print')->name('print');
Route::any('/togglepaid', 'SaleController@togglePaid')->name('togglePaid');

//Search Routes
Route::any('/search', 'SaleController@search')->name('search');





