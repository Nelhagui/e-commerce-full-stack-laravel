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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// HOME
Route::get('/', 'HomeController@index');

// ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkrole']], function() {
    Route::get('/home', 'AdminController@index')->name('dashboard-home');
    Route::get('/usuarios', 'UserController@index')->name('admin-users-list');
    Route::get('/categorias', 'CategoryController@index')->name('admin-categories-list');
    Route::get('/servicios', 'ServiceController@index')->name('admin-services-list');

});

// SERVICE 
Route::get('/servicio/todos', 'ServiceController@allservices')->name('all-services');
Route::get('/servicios', 'ServiceController@index')->name('services-list');
Route::get('/servicio/{id}/edit', 'ServiceController@edit')->name('service-edit');
Route::delete('servicio/{id}', 'ServiceController@destroy')->name('service-destroy');
Route::get('/servicio/agregar', 'ServiceController@create')->name('service-add')->middleware('auth');
Route::post('/servicio/agregar','ServiceController@store')->name('service-store')->middleware('auth');
Route::patch('/servicio/{id}/edit', 'ServiceController@update')->name('service-update');
Route::get('/servicio/detalle/{id}', 'ServiceController@show')->name('detailservice');


// USER
Route::get('/profile', 'UserController@profile')->name('profile')->middleware('auth');
Route::post('/profile', 'UserController@update_avatar');


// CART
Route::post('/carrito/agregar', 'ServiceController@addCart')->middleware('auth');
Route::get('/carrito', 'CartController@index')->name('cart')->middleware('auth');
Route::get('/carrito/{id}/quitar', 'CartController@remove')->name('cart.remove');

//FAQS
Route::get('/preguntasfrecuentes', 'preguntasFrecuentesController@index');