<?php

class MainBl{
	

	public function __construct(){}

	/* Funcion para enviar longitud, latitud y filtro de sucursales */
	public function getDatosInfoSucursales($request){

		/*
		 * Variables enviadas al procedimiento almacenado
		 * $txtBuscar = Envia palabra clave para buscar por nombre de sucursal o categoria
		 * $latitud Y $longitud = Envia la longitud y latidus para hallar la distancia entre mi ubicacion y 
		 *						  la de la sucursal
		 */ 
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

	/* Funcion para recibir los datos de todas las sucursales visitadas ####################### */
	public function getDatosSucursalVisitadoList(){
	
		$result = \DB::select('CALL getListTopVisitadoOrderConteoPuntuacion');

		return $result;
	}

	/* Funcion para recibir los datos de todas las sucursales puntadas por el editor ########## */
	public function getDatosSucursalEditorList(){
	
		$result = \DB::select('CALL getListTopEditorOrderConteoPuntuacion');

		return $result;
	}
	/* Funcion para traer los datos de una unica Sucursal Buscando por su ID*/
	public function getDatosPorSucursal($id){
		
		$result = \DB::select('CALL getDataSucursalById(?)', array($id));

		return $result;
	}

	/* Funcion que me trae los Comentarios y las Puntuacion de una Sucursal buscada por su ID*/
	public function getDataPuntuacionComentariosBySucursal($id){
		
		$result = \DB::select('CALL getDataPuntuacionBySucursal(?)', array($id));
		
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