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

Route::get('horariosucursal', 'registroController@getHorarioSucursal');

/* METODOS DE LOGIN CON FACEBOOK ################################################ */

Route::get('facebook', 'mainController@redirectToProvider');

Route::get('facebook/callback', 'mainController@handleProviderCallback');

/* METODOS DE LOGIN POR LA APP ################################################## */

// Authentication routes...


Route::get('login', 'Auth\AuthController@getLogin')->name('login');
/*Ruta que llama a un modal para login de usuario*/
Route::get('login/modal', 'gestionController@modalLogin')->name('login.modal');
Route::get('registro', ['as' => 'register', 'uses' =>'Auth\AuthController@getRegister']);
Route::post('login', 'Auth\AuthController@postLogin');
Route::post('login/modal', 'gestionController@modalpostLogin')->name('loginpost');
Route::get('logout', 'Auth\AuthController@getLogout');


/* METODOS DE GESTION POR LA APP ################################################ */

/* MODULO GESTION INICIO ######################################################## */

Route::get('inicio', 'gestionController@index')->name('inicio');

/* MODULO GESTION ESTABLECIMIENTO   ############################################# */
/*ruta de la vista del establecimiento que muestra la grid // y post que envia los datos */
Route::get('establecimiento', 'gestionController@getEstablecimiento')->name('establecimiento');
Route::post('postestablecimiento', 'gestionController@postEstablecimiento');

/*ruta del modal que trae los todos los datos del estableimiento en el boton ver detalles*/
Route::get('modalestablecimiento/{id}', 'gestionController@getModalEstablecimiento');

/*ruta de la vista del establecimiento del cliente by login*/
Route::get('establecimientocliente', 'gestionController@getEstablecimientoCliente')->name('establecimientocliente');

//####ruta que hay que averiguar que hace
/*modal ver detalles del establecimiento del cliente by ID */
Route::get('getModalEstablecimientoCliente/{id}', 'gestionController@getEstablecimientoCliente');


/*rutas del registro de establecimiento // y post que registra los datos en la BD */
Route::get('registroestablecimiento/{cliente}', 'registroController@getRegistroEstablecimiento');
Route::post('registroestablecimiento', 'registroController@postRegistroEstablecimiento')->name('registroestablecimiento');

/*rutas modal editar del establecimiento by ID*/
Route::get('modaleditestablecimiento/{id}', 'gestionController@getEditModalEstablecimiento');
Route::post('modaleditestablecimiento', 'gestionController@postEditModalEstablecimiento')->name('edit.establecimiento');

/* MODULO GESTION CLIENTE  #####################################################  */
/*ruta de la vista del cliente que muestra la grid */
Route::get('cliente', 'gestionController@getCliente')->name('cliente');

/*rutas de la vista que envia los datos del cliente */
Route::post('postbusuario', 'gestionController@postCliente');

/*rutas del modal de la vista cliente que trae todos las datos de cliente by ID */
Route::get('modalcliente/{id}', 'gestionController@getmodalcliente');

/*ruta de la vista del registro de la informacion faltante  del cliente // y post que regitra por ID */
Route::get('clienteestablecimiento', 'registroController@getClienteEstablecimiento');
Route::post('clienteestablecimiento', 'registroController@postClienteEstablecimiento');

/*ruta del modal editar de los cliente que trae los datos by ID // y post que edita by ID */
Route::get('modaleditcliente/{id}', 'gestionController@getModalEditCliente');
Route::post('modaleditcliente', 'gestionController@postModalEditCliente')->name('edit.cliente');

/*ruta que del combobox que trae los tipos de usuarios  */
Route::post('getDatosDropdDowntusuario', 'gestionController@getDropDownTusuario');


/* MODULO GESTION MENU  ########################################################  */

/*ruta de la vista del menu que muestra la grid  // y post que envia los datos del menu */
Route::get('menu', 'gestionController@getMenu')->name('menu');
Route::post('postbdmenu', 'gestionController@postMenu');

/*ruta que trae la vista del registro del menu */
Route::get('registromenu', 'registroController@getRegistroMenu');

/*ruta del modal editar que trae los datos by ID// y post que edita los datos by ID */
Route::get('modaleditmenu/{id}', 'gestionController@getModalEditMenu');
Route::post('modaleditmenu', 'gestionController@postModalEditMenu')->name('edit.menu');
/* */
Route::post('getdatosdropdownmenu', 'gestionController@getDropDownMenu');

/* MODULO GESTION PLATOS DEL MENU  #############################################  */

Route::get('menuplato', 'gestionController@getMenuplato')->name('menuplatos');
Route::post('postbdmenuplato',  'gestionController@postbdmenuplato');

Route::get('modaleditmenuplato/{id}', 'gestionController@getModalEditMenuPlato');
Route::post('modaleditmenuplato', 'gestionController@postModalEditMenuPlato')->name('edit.menuplatos');


/* MODULO GESTION CATEGORIAS DEL MENU  #########################################  */

/*ruta del la vista de las categorias por menu que muestra la grid // y post que envia los datos a la grid*/
Route::get('menucategoria', 'gestionController@getMenuCategoria')->name('menucategorias');
Route::post('postbdmenucategoria', 'gestionController@postMenuCategoria');

