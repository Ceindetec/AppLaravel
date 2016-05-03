<?php

class MainBl{
	

	public function __construct(){}

	public function getDatosInfoSucursales($request){

	$txtBuscar = $request->input('txtBuscar');
	$latitud = $request->input('latitud');
	$longitud = $request->input('longitud');
	
	$result = \DB::select('CALL getDatosSucursalByQuery(?,?,?)', array($txtBuscar,$latitud,$longitud));

	return $result;
	}

	/*public function insTesData($request){

		$usuario =  $request->input('usuario');
		$direccion =  $request->input('email');
		$telefono = $request->input('contra');
		$prueba = \DB::select('CALL InsertarTest(?,?,?)', array($usuario,$direccion,$telefono));
		$result['estado'] = true;
		$result['mensaje'] = 'Registrado correctamente';
		return json_encode($result);
	}*/
}

?>