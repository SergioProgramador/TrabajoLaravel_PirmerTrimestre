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
Route::put('/editgrade/{id}','GradeController@update');
//Eliminar un ciclo
Route::delete('/delgrade/{id}', 'GradeController@destroy');

//RUTAS PARAS LOS ALUMNOS
//Crear alumnos
Route::get('/addstudent','StudentController@create');
Route::post('/addstudent','StudentController@store');
//Mostrar alumnos
Route::get('/liststudent', 'StudentController@index');
//Editar un alumno
Route::get('/editstudent/{id}','StudentController@edit');
Route::put('/editstudent/{id}','StudentController@update');
//Eliminar un alumno
Route::delete('/delstudent/{id}', 'StudentController@destroy');

//RUTAS PARA LAS SOLICITUDES
//Crear solicitud
Route::get('/addpetition','PetitionController@create');
Route::post('/addpetition','PetitionController@store');
//Mostrar las solicitudes
Route::get('/listpetitions', 'PetitionController@index');
//Editar una solicitud
Route::get('/editpetition/{id}','PetitionController@edit');
Route::put('/editpetition/{id}','PetitionController@update');
//Eliminar una solicitud
Route::delete('/delpetition/{id}', 'PetitionController@destroy');

//RUTAS PARA LOS LISTADOS
Route::get('/listDate', 'PetitionController@list1');
Route::get('/listGrades', 'PetitionController@list2');

Route::get('pdflist1', function(){
    $petitions=App\Petition::all();
    $pdf=PDF::loadView('list', ['petitions'=> $petitions]);
    return $pdf->download('petitionsbydate.pdf');
});
Route::get('pdflist2', function(){
    $petitions=App\Petition::all();
    $pdf=PDF::loadView('list2', ['petitions'=> $petitions]);
    return $pdf->download('petitionsbygrade.pdf');
});
Route::get('/home', 'HomeController@index')->name('home');
