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
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('horariosucursal', 'registroController@getHorarioSucursal');


/* METODOS DE LOGIN CON FACEBOOK ################################################ */

Route::get('facebook', 'mainController@redirectToProvider');

Route::get('facebook/callback', 'mainController@handleProviderCallback');

/* METODOS DE LOGIN POR LA APP ################################################## */

/* METODOS DE GESTION POR LA APP ################################################ */

/* MODULO GESTION INICIO ######################################################## */

Route::get('inicio', 'gestionController@index');

/* MODULO GESTION ESTABLECIMIENTO   ############################################# */
Route::get('establecimiento', 'gestionController@getEstablecimiento');/*RUTA DE LA VISTA/ DE LA GRID DE ESTABLECIMIENTO #################### */
Route::get('establecimientocliente', 'gestionController@getEstablecimientoCliente');/*RUTA DE LA VISTA/ DE LOS ESTABLECIMIENTOS DEL CLIENTE #################### */
Route::get('getModalEstablecimientoCliente/{id}', 'gestionController@getEstablecimientoCliente');/*RUTA DEL MODAL/VER DETALLES /DE LOS ESTABLECIMIENTOS DEL CLIENTE #################### */


Route::post('postbdestablecimiento', 'gestionController@postbdestablecimiento');/*RUTA DEL POST/ DE LA GRID DE ESTABLECIMIENTO #################### */
Route::get('modalestablecimiento/{id}', 'gestionController@getmodalestablecimiento');/* RUTA DEL MODAL/VER DETALLES/ DEL INFO RESTANTE DE ESTABLECIMIENTO ###########*/
Route::get('registroestablecimiento/{cliente}', 'registroController@getRegistroEstablecimiento');/* RUTA DE LA VISTA DEL REGISTRO DEL ESTABLECIMIENTO  #################*/
Route::post('registroestablecimiento', 'registroController@postRegistroEstablecimiento')->name('registroestablecimiento');/* RUTA DEL POST/ REGISTRO DEL ESTABLECIMINTO #############*/


/* MODULO GESTION CLIENTE  #####################################################  */
Route::get('cliente', 'gestionController@getCliente'); /* RUTA DE LA VISTA/ DE LA GRID DE CLINTES######################################### */
Route::post('postbusuario', 'gestionController@postbusuario'); /* RUTA DEL POST/ DE LA GRID DE LOS USUARIOS############################ */
Route::get('modalcliente/{id}', 'gestionController@getmodalcliente');/* RUTA DE MODAL / VER DETALLES/ DE LA INFO RESTANTE DE CLIENTES##### */
Route::get('clienteestablecimiento', 'registroController@getClienteEstablecimiento');/* RUTA DE LA VISTA/ DEL REGISTRO DE  LA INFO FALTANTE EN CLIENTES########### */
Route::post('clienteestablecimiento', 'registroController@postClienteEstablecimiento');/* RUTA DEL POST/ DEL REGISTRO DE LA INFO FALTANTE EN CLIENTES########################## */

/* MODULO GESTION MENU  ########################################################  */
Route::get('menu', 'gestionController@getMenu'); /* RUTA DE LA VISTA/ DE LA GRID DE LAS CARTAS DE LOS MENUS########################### */
Route::post('postbdmenu', 'gestionController@postbdmenu'); /* RUTA DEL POST/ DE LA GRID DE LAS CARTAS DE LOS MENUS############################ */
Route::get('registromenu', 'registroController@getRegistroMenu');/* RUTA DE LA VISTA/ DEL REGISTRO DE LOS MENUS####################### */

/* MODULO GESTION PLATOS DEL MENU  #############################################  */
Route::get('menuplato', 'gestionController@getMenuplato');/* RUTA DE LA VISTA/ DE LA GRID DE LOS PLATOS DE LOS MENUS############################ */
Route::post('postbdmenuplato', 'gestionController@postbdmenuplato');/* RUTA DE POST/ DE LA GRID DE LOS PLATOS DE LOS MENUS############################ */


/* MODULO GESTION CATEGORIAS DEL MENU  #########################################  */
Route::get('menucategoria', 'gestionController@getMenuCategoria'); /* RUTA DE LA VISTA/ DE LA GRID DE LAS CATEGORIAS DEL MENU############################ */
Route::post('postbdmenucategoria', 'gestionController@postbdmenucategoria');/* RUTA DE POST/ DE LA GRID DE LAS CATEGORIAS DEL MENU############################ */
Route::post('getDropDownCategoria', 'registroController@getDropDownCategoria');/* RUTA DEL POST/ DE LA LISTA DESPLEGABLE DE LAS CATEGORIAS############################ */


