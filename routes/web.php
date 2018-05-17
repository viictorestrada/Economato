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

//Rutas de Auntenticación
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Ruta vista administrador
Route::get('panel', function(){
  return view('administrator.panel');
})->middleware('auth');

//Ruta para configuraciones (maestras)
Route::get('configurations', 'AdministratorController@configurations')->middleware('auth', 'admin' or 'executive');

//Rutas para crud de tablas maestras
Route::resource('roles', 'RoleController', ['except' => 'index','create','show','destroy']);
Route::resource('document_types', 'DocumentTypeController', ['except' => 'index','create','show','destroy']);
Route::resource('characterizations', 'CharacterizationController', ['except' => 'index','create','show','destroy']);

Route::get('/locations/get', 'LocationController@locationsList');
Route::resource('locations', 'LocationController', ['except' => 'index','create','show','destroy']);

Route::get('/regions/get', 'RegionController@regionsList');
Route::resource('regions', 'RegionController', ['except' => 'index','create','show','destroy']);

Route::get('/programs/get', 'ProgramController@programsList');
Route::resource('programs', 'ProgramController', ['except' => 'index','create','show','destroy']);

Route::resource('storages', 'StorageController', ['except' => 'index','create','show','destroy']);
Route::resource('recipes', 'RecipeController', ['except' => 'index','create','show','destroy']);
Route::resource('measures', 'MeasureUnitController', ['except' => 'index','create','show','destroy']);
Route::resource('product_types', 'ProductTypeController', ['except' => 'index','create','show','destroy']);

//Rutas para crud de usuarios
Route::get('/users/get', 'UserController@usersList');
Route::get('users/status/{id}/{status}', 'UserController@status');
Route::resource('users', 'UserController', ['except' => 'show', 'destroy']);

//Rutas para crud de productos
Route::get('/products/get', 'ProductController@productsList');
Route::get('products/status/{id}/{status}', 'ProductController@status');
Route::resource('products', 'ProductController');

//Rutas para fichas
Route::get('/files/get', 'FileController@filesList');
Route::get('files/status/{id}/{status}', 'FileController@status');
Route::resource('files', 'FileController');