/*ruta del post del combobox que trae las categorias de los menus*/
Route::post('getDropDownCategoria', 'registroController@getDropDownCategoria');


/* MODULO GESTION SUCURSALES DEL MENU  ##########################################  */
/*ruta de la vista de sucursales que muestra la grid // y post que envia los datos a la grid*/
Route::get('menusucursal', 'gestionController@getMenuSucursal')->name('menusucursal');
Route::post('postbdmenusucursal', 'gestionController@postMenuSucursal');

/*ruta de la del modal editar que trae los datos de la sucursal By ID // y post que envia los datos para editar*/
Route::get('modaleditmenusucursal/{id}', 'gestionController@getEditMenuSucursal');
Route::post('modaleditmenusucursal', 'gestionController@postEditMenuSucursal')->name('edit.menusucursal');;


/* MODULO GESTION PLATOS  #######################################################  */

/*ruta de la vista de platos que muetra la grid// y el post que envia los datos a la grid */
Route::get('platos', 'gestionController@getPlatos')->name('platos');
Route::post('postbdplatos', 'gestionController@postPlatos');

Route::get('modalplato', 'registroController@modalPlato');

/*ruta de la vista de registro de los plato // y post que registra los datos*/
Route::get('registroplato', 'registroController@getRegistroPlato');
Route::post('postregistroplato', 'registroController@postRegistroPlato');

/*ruta del modal editar del plato que trae los datos by ID // y post que enviar los datos y los edita en la BD*/
Route::get('modaleditplato/{id}', 'gestionController@getEditPlato');
Route::post('modaleditplato', 'gestionController@postEditPlato')->name('edit.plato');


/* MODULO GESTION GALERIA  ######################################################  */

/*ruta de la vista de galeria que muestra la grid // y el post que envia los datos a la grid */
Route::get('galeria', 'gestionController@getGaleria')->name('galeria');
Route::post('postbdgaleria', 'gestionController@postGaleria');

/* MODULO GESTION PUNTUACION  ###################################################  */

/*ruta del la vista de puntuacion que muestra la grid // y el post que envia los datos a la grid*/
Route::get('puntuacion', 'gestionController@getPuntuacion')->name('puntuacion');
Route::post('postbdpuntuacion', 'gestionController@postPuntuacion');


/* MODULO GESTION SUCURSALES  ###################################################  */

/*ruta la vista de la sucursal by ID del establecimiento*/
Route::get('sucursal/{idEstablecimiento}', 'gestionController@getSucursal')->name('sucursal');

/*ruta que trae los datos de la sucursal By ID*/
Route::post('getDatosSucursalById', 'gestionController@getDatosSucursalById');

/*ruta del modal By id que trae todos los datos de sucursal*/
Route::get('sucursal/modalsucursal/{id}', 'gestionController@getModalSucursal');


/*ruta del registro de la sucursal que recibe un ID // y post que registra los datos de la sucursal*/
Route::get('registrosucursal/{id}', 'registroController@getRegistroSucursal');
Route::post('procesarRegistroSucursal', 'registroController@postRegistroSucursal');

/*ruta la vista de las sucursal del cliente By ID*/
Route::get('sucursalcliente/{id}', 'gestionController@getSucursalCliente')->name('sucursalCliente');

/* modal de la vista editar se las sucursales del cliente*/
Route::get('sucursalcliente/modaleditsucursal/{id}', 'gestionController@getEditSucursal');
Route::post('sucursalcliente/modaleditsucursal', 'gestionController@posttEditSucursal')->name('edit.sucursal');
/*ruta para el desplegable de las sucursales existentes*/
Route::post('getdatosdropdownsucursal', 'gestionController@getDropDownSucursal');


/* MODULO GESTION INFORMACION BASICA ############################################  */
/*ruta la vista de las informacion basica  y comentarios que muestra la grid// y post que envia los datos a la grid*/
Route::get('informacion', 'gestionController@getInformacion')->name('info');
Route::post('postbdinformacion', 'gestionController@postInformacion');

/* MODULO DE GEOLOCALIZACION ####################################################  */
Route::get('mapa','mainController@mapa');

/* MODULO FILTRADO ####################################################  */
/* Genera la vista de las sucursales que ya estan filtradas por nombre o categoria*/
Route::post('sucursales', 'mainController@SucuFiltrada');
/* Top Puntuados del Inicio*/
Route::get('/', 'mainController@topInicio');
/* Tops Puntuado Lista */
Route::get('puntuadolist','mainController@topPuntadosList');
/* Tops Visitados Lista */
Route::get('visitadolist','mainController@topVisitadoList');
/* Tops Editor Lista */
Route::get('edirtorlist','mainController@topEditorList');

/* Muestra las datos de una Sucursal Seleccionada */
Route::get('sucursalunica/{id}','mainController@unicaSucursal');


/* METODOS DE PRUEBA ############################################################ */

Route::get('prueba','mainController@pruebamapa');

Route::get('main/modal', 'mainController@getViewModal');

Route::get('main/modaltest', 'mainController@modaltest');

Route::get('main/modalformulario', 'mainController@getModalFormulario');

Route::get('main/tesProcedimiento', 'mainController@getViewProcedimientos');

Route::post('main/modalformulario', 'mainController@postMamodalFormulario');

Route::post('main/usuarioid', 'mainController@postprueba');