/* MODULO GESTION SUCURSALES DEL MENU  ##########################################  */
Route::get('menusucursal', 'gestionController@getMenuSucursal');/* RUTA DE  LA VISTA/ DE LA GRID DE LAS  SUCURSALES DE LOS MENUS############################ */
Route::post('postbdmenusucursal', 'gestionController@postbdmenusucursal');/* RUTA DEL POST/ DE LA GRID DE LOS DE LAS SUCURSALES DE LOS MENUS############################ */


/* MODULO GESTION PLATOS  #######################################################  */
Route::get('platos', 'gestionController@getPlatos');/* RUTA DE LA VISTA/ DE LA GRID DE LOS PLATOS############################ */
Route::post('postbdplatos', 'gestionController@postbdplatos');/* RUTA DEL POST/ DE LA GRID DE LOS PLATOS############################ */
Route::get('modalplato', 'registroController@modalPlato');/* RUTA DEL MODAL/ DE LOS PLATOS EN EL MENU############################ */
Route::get('registroplato', 'registroController@getRegistroPlato');/* RUTA DE LA VISTA/ DEL REGISTRO DE PLATOS############################ */
Route::post('postregistroplato', 'registroController@postRegistroPlato');/* RUTA DEL POST/ DEL REGISTRO DE PLATOS############################ */


/* MODULO GESTION GALERIA  ######################################################  */
Route::get('galeria', 'gestionController@getGaleria');/* RUTA DE LA VISTA/ DE LA GRID DE LA GALERIA############################ */
Route::post('postbdgaleria', 'gestionController@postbdgaleria');/* RUTA DEL POST/ DEL LA GRID DE LA GALERIA############################ */

/* MODULO GESTION PUNTUACION  ###################################################  */
Route::get('puntuacion', 'gestionController@getPuntuacion');/* RUTA DE LA VISTA/ DEL LA GRID DE LAS PUNTUACIONES############################ */
Route::post('postbdpuntuacion', 'gestionController@postbdpuntuacion');/* RUTA DEL POST/ DE LA GRID DE LAS PUNTUACIONES ########################## */


/* MODULO GESTION SUCURSALES  ###################################################  */
Route::get('sucursal/{idEstablecimiento}', 'gestionController@getSucursal');/* RUTA DE LA VISTA/ DE LA GRID DE LAS SUCURSALES############################ */
Route::post('getDatosSucursalById', 'gestionController@getDatosSucursalById');/* RUTA DEL POST/ DE LA GRID DE LAS SUCURSALES############################ */
Route::get('sucursal/modalsucursal/{id}', 'gestionController@getModalSucursal');/* RUTA DEL MODAL/VER DETALLES DE SUCURSALES############################ */
Route::get('registrosucursal/{id}', 'registroController@getRegistroSucursal');/* RUTA DE LA VISTA/ DEL REGISTRO DE LAS SUCURSALES############################ */
Route::post('procesarRegistroSucursal', 'registroController@postRegistroSucursal');/* RUTA DEL POST/ DEL REGISTRO DE LAS SUCURSALES############################ */
Route::get('sucursalcliente/{id}', 'gestionController@getSucursalCliente');/* RUTA DE LA VISTA/ DE LAS SUCURSALES DE LOS CLIENTES############################ */


/* MODULO GESTION INFORMACION BASICA ############################################  */

Route::get('informacion', 'gestionController@getInformacion');/* RUTA DE LA VISTA/  DE LA GRID DE LA INFORMACION BASICA Y COMENTARIOS############################ */
Route::post('postbdinformacion', 'gestionController@postbdinformacion');/* RUTA DEL POST/DE LA GRID DE LA INFORMACION BASICA Y COMENTARIOS############################ */


/* METODOS DE PRUEBA ############################################################ */

Route::get('main/modal', 'mainController@getViewModal');

Route::get('main/modaltest', 'mainController@modaltest');

Route::get('main/modalformulario', 'mainController@getModalFormulario');

Route::get('main/tesProcedimiento', 'mainController@getViewProcedimientos');

Route::post('main/modalformulario', 'mainController@postMamodalFormulario');

Route::post('main/usuarioid', 'mainController@postprueba');
