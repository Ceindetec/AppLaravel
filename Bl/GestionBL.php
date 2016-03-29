<?php

class GestionBL{
	

	public function GestionBL(){}

	public function getDatosGridestablecimiento(){
		$establecimiento = \DB::select('CALL getDatosEstablecimiento');
		return $establecimiento;
	}


public function getDatosGridusuario(){
		$usuario = \DB::select('usuario')->get();
		return $usuario;
	}

	public function getDatosGridmenu(){
		$menu = \DB::table('menu')->get();
		return $menu;
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