<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PpalController@index');
Route::get('/nosotros', 'PpalController@nosotros');
Route::get('/contacto', 'PpalController@contacto');

Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function(){//middleware =>Auth significa que tiene que esta autentificado para poder entrar a esas rutas
	Route::get('/',[
		'uses' =>'PpalController@admin',
		'as' => 'admin']);
	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy',[
			'uses' => 'UsersController@destroy',
			'as' => 'admin.users.destroy'
		]);
	Route::resource('categorias','CategoriasController');
	Route::get('categorias/{id}/destroy',[
			'uses' => 'CategoriasController@destroy',
			'as' => 'admin.categorias.destroy'
		]);
	Route::resource('subcategorias','SubcategoriasController');
	Route::get('subcategorias/{id}/destroy',[
			'uses' => 'SubcategoriasController@destroy',
			'as' => 'admin.subcategorias.destroy'
		]);
	Route::resource('productos','ProductosController');
	Route::get('productos/{id}/destroy',[
			'uses' => 'ProductosController@destroy',
			'as' => 'admin.productos.destroy'
		]);
	Route::get('productos/{id}/subcategorias','ProductosController@subcategorias');
	
	
});

Route::get('/login',[ 
	'uses' =>'Auth\AuthController@getLogin',
	'as' =>'login']);
Route::post('/login',[ 
	'uses' =>'Auth\AuthController@postLogin',
	'as' =>'login']);
Route::get('/logout',[ 
	'uses' =>'Auth\AuthController@logout',
	'as' =>'logout']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|

Route::group(['middleware' => ['web']], function () {
    //
});
*/


