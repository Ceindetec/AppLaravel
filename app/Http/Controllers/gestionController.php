<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;

use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use RegistroBl;
use GestionBL;
use Utils;

use Auth;
use aplicacion\User;
use Hash;
use JWTAuth;


class GestionController extends Controller
{

    /*CONSTRUCTOR DEL AUTH ######################################### */
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /*VISTA PRINCIPAL ######################################### */
    public function index()
    {
        return view('gestion.principal');

    }

    /**
     * Funcion encargada de llamar la vista del modal del login
     * @return [type]
     */
    public function modalLogin()
    {
        return view('auth.modalLogin');
    }

    /**
     * Funcion encargada de procesar la peticion post del formulario de login por el  modal.
     * @param  Request => trae los datos que son enviados del formulario.
     * @return [result] => json de respuesta para saber si el login fue exitoso o no.
     */
    public function modalpostLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        if (Auth::attempt(array('username' => $username, 'password' => $password))) {
            $result['estado'] = true;
            $result['usuario'] = ['username' => Auth::User()->username, 'avatar' => base64_encode(Auth::User()->avatar)];
            $result['mensaje'] = 'Bienvenido ' . Auth::User()->username;
        } else {
            $result['estado'] = false;
        }
        return json_encode($result);
    }


    /*VISTA DEL ESTABLECIMIENTO ######################################### */

    /**
     * funcion encargadad de llamar  a la vista del establecimiento
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEstablecimiento()
    {
        return view('gestion.establecimiento');
    }

    /**
     * funcion encargada de procesar la peticion post del establecimiento
     * @param Request $rq
     *
     * @return array
     */
    public function postEstablecimiento(Request $rq)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridestablecimiento();
        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);
    }

    /**
     * funcion encargada de obtener los datos para editar del establecimiento
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getEditModalEstablecimiento($id)
    {
        $Bl = new GestionBL();
        $datosEstablecimiento = $Bl->getDatosModalestablecimiento($id);
        return view('gestion.modaleditestablecimiento', compact('datosEstablecimiento'));
    }

    /**
     * funcion encargada de procesar la peticion post del modal de editar del establecimiento
     * @param Request $request
     * @return string
     */

    public function postEditModalEstablecimiento(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditEstablecimiento($request);
        return $result;
    }



    /*VISTA DEL ESTABLECIMIENTOS DEL CLIENTE ######################################### */
    /**
     * funcion encargada de obtener los datos del establecimiento del cliente
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEstablecimientoCliente(Request $request)
    {
        $Bl = new GestionBL();
        $datosEstablcimiento = $Bl->getEstablecimientoCliente($request, $this->auth->user()->id);
        return view('gestion.establecimientocliente', compact('datosEstablcimiento'));
    }


    /*VISTA DEL CLIENTE ######################################### */
    /**
     * funcion que hace el llamado a la vista del cliente
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCliente()
    {
        return view('gestion.cliente');
    }

    /**funcion que procesa la peticion post de la vista del cliente
     * @param Request $rq
     * @return array
     */
    public function postCliente(Request $rq)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridusuario();
        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);

    }

    /**
     * funcion que obtiene los datos del cliente para editar
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getModalEditCliente($id)
    {
        $Bl = new GestionBL();
        $datosCliente = $Bl->getDatosModalusuario($id);
        return view('gestion.modaleditcliente', compact('datosCliente'));
    }

    /**
     * funcion que procesa la peticion post del modal editar del cliente
     * @param Request $request
     * @return string
     */


    public function postModalEditCliente(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditCliente($request);
        return $result;
    }

    /**
     * funcion que retorna los datos del tipo de usuario
     * @return mixed
     */

    public function getDropDownTusuario()
    {
        $Bl = new RegistroBl();
        $datosUsuario = $Bl->getDatosDropdDownTusuario();
        return $datosUsuario;
    }


    /*VISTA DEL MENU ######################################### */

    /**
     * funcion encargada de llamar a la vista del menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMenu()
    {
        return view('gestion.menu');
    }

    /**
     * funcion que procesa la peticion post del menu
     * @param Request $rq
     * @return array
     */
    public function postMenu(Request $rq)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridmenu();
        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);
    }

    /**
     * funcion que obtiene los datos del menu para editar
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getModalEditMenu($id)
    {
        $Bl = new GestionBL();
        $datosMenu = $Bl->getDatosMenuById($id);
        return view('gestion.modaleditmenu', compact('datosMenu'));
    }

    /**
     * funcion que procesa la peticion post de editar el menu
     * @param Request $request
     * @return string
     */


    public function postModalEditMenu(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditMenu($request);
        return $result;
    }

    /**
     * funcion que obtiene los datos del menu
     * @return mixed
     */


    public function getDropDownMenu()
    {
        $Bl = new GestionBL();
        $datosMenu = $Bl->getDatosDropdDownMenu();
        return $datosMenu;
    }


    /*VISTA DEL PLATO DEL MENU ######################################### */
    /**
     * funcion encargada de llamar a la vista de los platos de los menus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMenuPlato()
    {
        return view('gestion.menuplato');
    }

    /**
     * funcion que procesa la peticion post de los platos de los menus
     * @param Request $rq
     * @return array
     */
    public function postbdmenuplato(Request $rq)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridmenuPlato();
        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);

    }

    /**
     * funcion encargada de procesar los datos de los platos de los menus para su edicion
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getModalEditMenuPlato($id)
    {
        $Bl = new GestionBL();
        $datosMenuplato = $Bl->getDatosModalMenuPLatos($id);

        return view('gestion.modaleditmenuplato', compact('datosMenuplato'));
    }

    /**
     * funcion encargada deprocesar la peticion post del los platos de los menus para editar
     * @param Request $request
     * @return string
     */


    public function postModalEditMenuPlato(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditMenuPlato($request);
        return $result;
    }


    /*VISTA DEL CATEGORIA DEL MENU ######################################### */

    /**funcion encargada de llamar la vista de las categorias de los menus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMenuCategoria()
    {
        return view('gestion.menucategoria');
    }

    /**
     * funcion encargada de procesar la peticion post de las categorias de los menus
     * @param Request $rq
     * @return array
     */

    public function postMenuCategoria(Request $rq)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridmenuCategoria();
        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);
    }

    /*VISTA DEL SUCURSAL DEL MENU ######################################### */
    /**
     * funcion encargada de llamar la vista de las sucursales de los menus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMenuSucursal()
    {
        return view('gestion.menusucursal');
    }

    /**
     * funcion encargada de procesar la peticion post de las sucursales de los menus
     * @param Request $rq
     * @return array
     */

    public function postMenuSucursal(Request $rq)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridmenuSucursal();
        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);
    }

    /**
     * funciones para editar las sucursales del menu
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditMenuSucursal($id)
    {
        $Bl = new GestionBL();
        $datosMenusucursal = $Bl->getDatosModalMenuSucursal($id);
        return view('gestion.modaleditmenusucursal', compact('datosMenusucursal'));

    }

    /**
     * funcion encargada de procesar la peticion post de las sucursales del menu para editar
     * @param Request $request
     * @return string
     */

    public function postEditMenuSucursal(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditMenuSucusal($request);
        return $result;
    }


    /*VISTA DE LOS PLATOS ######################################### */

    /**
     * funcion encargada de obtener lo datos del los plato para editar
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditPlato($id)
    {
        $Bl = new GestionBL();
        $datosPlatos = $Bl->getDatosGridPlatosById($id);
        return view('gestion.modaleditplato', compact('datosPlatos'));

    }

    /**
     * funcion encargada de procesarla peticion post de plato para editar
     * @param Request $request
     * @return string
     */
    public function postEditPlato(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditPlato($request);
        return $result;
    }

    /**
     * funcion encargada de llamar la vista de lospaltos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPlatos()
    {
        return view('gestion.platos');
    }

    /**
     * funcion encargada de procesar la peticion post de los platos
     * @param Request $rq
     * @return array
     */

    public function postPlatos(Request $rq)
    {

        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridPlatos();
        $total = count($datos);
        for ($i = 0; $i < $total; $i++) {
            $datos[$i]->galeria = base64_encode($datos[$i]->galeria);
        }

        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);

    }

    /*VISTA DE LA GALERIA ######################################### */
    /**
     * funcion encargada de procesar la peticion post del ID de la galeria
     * @param Request $rq
     * @return array
     */

    public function postIdGaleria(Request $rq)
    {

        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridGaleria();
        $total = count($datos);
        for ($i = 0; $i < $total; $i++) {
            $datos[$i]->imagen = base64_encode($datos[$i]->imagen);
        }


        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);

    }

    /**
     * funcion encargada de llamar a la vista del modal de la imagen del plato
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function modalimagenplato()
    {
        return view('gestion.modalimagenplato');
    }


    /**
     * funcion comobox del tipo de galeria
     * @return mixed
     */
    public function getDropDownTgaleria()
    {
        $Bl = new GestionBL();
        $datosGaleria = $Bl->getDatosDropdDownTgaleria();
        return $datosGaleria;
    }

    /**
     * funcion encargada de obtener los datos de la galeria para editars
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditGaleria($id)
    {
        $Bl = new GestionBL();
        $datosGaleria = $Bl->getDatosModalIdgaleria($id);
        return view('gestion.modaleditgaleria', compact('datosGaleria'));
    }

    /**
     * funcion encargada de procesar la peticion post de la galeria para editar
     * @param Request $request
     * @return string
     */

    public function postEditGaleria(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditGaleria($request);
        return $result;
    }

    /**
     * funcion encargada de llamar a la vista de la galeria
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getGaleria()
    {
        return view('gestion.galeria');
    }

    /**
     * funcion que procesa la peticion post de la galeria
     * @param Request $rq
     * @return array
     */
    public function postGaleria(Request $rq)
    {

        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridGaleria();
        $total = count($datos);
        for ($i = 0; $i < $total; $i++) {

            $datos[$i]->imagen = base64_encode($datos[$i]->imagen);
        }

        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);


    }

    /*VISTA DE LA PUNTUACION ######################################### */
    /**
     * funcion encargada de llamar a la vista de la puntuacion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPuntuacion()
    {
        return view('gestion.puntuacion');
    }

    /**
     * funcion que procesa la peticion post de la puntuacion
     * @param Request $rq
     * @return array
     */

    public function postPuntuacion(Request $rq)
    {

        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridPuntuacion();
        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);

    }


    /*VISTA DE LA SUCURSAL ######################################### */
    /**
     * funcion encargada de hacer el llamado a la vista de la sucursal
     * @param $idEstablecimiento
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSucursal($idEstablecimiento)
    {
        return view('gestion.sucursal', compact('idEstablecimiento'));
    }

    /**
     * funcion  que encargada de obtener los datos de la sucursal By ID
     * @param Request $request
     * @return array
     */

    public function getDatosSucursalById(Request $request)
    {
        $id = $request->input('id');
        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridSucursalById($id);

        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);

    }

    /**
     * funcion encargada de llamar a la vista de la sucursal del cliente
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getSucursalCliente(Request $request)
    {
        $Bl = new GestionBL();
        $datosSucursal = $Bl->getSucursalCliente($request, $this->auth->user()->id);
        return view('gestion.sucursalcliente', compact('datosSucursal'));

    }

    /**
     * funcion encargada de llamar la vista del modal para editar de la sucursal
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getEditSucursal($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalsucursal($id);
        return view('gestion.modaleditsucursal', compact('datos'));
    }

    /**
     * funcion encargada de procesar la peticion post de la sucursal
     * @param Request $request
     * @return string
     */

    public function postEditSucursal(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditSucursal($request);
        return $result;
    }


    /**
     * funcion encargada de procesar los datos de la sucursal para un desplegable
     * @return mixed
     *
     */
    public function getDropDownSucursal()
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosDropdDownSucursal();
        return $datos;
    }

    /*VISTA DE LA INFORMACION BASICA ######################################### */
    /**
     * funcion encargada de hacer llamado  de la vista de la informacion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getInformacion()
    {
        return view('gestion.informacion');
    }

    /**
     * funcion encargada de procesar la peticion post de la vista de la informacion
     * @param Request $rq
     * @return array
     */
    public function postInformacion(Request $rq)
    {

        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridInformacion();
        $request = file_get_contents('php://input');
        $input = json_decode($request);
        $util = new Utils();
        return $util->getDataRequest($datos, $input);

    }

    /*VISTA DEL MODAL DEL ESTABLECIMIENTO ######################################### */

    public function getModalEstablecimiento($id)
    {

        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalestablecimiento($id);
        return view('gestion.modalestablecimiento', compact('datos'));
    }

    /*VISTA DEL MODAL DEL CLIENTE ######################################### */

    public function getmodalcliente($id)
    {
        $Bl = new GestionBL();
        $datosCliente = $Bl->getDatosModalusuario($id);

        return view('gestion.modalcliente', compact('datosCliente'));
    }

    /*VISTA DEL MODAL DEL SUCURSAL ######################################### */
    public function getModalSucursal($id)
    {
        $Bl = new GestionBL();
        $datosSucursal = $Bl->getDatosModalsucursal($id);
        return view('gestion.modalsucursal', compact('datosSucursal'));
    }


}
