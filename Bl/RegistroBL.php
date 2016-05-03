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

}

?>