<?php

class GestionBL{
	

	public function GestionBL(){}

	public function getDatosGridestablecimiento(){
		$establecimiento = \DB::select('CALL getDatosEstablecimiento');
		return $establecimiento;
	}


public function getDatosGridusuario(){
		$usuario = \DB::table('usuario')->get();
		return $usuario;
	}


	public function getDatosGridmenu(){
		
		$menu = \DB::select('CALL getDatosMenu');
		//$menu = \DB::table('menu')->get();
		return $menu;
	}

		public function getDatosGridmenuPlato(){
		
		$menuPlato = \DB::select('CALL getDatosMenuPlatos');
	
		return $menuPlato;
	}


		public function getDatosGridmenuCategoria(){
		
		$menucategoria = \DB::select('CALL getDatosMenuCategoria');
	
		return $menucategoria;
	}

		public function getDatosGridmenuSucursal(){
		
		$menucategoria = \DB::select('CALL getDatosMenuSucursal');
	
		return $menucategoria;
	}

			public function getDatosGridPlatos(){
		
		$platos = \DB::select('CALL getDatosPlatos');
	
		return $platos;
	}


	public function getDatosGridGaleria(){
		
		$galeria = \DB::select('CALL getDatosGaleria');
		return $galeria;
	}

		public function getDatosGridPuntuacion(){
		
		$puntuacion = \DB::select('CALL getDatosPuntuacion');
	
		return $puntuacion;
	}

		public function getDatosGridSucursal(){
		
		$puntuacion = \DB::select('CALL getDatosSucursal');
	
		return $puntuacion;
	}

		public function getDatosGridInformacion(){
		
		$puntuacion = \DB::select('CALL getDatosSucursal');
		return $puntuacion;
	}



	
	public function insTesData($request){

		$usuario =  $request->input('usuario');
		$direccion =  $request->input('email');
		$telefono = $request->input('contra');
		$prueba = \DB::select('CALL InsertarTest(?,?,?)', array($usuario,$direccion,$telefono));
		$result['estado'] = true;
		$result['mensaje'] = 'Registrado correctamente';
		return json_encode($result);

	}
}

?>