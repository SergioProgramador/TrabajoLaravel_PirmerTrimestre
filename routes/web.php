<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//RUTAS PARA LAS EMPRESAS
//Mostrar las empresas
Route::get('/listcompanies', 'CompanyController@index');
//Agregar una nueva empresa
Route::get('/addcompany', 'CompanyController@create');
Route::post('/addcompany', 'CompanyController@store');
//Editar una empresa
Route::get('/editcompany/{id}','CompanyController@edit');
Route::put('/editcompany/{id}','CompanyController@update');
//Eliminar una empresa
Route::delete('/delcompany/{id}', 'CompanyController@destroy');


//RUTAS PARA LOS CICLOS
//Crear ciclos
Route::get('/addgrade','GradeController@create');
Route::post('/addgrade','GradeController@store');
//Mostrar ciclos
Route::get('/listgrade', 'GradeController@index');
//Editar un ciclo
Route::get('/editgrade/{id}','GradeController@edit');
Route::post('/updategrade/{id}','GradeController@update');
Route::get('/updategrade/{id}','GradeController@update');
//Eliminar un ciclo
Route::post('/delgrade/{id}','GradeController@destroy');

//RUTAS PARAS LOS ALUMNOS

//RUTAS PARA LAS SOLICITUDES
//Mostrar las empresas
Route::get('/listpetitions', 'PetitionController@index');

//RUTAS PARA LOS LISTADOS


Route::get('/home', 'HomeController@index')->name('home');
