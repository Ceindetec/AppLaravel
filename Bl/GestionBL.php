<?php

class GestionBL
{


private function __construct(){}
    {

    }

    /* MODULO GESTION ESTABLECIMIENTO   ####################################################### */

    /*
    function getDatosGridestablecimiento
    params in: null
    params out: $establecimiento
    comments: Obtiene los datos del establecimiento para la grid ubicada en la vista gestion/establecimientos
    */

    public function getDatosGridestablecimiento()
    {
        $establecimiento = \DB::select('CALL getDatosEstablecimiento');
        return $establecimiento;
    }

    /*
    function getEstablecimientoCliente
    params in: $request,$id
    params out: $establecimientoCliente
    comments: funcion que trae los establecimientos en la base de datos segun el (id) del cliente
    */

    public function getEstablecimientoCliente($request, $id)
    {
        $establecimientoCliente = \DB::select('CALL getDatosEstablecimientoCliente(?)', array($id));
        return $establecimientoCliente;
    }


    /*
     function getDatosModalestablecimiento
     params in: $id
     params out: $sucursal
     comments: Procedimiento de almacenado que trae los datos al modal de ver
      detalles del establecimiento
     */

    public function getDatosModalestablecimiento($id)
    {
        $modalEstablecimiento = \DB::select('CALL getDatosIdestablecimiento(?)', array($id));
        return $modalEstablecimiento;
    }

    /*
    function postRegistroEstablecimiento
    params in: $request,$id
    params out: $result
    comments: Procedimiento de almacenado de los datos del registro de los establecimintos segun el ID del cliente
    */

    public function postRegistroEstablecimiento($request, $id)
    {
        $result = [];


        $nombre = $request->input('nombre');
        $web = $request->input('web');
        $correo = $request->input('correo');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $instagram = $request->input('instagram');
        try {
            $registrEstablecimiento = \DB::select('CALL insDatosEstablecimiento(?,?,?,?,?,?,?)', array($nombre, $web, $correo, $facebook, $twitter, $instagram, $id));
            $result['estado'] = true;
            $result['mensaje'] = 'Registrado correctamente';
        } catch (Exception $e) {
            $result['estado'] = false;
            $result['mensaje'] = 'No se registro correctamente';
        }
        return json_encode($result);
    }

    /* MODULO GESTION CLIENTE   ####################################################### */

    /*
    function postClienteEstablecimiento
    params in: null
    params out: $result
    comments: Funcion que actualiza los datos restantes de la tabla usuario
    */

    public function postClienteEstablecimiento($request)
    {

        //Parametros desde el formulario
        $email = $request->input('email');
        $facebook = $request->input('facebook');
        $telefono = $request->input('telefono');
        $usuario_id = 7;

        $clienteEstablecimiento = \DB::select('CALL updpDatosUsuario(?,?,?,?)', array($email, $facebook, $telefono, $usuario_id));
        $result['estado'] = true;
        $result['mensaje'] = 'Registrado correctamente';
        return json_encode($result);
    }
// usar try y catch para todo lo que tiene que ver con post
    /*
    function getDatosModalusuario
    params in: $reques ,$id
    params out: $sucursal
    comments: Procedimiento de almacenado que trae los datos al modal de ver
    detalles del usuario
    */


    public function getDatosModalusuario($id)
    {
        $bb = \DB::select('CALL getDatosIdusuario(?)', array($id));
        return $bb;
    }


    public function getDatosGridusuario()
    {
        $usuario = \DB::select('CALL getDatosUsuario');
        return $usuario;
    }

    /* MODULO GESTION MENU   ####################################################### */
    /*
      function getDatosGridmenu
      params in: null
      params out: $menu
      comments: Procedimiento de almacenado que trae todos los datos de los menus
      */
    public function getDatosGridmenu()
    {

        $menu = \DB::select('CALL getDatosMenu');
        //$menu = \DB::table('menu')->get();
        return $menu;
    }
    /* MODULO GESTION PLATOS DEL MENU   ####################################################### */
    /*
     function getDatosGridmenuPlato
     params in: null
     params out: $menuPlato
     comments: Procedimiento de almacenado que trae todos los datos de los platos de los menus
     */

    public function getDatosGridmenuPlato()
    {

        $menuPlato = \DB::select('CALL getDatosMenuPlatos');

        return $menuPlato;
    }

