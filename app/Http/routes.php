<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

/* METODOS PERTENECIENTES AL MAIN DE LA APP ##################################### */

Route::get('/', 'mainController@index');
Route::get('index', 'mainController@index');

/* METODOS PERTENECIENTES A LA GESTION DE LA APP ################################ */

Route::get('gestion', 'gestionController@index');

/* METODOS DE LOGIN ############################################################# */

// Rutas de autenticacion
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Rutas de registro
Route::get('registro', 'Auth\AuthController@getRegister');
Route::post('registro', 'Auth\AuthController@postRegister');

/* METODOS DE LOGIN CON FACEBOOK ################################################ */

Route::get('facebook', 'mainController@redirectToProvider');

Route::get('facebook/callback', 'mainController@handleProviderCallback');

/* METODOS DE LOGIN POR LA APP ################################################## */

/* METODOS DE GESTION POR LA APP ################################################ */

Route::get('inicio','gestionController@index');
Route::get('establecimiento','gestionController@establecimiento');
Route::get('cliente','gestionController@cliente');
Route::get('menu','gestionController@menu');

//post de gestion

//Ruta de transporte de grid datos establecimiento en la vista establecimientos
Route::post('postbdestablecimiento','gestionController@postbdestablecimiento');
Route::post('postbdusuario','gestionController@postbdusuario');
Route::post('postbdmenu','gestionController@postbdmenu');

/* METODOS DE PRUEBA ############################################################ */

Route::get('main/modal', 'mainController@getViewModal');

Route::get('main/modaltest', 'mainController@modaltest');

Route::get('main/modalformulario', 'mainController@getModalFormulario');

Route::get('main/tesProcedimiento', 'mainController@getViewProcedimientos');

Route::post('main/modalformulario', 'mainController@postMamodalFormulario');

Route::post('main/usuarioid', 'mainController@postprueba');
