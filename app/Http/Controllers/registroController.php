<?php

namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;
use aplicacion\RegBl;

use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;
use Utils;


class registroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


public function registrocliente()
    {
        return view('registro.cliente');
    }

    public function registroestablecimiento()
    {
        return view('registro.establecimiento');
    }

  
       public function registrosucursal()
    {
        return view('registro.sucursal');
    }

     public function registromenu()
    {
        return view('registro.menu');
    }

       public function registroplato()
    {
        return view('registro.plato');
    }



}
