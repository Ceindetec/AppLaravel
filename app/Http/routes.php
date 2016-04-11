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

/* MODULO GESTION INICIO ######################################################## */

Route::get('inicio','gestionController@index');

/* MODULO GESTION ESTABLECIMIENTO   ############################################# */
Route::get('establecimiento','gestionController@establecimiento');
Route::post('postbdestablecimiento','gestionController@postbdestablecimiento');
Route::get('modalestablecimiento/{id}', 'gestionController@getmodalestablecimiento');


/* MODULO GESTION CLIENTE  #####################################################  */
Route::get('cliente','gestionController@cliente');
Route::post('postbusuario','gestionController@postbusuario');
Route::get('modalcliente/{id}', 'gestionController@getmodalcliente');



/* MODULO GESTION MENU  ########################################################  */
Route::get('menu','gestionController@menu');
Route::post('postbdmenu','gestionController@postbdmenu');



/* MODULO GESTION PLATOS DEL MENU  #############################################  */
Route::get('menuplato','gestionController@menuplato');
Route::post('postbdmenuplato','gestionController@postbdmenuplato');


/* MODULO GESTION CATEGORIAS DEL MENU  #########################################  */
Route::get('menucategoria','gestionController@menucategoria');
Route::post('postbdmenucategoria','gestionController@postbdmenucategoria');

/* MODULO GESTION SUCURSALES DEL MENU  ##########################################  */
Route::get('menusucursal','gestionController@menusucursal');
Route::post('postbdmenusucursal','gestionController@postbdmenusucursal');
Route::get('modalsucursal/{id}', 'gestionController@getmodalsucursal');



/* MODULO GESTION PLATOS  #######################################################  */
Route::get('platos','gestionController@platos');
Route::post('postbdplatos','gestionController@postbdplatos');


/* MODULO GESTION GALERIA  ######################################################  */
Route::get('galeria','gestionController@galeria');
Route::post('postbdgaleria','gestionController@postbdgaleria');

/* MODULO GESTION PUNTUACION  ###################################################  */
Route::get('puntuacion','gestionController@puntuacion');
Route::post('postbdpuntuacion','gestionController@postbdpuntuacion');


/* MODULO GESTION SUCURSALES  ###################################################  */
Route::get('sucursal','gestionController@sucursal');
Route::post('postbdsucursal','gestionController@postbdsucursal');

/* MODULO GESTION INFORMACION BASICA ############################################  */

Route::get('informacion','gestionController@informacion');
Route::post('postbdinformacion','gestionController@postbdinformacion');


/* METODOS DE PRUEBA ############################################################ */

Route::get('main/modal', 'mainController@getViewModal');

Route::get('main/modaltest', 'mainController@modaltest');

Route::get('main/modalformulario', 'mainController@getModalFormulario');

Route::get('main/tesProcedimiento', 'mainController@getViewProcedimientos');

Route::post('main/modalformulario', 'mainController@postMamodalFormulario');

Route::post('main/usuarioid', 'mainController@postprueba');
