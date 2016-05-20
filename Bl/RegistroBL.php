<?php

class RegistroBl
{


    public function __construct()
    {
    }

    public function getDatosDropdDownCategoria()
    {
        $categoria = \DB::select('CALL getDatosDropdDownCategoria');
        return $categoria;
    }

    public function getDatosDropdDownTusuario()
    {
        $tusuario = \DB::select('CALL getDatosDropdDowntusuario');
        return $tusuario;
    }

}

?>