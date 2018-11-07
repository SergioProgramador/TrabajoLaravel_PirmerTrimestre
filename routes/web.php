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
//Eliminar una empresa
Route::delete('/delcompany/{id}', function($id){
});

Route::get('/home', 'HomeController@index')->name('home');
