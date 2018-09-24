<?php

//Rutas de Auntenticación
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



Route::get('reports', 'ReportController@index');
Route::get('/panel/reports', 'ReportController@reportProducts');


//ruta para pedidos
Route::resource('orders', 'OrderController');
Route::get('/order/{id}','OrderController@getCharacterization');
Route::get('/panel/getOrder','AdministratorController@requestTable');
Route::get('/panel/getOrderFinished','AdministratorController@requestTableFinished');
Route::get('/panel/getOrderFinishedCheck','AdministratorController@requestTableCheck');
Route::get('/OrderProduction/getProductionOrder','ProductionOrdersController@dataTable');
Route::get('/ProductionOrders/update/{id}/{status}','ProductionOrdersController@update');

//Ruta para mostrar el detalle de la receta
Route::get('RecipeHasProduct/{id}/show' , 'RecipeHasProductController@edit');
Route::get('RecipeHasProduct/{id}/{order}/details','RecipeHasProductController@show');

Route::group(['middleware' => ['auth', 'admin']], function () {


//Ruta para resultados de aprendizaje
Route::get('/learning_results/get', 'LearningResultController@learningResultsList');
Route::resource('learning_results', 'LearningResultController', ['except' => 'index', 'create', 'show', 'destroy']);

//Rutas para presentación del producto
Route::get('/presentations/get', 'PresentationController@presentationsList');
Route::resource('presentations', 'PresentationController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta para competencias
Route::get('/competences/get', 'CompetenceController@competencesList');
Route::resource('competences', 'CompetenceController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta para Roles
Route::get('/roles/get', 'RoleController@rolesList');
Route::resource('roles', 'RoleController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta para tipos de documentos
Route::get('/document_types/get', 'DocumentTypeController@documentTypesList');
Route::resource('document_types', 'DocumentTypeController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta para caracterizaciones
Route::get('/characterizations/get', 'CharacterizationController@characterizationsList');
Route::get('/characterizations/status/{id}/{status}', 'CharacterizationController@status');
Route::resource('characterizations', 'CharacterizationController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta para centros de formación
Route::get('/locations/get', 'LocationController@locationsList');
Route::get('/locations/status/{id}/{status}', 'LocationController@status');
Route::resource('locations', 'LocationController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta para regionales
Route::get('/regions/get', 'RegionController@regionsList');
Route::resource('regions', 'RegionController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta para complejos
Route::get('/complex/get', 'ComplexController@complexList');
Route::resource('complex', 'ComplexController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta para programas
Route::get('/programs/get', 'ProgramController@programsList');
Route::get('/programs/status/{id}/{status}', 'ProgramController@status');
Route::resource('programs', 'ProgramController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta para iva
Route::get('/taxes/get','TaxesController@taxesList');
Route::resource('taxes', 'TaxesController', ['except' => 'show','destroy','create']);

//Rutas para crud de Contratos
Route::get('/contracts/get', 'ContractController@contractsList');
Route::get('/contract/measure_unit/{id}', 'ContractController@getMeasureUnit');
Route::resource('contracts', 'ContractController', ['except' => 'show', 'destroy']);
Route::get('contract/pdf', 'ContractController@generatePDF');

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
Route::post('/panel/updateBudget', 'OrderRecipeController@checkValue');
Route::get('/panel/check/','OrderRecipeController@update');

//Rutas para Proveedores
Route::get('/providers/get', 'ProviderController@providersList');
Route::get('/providers/status/{id}/{status}', 'ProviderController@status');
Route::resource('providers', 'ProviderController', ['except' => 'show', 'destroy']);

// Rutas para recetas
Route::get('/recipes/get', 'RecipeController@recipesList');
Route::get('/recipes/status/{id}/{status}', 'RecipeController@status');
Route::resource('recipes', 'RecipeController', ['except' => 'index', 'create', 'show', 'destroy']);
Route::get('/panel/getMeasure/{id}', 'AdministratorController@getMeasure');

//Ruta vista administrador
Route::get('panel', 'AdministratorController@panel');

//Ruta para configuraciones (maestras)
Route::get('configurations', 'AdministratorController@configurations');

//Ruta para detalle recetas
Route::resource('RecipeHasProducts' , 'RecipeHasProductController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta unidad de medida
Route::get('/measures/get', 'MeasureUnitController@measuresList');
Route::resource('measures', 'MeasureUnitController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta tipo de producto
Route::get('/product_types/get', 'ProductTypeController@productTypesList');
Route::resource('product_types', 'ProductTypeController', ['except' => 'index', 'create', 'show', 'destroy']);

//Ruta para registrar la receta editada
Route::resource('orderRecipeEdit','OrderRecipeController',['except '=> 'show','edit','update','destroy']);

//Ruta para modificar el estado de la orden
Route::get('/orders/updateStatus/{id}/{status}','OrderController@updateStatus');
Route::get('/orderRecipeEdit/updateQuantity/{id}','OrderRecipeController@updateQuantity' , ['except '=> 'show','edit','update','destroy']);

// Ruta para registrar la orden de producción de centro con detalles a productos.
Route::post('productionHasProducts','ProductionHasProductsController@store');
Route::get('productionCenter/remission/{id}', 'ProductionOrdersController@orderRemission');
Route::get('productionCenter/ajaxtable/{id}', 'ProductionHasProductsController@ajaxModal');
Route::post('productionCenter/allRemisions', 'ProductionOrdersController@selectedOrderRemission');
//ruta para generar pdf de las nuevas ordenes al proveedor
Route::get('pdf/orderProvider/{id}' , 'OrderController@pdfRemission');


});

// ------------------------------------------- Rutas para el Rol Directivo -------------------------------------------
Route::group(['middleware' => ['auth', 'executive']], function () {


Route::resource('budgets', 'BudgetController', ['except' => 'show', 'destroy']);
Route::get('/budgets/get', 'BudgetController@budgetsList');
  //Ruta de reportes
// Route::get('reports', 'ReportController@index');

});

Route::group(['middleware' => ['auth', 'leader']], function ()
{
  Route::resource('Production_orders','ProductionOrdersController', ['except' => 'show','edit','update','destroy']);
});
