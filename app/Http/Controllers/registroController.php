<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;

use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use RegistroBl;
use GestionBL;
use Utils;


class registroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /*
    function getRegistrocliente
    params in: null
    params out: view (registro/cliente)
    Comments: Funcion retornar vista de cliente
    vista que maneja el registro de usuarios
    */

    public function getRegistroCliente()
    {
        return view('registro.cliente');
    }

    /*
   function getRegistroEstablecimiento
   params in: null
   params out: view (registro/establecimiento)
   Comments: Funcion retornar vista del Registro del establecimiento
   vista que maneja el registro de Establecimiento
   */
    public function getRegistroEstablecimiento($cliente)
    {
        return view('registro.establecimiento', compact('cliente'));
    }

    /*
  function postRegistroEstablecimiento
  params in: null
  params out: view (registro/establecimiento)
  Comments: Funcion mandar todos los datos registrados en registro
    de establecimientos a la Base de datos
  */
    public function postRegistroEstablecimiento(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postRegistroEstablecimiento($request, $this->auth->user()->id);
        return $result;
    }

    /*
    function getRegistroSucursal
    params in: null
    params out: view (register)
    Comments: Funcion retornar vista del registro
    de la sucursal que gestiona sus registros

    */

    public function getRegistroSucursal($id)
    {
        return view('registro.sucursal', compact('id'));
    }


    public function postRegistroSucursal(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postRegistroSucursal($request, $this->auth->user()->id);
        return $result;
    }


    /*
   function getRegistroMenu
   params in: null
   params out: view (registro/menu)
   Comments: Funcion retornar vista del registro
   del Menu que gestiona sus registros
     */
    public function getRegistroMenu()
    {
        return view('registro.menu');
    }

    /*
   function getRegistroPlato
   params in: null
   params out: view (registro/plato)
   Comments: Funcion retornar vista del registro
   del Plato que gestiona sus registros
   */
    public function getRegistroPlato()
    {
        return view('registro.plato');
    }

    /*
  function postRegistroPlato
  params in: null
  params out: view (registro/plato)
  Comments: Funcion de enviar datos
    registrados en Registro del plato a la Base de datos
  */

    public function postRegistroPlato(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postRegistroPlato($request);
        return $result;
    }

    /*
    function getClienteEstablecimiento
    params in: null
    params out: view (registro/clientestablecimiento)
    Comments: Funcion que de devuelve la vista registro/clienteestablecimiento
    vista que maneja la gestion de los establecimientos registrados
    */
    public function getClienteEstablecimiento()
    {

        return view('registro.clientestablecimiento');
    }

    /*
    function postClienteEstablecimiento
    params in: null
    params out: view (registro/clientestablecimiento)
    Comments: Funcion que de devuelve la vista registro/clienteestablecimiento
    vista que maneja la gestion de los establecimientos registrados
    */
    public function postClienteEstablecimiento(Request $request)
    {
        $Bl = new GestionBL();
        $result = $Bl->postClienteEstablecimiento($request);
        return $result;
    }

    /*
    function modalPlato
    params in: null
    params out: view (registro/modalPlato)
    Comments: Funcion que de devuelve la vista registro/clienteestablecimiento
    vista que maneja la gestion de los establecimientos registrados
    */
    public function modalPlato()
{

    $Bl = new GestionBL();

    $datos = $Bl->getDatosGridPlatos();

    $total = count($datos);

    for ($i = 0; $i < $total; $i++) {
        $datos[$i]->galeria = base64_encode($datos[$i]->galeria);
    }


    return view('registro.modalplatos', compact('datos'));


}

    /*
   function getCategoria
   params in: null
   Comments: Funcion que de trae las categorias de la base de
    datos

   */


    public function getHorarioSucursal()
    {

        return view('registro.horariosucursal');

    }

    public function getDropDownCategoria()
    {

        $Bl = new RegistroBl();

        $datos = $Bl->getDatosDropdDownCategoria();

        return $datos;
    }


}
