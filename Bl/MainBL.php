<?php

class MainBl{
	

	public function __construct(){}

	/* Funcion para enviar longitud, latitud y filtro de sucursales */
	public function getDatosInfoSucursales($request){

		$txtBuscar = $request->input('txtBuscar');
		$latitud = $request->input('latitud');
		$longitud = $request->input('longitud');
		
		$result = \DB::select('CALL getDatosSucursalByQuery(?,?,?)', array($txtBuscar,$latitud,$longitud));

		return $result;
	}

	/* Funcion para recibir datos de topPuntuados ############################################# */
	public function getDatosSucursalPuntuada(){
	
		$result = \DB::select('CALL getTopPuntuado');

		return $result;
	}

	/* Funcion para recibir datos de TopEditor ################################################ */
	public function getDatosSucursalEditor(){
	
		$result = \DB::select('CALL getTopEditor');

		return $result;
	}

	/* Funcion para recibir datos de TopVisitados ############################################# */
	public function getDatosSucursalVisitados(){
	
		$result = \DB::select('CALL getTopVisitado');

		return $result;
	}
 
	/* Funcion para recibir los datos de todas las sucursales puntuadas ####################### */
	public function getDatosSucursalPuntuadaList(){
	
		$result = \DB::select('CALL getListTopPuntuadoOrderPuntuacionConteo');

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