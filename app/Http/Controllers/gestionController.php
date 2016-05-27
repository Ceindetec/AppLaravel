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


    public function getEstablecimiento()
    {
        return view('gestion.establecimiento');
    }

    /**
     * @param Request $rq
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

    public function getEditModalEstablecimiento($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalestablecimiento($id);
        return view('gestion.modaleditestablecimiento', compact('datos'));

    }

    public function postEditModalEstablecimiento(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditEstablecimiento($request);
        return $result;
    }


    /*VISTA DEL ESTABLECIMIENTOS DEL CLIENTE ######################################### */


    public function getEstablecimientoCliente(Request $request)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getEstablecimientoCliente($request, $this->auth->user()->id);
        return view('gestion.establecimientocliente', compact('datos'));
    }


    /*VISTA DEL CLIENTE ######################################### */

    public function getCliente()
    {
        return view('gestion.cliente');
    }


    public function postCliente(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridusuario();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);

    }


    public function getModalEditCliente($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalusuario($id);
        return view('gestion.modaleditcliente', compact('datos'));
    }


    public function postModalEditCliente(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditCliente($request);
        return $result;
    }

    public function getDropDownTusuario()
    {

        $Bl = new RegistroBl();

        $datos = $Bl->getDatosDropdDownTusuario();

        return $datos;
    }


    /*VISTA DEL MENU ######################################### */

    public function getMenu()
    {
        return view('gestion.menu');

    }


    public function postMenu(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridmenu();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);

    }

    public function getModalEditMenu($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosMenuById($id);
        return view('gestion.modaleditmenu', compact('datos'));
    }


    public function postModalEditMenu(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditMenu($request);
        return $result;
    }


    public function getDropDownMenu()
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosDropdDownMenu();
        return $datos;
    }


    /*VISTA DEL PLATO DEL MENU ######################################### */
    public function getMenuPlato()
    {
        return view('gestion.menuplato');
    }


    public function postbdmenuplato(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridmenuPlato();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);

    }

    public function getModalEditMenuPlato($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalMenuPLatos($id);

        return view('gestion.modaleditmenuplato', compact('datos'));
    }


    public function postModalEditMenuPlato(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditMenuPlato($request);
        return $result;
    }


    /*VISTA DEL CATEGORIA DEL MENU ######################################### */

    public function getMenuCategoria()
    {
        return view('gestion.menucategoria');
    }

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
    public function getMenuSucursal()
    {
        return view('gestion.menusucursal');
    }

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
     * @param $id
     * funciones para editar las sucursales del menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditMenuSucursal($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalMenuSucursal($id);
        return view('gestion.modaleditmenusucursal', compact('datos'));

    }

    public function postEditMenuSucursal(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditMenuSucusal($request);
        return $result;
    }


    /*VISTA DE LOS PLATOS ######################################### */


    public function getEditPlato($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosGridPlatosById($id);
        return view('gestion.modaleditplato', compact('datos'));

    }

    public function postEditPlato(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditPlato($request);
        return $result;
    }


    public function getPlatos()
    {
        return view('gestion.platos');
    }

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
        $datos = $Bl->getDatosDropdDownTgaleria();
        return $datos;
    }


    public function getEditGaleria($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalIdgaleria($id);
        return view('gestion.modaleditgaleria', compact('datos'));

    }

    public function postEditGaleria(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditGaleria($request);
        return $result;
    }


    public function getGaleria()
    {
        return view('gestion.galeria');
    }

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

    public function getPuntuacion()
    {
        return view('gestion.puntuacion');
    }


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
    public function getSucursal($idEstablecimiento)
    {

        return view('gestion.sucursal', compact('idEstablecimiento'));

    }

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

    public function getSucursalCliente(Request $request)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getSucursalCliente($request, $this->auth->user()->id);
        return view('gestion.sucursalcliente', compact('datos'));


    }

    public function getEditSucursal($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalsucursal($id);
        return view('gestion.modaleditsucursal', compact('datos'));
    }

    public function postEditSucursal(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postEditSucursal($request);
        return $result;
    }


    /**
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
    public function getInformacion()
    {
        return view('gestion.informacion');
    }

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
        $datos = $Bl->getDatosModalusuario($id);

        return view('gestion.modalcliente', compact('datos'));
    }

    /*VISTA DEL MODAL DEL SUCURSAL ######################################### */
    public function getModalSucursal($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalsucursal($id);
        return view('gestion.modalsucursal', compact('datos'));
    }


}