    /* MODULO GESTION CATEGORIA DEL MENU   ####################################################### */
    /*
     function getDatosGridmenuCategoria
     params in: null
     params out: $menuPlato
     comments: Procedimiento de almacenado que trae todos los datos de las categorias de los menus
     */

    public function getDatosGridmenuCategoria()
    {

        $menucategoria = \DB::select('CALL getDatosMenuCategoria');

        return $menucategoria;
    }

    /* MODULO GESTION SUCURSALES DEL MENU   ####################################################### */

    /*
     function getDatosGridmenuSucursal
     params in: null
     params out: $menucategoria
     comments: Procedimiento de almacenado que trae todas las sucursales de los mnenus
     */
    public function getDatosGridmenuSucursal()
    {

        $menucategoria = \DB::select('CALL getDatosMenuSucursal');

        return $menucategoria;
    }

    /* MODULO GESTION PLATOS   ####################################################### */
    /*
   function getDatosGridPlatos
   params in: null
   params out: $platos
   comments: Procedimiento de almacenado que trae todos los platos
   */
    public function getDatosGridPlatos()
    {

        $platos = \DB::select('CALL getDatosPlatos');

        return $platos;
    }
    /* MODULO GESTION GALERIA   ####################################################### */
    /*
    function getDatosGridGaleria
    params in: null
    params out: $platos
    comments: Procedimiento de almacenado que trae todos los datos de la galeria
    */

    public function getDatosGridGaleria()
    {

        $galeria = \DB::select('CALL getDatosGaleria');
        return $galeria;
    }
    /* MODULO GESTION PUNTUACION   ####################################################### */
    /*
    function getDatosGridPuntuacion
    params in: null
    params out: $platos
    comments: Procedimiento de almacenado que trae todos los datos de las puntuaciones y los comentarios
    */

    public function getDatosGridPuntuacion()
    {

        $puntuacion = \DB::select('CALL getDatosPuntuacion');

        return $puntuacion;
    }

    /* MODULO GESTION SUCURSAL   ####################################################### */
    /*
    function getDatosGridSucursalById
    params in: $id
    params out: $sucursal
    comments: Procedimiento de almacenado que trae todas sucursales segun el id del establecimiento
    */


    public function getDatosGridSucursalById($id)
    {
        $sucursal = \DB::select('CALL getDatosSucursal(?)', array($id));
        return $sucursal;
    }

    /*
    function getSucursalCliente
    params in: $request,$id
    params out: $sucursal
    comments: Procedimiento de almacenado que trae todas sucursales segun el id del establecimiento para la vista del cliente
    */


    public function getSucursalCliente($request, $id)
    {
        $sucursalCliente = \DB::select('CALL getDatosSucursalCliente(?)', array($id));
        return $sucursalCliente;
    }

    /*
      function getDatosModalsucursal
      params in:  $id
      params out: $sucursal
      comments: Procedimiento de almacenado que trae los datos al modal de ver
      detalles de las sucursales
      */

    public function getDatosModalsucursal($id)
    {
        $bb = \DB::select('CALL getDatosIdsucursal(?)', array($id));
        return $bb;
    }

    /*
   function postRegistroSucursal
   params in: $reques ,$id
   params out: $sucursal
   comments: Procedimiento de almacenado del registro de las sucursales segun el iD del establecimiento
   */

    public function postRegistroSucursal($request, $id)
    {

        //Parametros desde el formulario

        $nombre = $request->input('nombre');
        $direccion = $request->input('direccion');
        $telefono = $request->input('numeroTelefonico');
        $establecimientoId = $request->input('establecimientoId');
        $categoria = $request->input('categorias');
        $galeria = $request->path('galeria_id');

        $registerSucursal = \DB::select('CALL insDatosSucursal(?,?,?,?,?,?,?)', array($nombre, $direccion, $telefono, $establecimientoId, $categoria, $id, $galeria));
        $result['estado'] = true;
        $result['mensaje'] = 'Registrado correctamente';
        return json_encode($result);


    }


    //EJEMPLO DE FUNCIION DE ALMACENAMIENTO

    public function insTesData($request)
    {

        $usuario = $request->input('usuario');
        $direccion = $request->input('email');
        $telefono = $request->input('contra');
        $prueba = \DB::select('CALL InsertarTest(?,?,?)', array($usuario, $direccion, $telefono));
        $result['estado'] = true;
        $result['mensaje'] = 'Registrado correctamente';
        return json_encode($result);

    }
}

?>