<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;

use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;
use Utils;
use TestBl;
use MainBl;
use Socialite;
use RegistroBl;

class mainController extends Controller
{
    /* METODOS PERTENECIENTES AL MAIN DE LA APP ##################################### */

    //Metodo que muestra el index de la app
    public function index()
    {
        return view('app.index');
    }

    /* METODOS DE LOGIN CON FACEBOOK ################################################ */

    //Metodo de redireccion al proveedor de servicio Socialite de facebook
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
        //return views('facebook.index');
    }

    //Metodo del manejador de la llamada de vuelta del proveedor
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        var_dump($user);
        //return view('main.facebook',compact('user'));
    }

    /* METODOS DE LOGIN POR LA APP ################################################## */


    /* METODOS DE PRUEBA ############################################################ */

    public function getViewModal()
    {
        return view('main.testmodal');
    }

    /**
     * funcion que me carga el modal para el teSt es llamada por get
     *
     * @return retorna la vista que sera cargada en el modal
     */
    public function modalTest()
    {
        return view('main.modalTest');
    }

    /**
     * Funcion que me carga el modal para el ejemplo con formulario (entra por get)
     *
     * @return retorna la vista que sera cargada en el modal
     */
    public function getModalFormulario()
    {
        return view('main.modalformulario');
    }

    /**
     * Funcion que me carga el modal para el ejemplo con formulario (entra por get)
     *
     * @return retorna la vista que sera cargada en el modal
     */
    public function getViewProcedimientos()
    {

        return view('main.testProcedimientos');
    }

    /**
     * Funcion que procesa los datos enviados desde el modal que contiene un formulario entra por post
     *
     * @param $rq -> este parametro recibe los datos enviados por el formulario para ser usado
     *
     * @return $restult -> json que contiene el estatus de la operacion, mensaje opcional, y los datos de que se deseen regresar
     */
    public function postMamodalFormulario(Request $request)
    {
        $Bl = new TestBl();
        $result = $Bl->insTesData($request);
        return $result;
    }

    public function postPrubaproce()
    {

        $Bl = new TestBl();

        $datos = $Bl->getDatosGrid();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos, $input);
    }

    public function postprueba(Request $rq)
    {
        return $rq['id'];
    }
    
    /*VISTA FILTRADO ######################################### */
    public function SucuFiltrada(Request $request){

        $Bl = new MainBl();

        $dataInfoSucursales = $Bl->getDatosInfoSucursales($request);

        $total = count($dataInfoSucursales);

        for($i=0 ; $i<$total; $i++)
        {
            $dataInfoSucursales[$i]->logo = base64_encode($dataInfoSucursales[$i]->logo); 
        }
      
        return view('main.SucuFiltrada',compact('dataInfoSucursales'));
    }

    /*VISTA DEL MAPA ######################################### */
    public function mapa()
    {
    /* CONFIGURACION */
       
        $config = array();
        $config['center'] = 'auto';
        $config['map_width'] = 500;
        $config['map_height'] = 300;
        $config['zoom'] = 15;
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
 
            });
        }
        centreGot = true;';
        
        \Gmaps::initialize($config);

        $map = \Gmaps::create_map();

        //Devolver vista con datos del mapa
        return view('main.mapa', compact('map'));
    }
}