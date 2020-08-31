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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission;
use Spatie\Permission\Contracts\Role;

Route::get('/',function(){
     return view('welcome');
 });

Auth::routes();
//Route:: resource('/admin','adminController');
Route::post('/admin/destroy/{id}','adminController@destroy')->name('admin.delete');


Route::group(['middleware' => ['role:admin']], function () {
    Route:: resource('/admin','adminController');
 });



Route::get('/restaurants', 'RestaurantController@index');
Route::get('/restaurants/create', 'RestaurantController@create')->name('restaurants.create');
Route::get('/restaurants/{restaurant}', 'RestaurantController@show')->name('restaurants.show');
Route::post('/restaurants', 'RestaurantController@store')->name('restaurants.store');
Route::get('/restaurants/editRestaurant/{id}', 'RestaurantController@edit')->name('restaurants.edit');
Route::post('/restaurants/destroy/{id}','RestaurantController@destroy')->name('restaurants.delete');
Route::patch('/restaurants/update/{id}','RestaurantController@update')->name('restaurants.update');


Route::get('/menus/create', 'MenuController@create')->name('menus.create');
Route::post('/menus', 'MenuController@store')->name('menus.store');
Route::get('/menus/editMenu/{id}', 'MenuController@edit')->name('menus.edit');
Route::get('/menus/destroy/{id}','MenuController@destroy')->name('menus.delete');
Route::patch('/menus/update/{id}','MenuController@update')->name('menus.update');

Route::get('/menu_types/create', 'MenuTypeController@create')->name('menu_types.create');
Route::get('/menu_types/{menu_type}', 'MenuTypeController@show')->name('menu_types.show');
Route::post('/menu_types', 'MenuTypeController@store')->name('menu_types.store');
Route::get('/menu_types/edit/{id}', 'MenuTypeController@edit')->name('menu_types.edit');
Route::get('/menu_types/destroy/{id}','MenuTypeController@destroy')->name('menu_types.delete');
Route::patch('/menu_types/update/{id}','MenuTypeController@update')->name('menu_types.update');
Route::get('/menu_types', 'MenuTypeController@index');

//user Register
Route::get('users/registeration', 'Auth\RegisterController@registerationForm');
Route::post('users/register', 'Auth\RegisterController@userRegister');

//customer register
Route::get('customers/register','Auth\RegisterController@customerRegisterationForm');
Route::post('customers/registeration','Auth\RegisterContoller@customerRegisteration');

//user Login
Route::get('users/login', 'Auth\LoginController@create');
Route::post('users/login', 'Auth\LoginController@store');
Route::post('/logout', 'Auth\LoginController@logout');

Route::patch('product/cart','ProductContoller@cart');
Route::post('product/delete','ProductController@delete');
//customer login
Route::get('customers/login','Auth\LoginContoller@create');
Route::post('customers/login','Auth\LoginController@store');
Route::post('customers/logout','Auth\LoginController@logout');

Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::get('users/editAccount/{id}', 'UserController@edit')->name('users.edit');

/*Customer*/
Route::get('/foodDelivery/home','CustomerController@home');
Route::get('/foodDelivery','CustomerController@index')->name('foodDelivery.index');
Route::get('/foodDelivery/show/{id}','CustomerController@show')->name('foodDelivery.show');

//cart
Route::get('foodDelivery/cart', 'MenuContoller@cart'); 
Route::get('foodDelivery/add-to-cart/{id}', 'MenuController@addToCart');
Route::patch('foodDelivery/update-cart', 'ProductsController@update');
Route::delete('foodDelivery/remove-from-cart', 'ProductsController@remove');

Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('/', 'Auth\UserController');
//////
// Route::resource('/admin','RestaurantController');

// Route::resource('/restaurants', 'MenuController');
// Route::resource('restaurant' , 'RestaurantController');



 
