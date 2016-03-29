<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;

use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;

use GestionBL;
use Utils;

class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gestion.principal');
    }

     public function establecimiento()
    {
        return view('gestion.establecimiento');
    }

      public function cliente()
    {
        return view('gestion.cliente');
    }
    
        public function menu()
    {
        return view('gestion.menu');
    }
    
public function postbdestablecimiento(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridestablecimiento();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos,$input);
        
    }

public function postbdusuario(Request $rq)
    {

        $Bl2 = new GestionBL();

        $datos = $Bl2->getDatosGridusuario();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos,$input);
        
    }


public function postbdmenu(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridmenu();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos,$input);
        
    }
}
