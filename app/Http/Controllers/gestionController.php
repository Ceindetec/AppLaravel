<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;

use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use RegistroBl;
use GestionBL;
use Utils;

class GestionController extends Controller
{

    /*CONSTRUCTOR DEL AUTH ######################################### */
    protected $auth;

    private function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /*VISTA PRINCIPAL ######################################### */
    public function index()
    {
        return view('gestion.principal');

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
    public function postbdestablecimiento(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridestablecimiento();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);

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


    public function postbusuario(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridusuario();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);

    }


    /*VISTA DEL MENU ######################################### */

    public function getMenu()
    {
        return view('gestion.menu');

    }


    public function postbdmenu(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridmenu();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);

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


    /*VISTA DEL CATEGORIA DEL MENU ######################################### */

    public function getMenuCategoria()
    {
        return view('gestion.menucategoria');
    }

    public function postbdmenucategoria(Request $rq)
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

    public function postbdmenusucursal(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridmenuSucursal();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);

    }

    /*VISTA DE LOS PLATOS ######################################### */

    public function getPlatos()
    {
        return view('gestion.platos');
    }

    public function postbdplatos(Request $rq)
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
    public function getGaleria()
    {
        return view('gestion.galeria');
    }

    public function postbdgaleria(Request $rq)
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


    public function postbdpuntuacion(Request $rq)
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


    /*VISTA DE LA INFORMACION BASICA ######################################### */
    public function getInformacion()
    {
        return view('gestion.informacion');
    }

    public function postbdinformacion(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridInformacion();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);

    }

    /*VISTA DEL MODAL DEL ESTABLECIMIENTO ######################################### */

    public function getmodalestablecimiento($id)
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
