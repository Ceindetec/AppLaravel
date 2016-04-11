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

    /*VISTA PRINCIPAL ######################################### */
    public function index()
    {
        return view('gestion.principal');
        
    }
   
    /*VISTA DEL ESTABLECIMIENTO ######################################### */

     public function establecimiento()
    {
        return view('gestion.establecimiento');
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



     /*VISTA DEL CLIENTE ######################################### */

      public function cliente()
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

        return $util->getDataRequest($datos,$input);
        
    }


    
     /*VISTA DEL MENU ######################################### */

        public function menu()
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

        return $util->getDataRequest($datos,$input);
        
    }

    /*VISTA DEL PLATO DEL MENU ######################################### */
         public function menuplato()
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

        return $util->getDataRequest($datos,$input);
        
    }


    /*VISTA DEL CATEGORIA DEL MENU ######################################### */

         public function menucategoria()
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

        return $util->getDataRequest($datos,$input);
        
    }
    
    /*VISTA DEL SUCURSAL DEL MENU ######################################### */
         public function menusucursal()
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

        return $util->getDataRequest($datos,$input);
        
    }

    /*VISTA DE LOS PLATOS ######################################### */

           public function platos()
    {
        return view('gestion.platos');
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
    /*VISTA DE LA GALERIA ######################################### */
           public function galeria()
    {
        return view('gestion.galeria');
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

    /*VISTA DE LA PUNTUACION ######################################### */
    
          public function puntuacion()
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

        return $util->getDataRequest($datos,$input);
        
    }



    /*VISTA DE LA SUCURSAL ######################################### */
         public function sucursal()
    {
        return view('gestion.sucursal');
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
    
    /*VISTA DE LA INFORMACION BASICA ######################################### */
       public function informacion()
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

        return $util->getDataRequest($datos,$input);
        
    }

    /*VISTA DEL MODAL DEL ESTABLECIMIENTO ######################################### */

     public function getmodalestablecimiento($id)
    {   

       $Bl = new GestionBL();
        $datos = $Bl->getDatosModalestablecimiento($id);
        return view('gestion.modalestablecimiento',compact('datos'));
    }

    /*VISTA DEL MODAL DEL CLIENTE ######################################### */

       public function getmodalcliente($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalusuario($id);
       
        return view('gestion.modalcliente',compact('datos'));
    }

  /*VISTA DEL MODAL DEL SUCURSAL ######################################### */
        public function getmodalsucursal($id)
    {
        $Bl = new GestionBL();
        $datos = $Bl->getDatosModalsucursal($id);
        return view('gestion.modalsucursal',compact('datos'));
    }


    










 

  

    

        






  
}
