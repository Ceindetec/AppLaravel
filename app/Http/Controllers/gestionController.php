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
    
         public function menuplato()
    {
        return view('gestion.menuplato');
    }

         public function menucategoria()
    {
        return view('gestion.menucategoria');
    }
    

         public function menusucursal()
    {
        return view('gestion.menusucursal');
    }

           public function platos()
    {
        return view('gestion.platos');
    }
           public function galeria()
    {
        return view('gestion.galeria');
    }
    
          public function puntuacion()
    {
        return view('gestion.puntuacion');
    }
    
         public function sucursal()
    {
        return view('gestion.sucursal');
    }
    
       public function informacion()
    {
        return view('gestion.informacion');
    }

    //Vistas Modal

     public function modalestablecimiento()
    {
        return view('gestion.modalestablecimiento');
    }

       public function modalcliente()
    {
        return view('gestion.modalcliente');
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

public function postbusuario(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridusuario();

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

public function postbdmenuplato(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridmenuPlato();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos,$input);
        
    }



    public function postbdmenucategoria(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridmenuCategoria();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos,$input);
        
    }

     public function postbdmenusucursal(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridmenuSucursal();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos,$input);
        
    }

         public function postbdplatos(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridPlatos();

        $total = count($datos);

        for($i=0 ; $i<$total; $i++)
        {
           $datos[$i]->galeria = base64_encode($datos[$i]->galeria);     
        }


        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos,$input);
        
    }

         public function postbdgaleria(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridGaleria();

        $total = count($datos);

        for($i=0 ; $i<$total; $i++)
        {

           $datos[$i]->imagen = base64_encode($datos[$i]->imagen);
        }

       

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();
        return $util->getDataRequest($datos,$input);
        
    }



         public function postbdpuntuacion(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridPuntuacion();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos,$input);
        
    }


         public function postbdsucursal(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridSucursal();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos,$input);
        
    }


         public function postbdinformacion(Request $rq)
    {

        $Bl = new GestionBL();

        $datos = $Bl->getDatosGridInformacion();

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($datos,$input);
        
    }
}
