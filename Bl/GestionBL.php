<?php

class GestionBL
{


public function __construct(){}


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

//BL que debe borrarse si no es necesario
/*
    public function getEdiestablecimiento($id)
    {
        $editmodalEstablecimiento = \DB::select('CALL getAllEstablecimiento(?)', array($id));
        return $editmodalEstablecimiento;
    }*/

    public function postEditEstablecimiento($request)
    {

        //Parametros desde el formulario



        $establecimiento = $request->input('establecimiento');
        $web = $request->input('web');
        $correo = $request->input('correo');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $instagram = $request->input('instagram');
        $id = $request->input('idestablecimiento');




        $editEstablecimiento = \DB::select('CALL updDatosEstablecimiento(?,?,?,?,?,?,?)', array($establecimiento,$web,$correo,$facebook,$twitter,$instagram,$id));
        $result['estado'] = true;
        $result['mensaje'] = 'Registrado correctamente';
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


    public function postEditCliente($request)
    {

        //Parametros desde el formulario

        $user = $request->input('user');
        $pnombre = $request->input('pnombre');
        $snombre = $request->input('snombre');
        $papellido = $request->input('papellido');
        $sapellido = $request->input('sapellido');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $celular = $request->input('celular');
        $tusuario = $request->input('tusuarios');
        $facebook = $request->input('facebook');
        $id = $request->input('idusuario');

        $editCliente = \DB::select('CALL updDatosCliente(?,?,?,?,?,?,?,?,?,?,?)', array($user,$pnombre,$snombre,$papellido,$sapellido,$email,$telefono,$celular,$facebook,$tusuario,$id));
        $result['estado'] = true;
        $result['mensaje'] = 'Registrado correctamente';
        return json_encode($result);
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

    /**
     * @return mixed
     * funcion que llama a la consulta
     * de los nombres de los menus para desplegable
     */

    public function getDatosDropdDownMenu()
    {
        $dropdDownMenu = \DB::select('CALL getDatosDropdDownMenu');
        return $dropdDownMenu;
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


    public function getDatosMenuById($id)
    {
        $getmenu = \DB::select('CALL getDatosIdmenu(?)', array($id));
        return $getmenu;
    }


    public function postEditMenu($request)
    {

        //Parametros desde el formulario

        $nombre = $request->input('nombreMenu');
        $descripcion = $request->input('descripcionMenu');

        $id = $request->input('idMenu');

        $editmenu = \DB::select('CALL updDatosMenu(?,?,?)', array($nombre,$descripcion,$id));
        $result['estado'] = true;

        $result['mensaje'] = 'Registrado correctamente';
        return json_encode($result);
    }

    /**
     * @param $id
     * funcion que hace llamado a la consulta que trae los platos
     * de los menus  By ID
     * @return mixed
     */

    public function getDatosModalMenuPLatos($id)
    {
        $modalMenuPlatos = \DB::select('CALL getDatosIDmenuplatos(?)', array($id));
        return $modalMenuPlatos;
    }

    public function postEditMenuPlato($request)
    {

        //Parametros desde el formulario

        $valor = $request->input('valor');
        $id = $request->input('idMenuPlato');

        $editCliente = \DB::select('CALL updDatosMenuPlato(?,?)', array($valor,$id));
        $result['estado'] = true;
        $result['mensaje'] = 'Registrado correctamente';
        return json_encode($result);
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

    /**
     * @param $id
     * funcion que hace llamado a Consulta que trae las variables
     * de las sucursales del menu By ID
     * @return mixed
     */
    public function getDatosModalMenuSucursal($id)
    {
        $modalMenuSucursal = \DB::select('CALL getDatosIdmenusucursal(?)', array($id));
        return $modalMenuSucursal;
    }

    public function postEditMenuSucusal($request)
    {
        //Parametros desde el formulario

        $nombre = $request->input('menu');


        $id = $request->input('idMenuSucursal');

        $editMenuSucursal= \DB::select('CALL updDatosMenuSucursal(?,?)', array($nombre,$id));


        $result['estado'] = true;
        $result['mensaje'] = 'Registrado correctamente';
        return json_encode($result);
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



    public function postRegistroPlato($request)
    {
        $result = [];



        $categoria = $request->input('categorias');

        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

        $mintype = $request->file('imagen')->getClientMimeType();
        $imgname = $request->file('imagen')->getClientOriginalName();
        $imagenBlob = file_get_contents($request->file('imagen')->getRealPath());
        $variable= 1;

        var_dump($categoria);

        var_dump($nombre);
        var_dump($descripcion);

        var_dump($variable);
        var_dump($mintype);
        var_dump($imgname);

        try {
            $registrEstablecimiento = \DB::select('CALL insDatosPlato(?,?,?,?,?,?,?)', array($nombre,$categoria,$descripcion,$variable,$mintype,$imgname,$imagenBlob));
            $result['estado'] = true;
            $result['mensaje'] = 'Registrado correctamente';
        } catch (Exception $e) {
            $result['estado'] = false;
            $result['mensaje'] = 'No se registro correctamente';
        }
        return json_encode($result);

    }

    public function getDatosGridPlatosById($id)
    {
        $editplatos = \DB::select('CALL getDatosIdplatos(?)', array($id));
        return $editplatos;
    }





    public function postEditPlato($request)
    {

        //Parametros desde el formulario


        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $categoria = $request->input('categorias');
        $imagenBlob = file_get_contents($request->file('imagen')->getRealPath());
        $id = $request->input('idPlatos');

        $editPlato = \DB::select('CALL updDatosPlato(?,?,?,?,?)', array($nombre,$descripcion,$categoria,$imagenBlob,$id));

        $result['estado'] = true;
        $result['mensaje'] = 'Registrado correctamente';
        return json_encode($result);
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

    public function getDatosModalIdgaleria($id)
    {
        $Idgaleria = \DB::select('CALL getDatosIdgaleria(?)', array($id));
        return $Idgaleria;

    }


    public function postEditGaleria($request)
    {
        //Parametros desde el formulario

        $imagenBlob = file_get_contents($request->file('imagen')->getRealPath());
        $tgaleria = $request->input('tgaleria');
        $id = $request->input('idGaleria');

        $editGaleria= \DB::select('CALL updDatosGaleria(?,?,?)', array($imagenBlob,$tgaleria,$id));


        $result['estado'] = true;
        $result['mensaje'] = 'Registrado correctamente';
        return json_encode($result);
    }






    /**
     * @return mixed
     * funcion que llama a la consulta que trae los tipo de galeria By ID
     */
    public function getDatosDropdDownTgaleria()
    {
        $dropdDowntgaleria = \DB::select('CALL getDatosDropdDowntgaleria');
        return $dropdDowntgaleria;
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


    public function getDatosModalsucursal($id)
    {
        $sucursal = \DB::select('CALL getDatosIdsucursal(?)', array($id));
        return $sucursal;

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
        $galeria = $request->path('imagen');

        $registerSucursal = \DB::select('CALL insDatosSucursal(?,?,?,?,?,?,?)', array($nombre, $direccion, $telefono, $establecimientoId, $categoria, $id, $galeria));
        $result['estado'] = true;
        $result['mensaje'] = 'Registrado correctamente';
        return json_encode($result);


    }

    /**
     * @return mixed
     * funcion que llama a la consulta
     * de los nombres de las sucursales para desplegable
     */

    public function getDatosDropdDownSucursal()
    {
        $dropdDownsucursal = \DB::select('CALL getDatosDropdDownSucursal');
        return $dropdDownsucursal;
    }

    /**
     * @param $request
     * @return string
     */

    public function postEditSucursal($request)
    {

        //Parametros desde el formulario

        $nombre = $request->input('nombre');
        $direccion = $request->input('direccion');
        $telefono = $request->input('telefono');
        $categorias = $request->input('tcategoria');

        $id = $request->input('idSucursal');

        $editSucursal= \DB::select('CALL updDatosSucursal(?,?,?,?,?)', array($nombre,$direccion,$telefono,$categorias,$id));


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