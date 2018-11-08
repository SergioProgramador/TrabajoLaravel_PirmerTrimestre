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
Route::post('/editcompany/{id}','CompanyController@update');
//Eliminar una empresa
Route::delete('/delcompany/{id}','CompanyController@destroy');

//RUTAS PARA LOS CICLOS
Route::get('/listgrades', 'GradeController@index');

//RUTAS PARAS LOS ALUMNOS

//RUTAS PARA LAS SOLICITUDES

//RUTAS PARA LOS LISTADOS

Route::get('/home', 'HomeController@index')->name('home');
