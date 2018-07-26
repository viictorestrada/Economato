<?php

//Rutas de Auntenticación
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Ruta vista administrador
Route::get('panel', 'AdministratorController@panel')->middleware('auth', 'administrator' or 'executive');

//Ruta para configuraciones (maestras)
Route::get('configurations', 'AdministratorController@configurations')->middleware('auth', 'admin' or 'executive');

//Rutas para crud de tablas maestras
Route::get('/learning_results/get', 'LearningResultController@learningResultsList');
Route::resource('learning_results', 'LearningResultController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/presentations/get', 'PresentationController@presentationsList');
Route::resource('presentations', 'PresentationController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/competences/get', 'CompetenceController@competencesList');
Route::resource('competences', 'CompetenceController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/roles/get', 'RoleController@rolesList');
Route::resource('roles', 'RoleController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/document_types/get', 'DocumentTypeController@documentTypesList');
Route::resource('document_types', 'DocumentTypeController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/characterizations/get', 'CharacterizationController@characterizationsList');
Route::get('/characterizations/status/{id}/{status}', 'CharacterizationController@status');
Route::resource('characterizations', 'CharacterizationController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/locations/get', 'LocationController@locationsList');
Route::get('/locations/status/{id}/{status}', 'LocationController@status');
Route::resource('locations', 'LocationController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/regions/get', 'RegionController@regionsList');
Route::resource('regions', 'RegionController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/complex/get', 'ComplexController@complexList');
Route::resource('complex', 'ComplexController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/programs/get', 'ProgramController@programsList');
Route::get('/programs/status/{id}/{status}', 'ProgramController@status');
Route::resource('programs', 'ProgramController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/storages/get', 'StorageController@storagesList');
Route::resource('storages', 'StorageController', ['except' => 'index', 'create', 'show', 'destroy']);

// Rutas para recetas
Route::get('/recipes/get', 'RecipeController@recipesList');
Route::get('/recipes/status/{id}/{status}', 'RecipeController@status');
Route::resource('recipes', 'RecipeController', ['except' => 'index', 'create', 'show', 'destroy']);
Route::get('/panel/getMeasure/{id}', 'AdministratorController@getMeasure');

Route::resource('RecipeHasProducts' , 'RecipeHasProductController', ['except' => 'index', 'create', 'show', 'destroy']);
Route::get('RecipeHasProduct/{id}/show' , 'RecipeHasProductController@edit');

Route::get('/measures/get', 'MeasureUnitController@measuresList');
Route::resource('measures', 'MeasureUnitController', ['except' => 'index', 'create', 'show', 'destroy']);

Route::get('/product_types/get', 'ProductTypeController@productTypesList');
Route::resource('product_types', 'ProductTypeController', ['except' => 'index', 'create', 'show', 'destroy']);

//Rutas para crud de Contratos
Route::get('/contracts/get', 'ContractController@contractsList');
Route::get('/contract/measure_unit/{id}', 'ContractController@getMeasureUnit');
Route::resource('contracts', 'ContractController', ['except' => 'show', 'destroy']);

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

//Rutas para Presupuesto
Route::post('aditionalBudget', 'BudgetController@aditionalBudgetCreate');
ROute::get('budgets/status/{id}/{status}', 'BudgetController@status');
Route::get('/budgets/get', 'BudgetController@budgetsList');
Route::resource('budgets', 'BudgetController', ['except' => 'show', 'destroy']);

//Rutas para Proveedores
Route::get('/providers/get', 'ProviderController@providersList');
Route::resource('providers', 'ProviderController', ['except' => 'show', 'destroy']);

//ruta para pedidos
Route::get('orders', function () {
  return view('orders/ordersconfirm');
});

//ruta para iva
Route::get('/taxes/get','TaxesController@taxesList');
Route::resource('taxes', 'TaxesController', ['except' => 'show','destroy','create']);
