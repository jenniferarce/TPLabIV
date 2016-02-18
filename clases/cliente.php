<?php
class cliente
{
	public $id;
	public $usuario;
	public $clave;
	public $nombre;
	public $telefono;
	public $email;
	public $provincia;
	public $direccion;
	public $localidad; 
	public $foto;

	 public function InsertarCliente()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarCliente(:usuario,:clave,:nombre,:telefono,:email,:provincia,:direccion,:localidad,:foto)");
				$consulta->bindvalue(':usuario',$this->usuario,PDO::PARAM_STR);
				$consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':telefono',$this->telefono, PDO::PARAM_INT);
				$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
				$consulta->bindValue(':provincia',$this->provincia, PDO::PARAM_STR);
				$consulta->bindValue(':direccion',$this->direccion, PDO::PARAM_STR);
				$consulta->bindValue(':localidad',$this->localidad, PDO::PARAM_STR);
				$consulta->bindValue(':foto',$this->foto, PDO::PARAM_STR);

				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 /*public function ModificarCliente()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarCliente(:usuario,:clave,:nombre,:telefono, :email, :provincia,:direccion,:localidad,foto,:id)");
			$consulta->bindvalue(':usuario',$this->usuario,PDO::PARAM_STR);
			$consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':telefono',$this->telefono, PDO::PARAM_INT);
			$consulta->bindValue(':email',$this->email, PDO::PARAM_STR);
			$consulta->bindValue(':provincia',$this->provincia, PDO::PARAM_STR);
			$consulta->bindValue(':direccion',$this->direccion, PDO::PARAM_STR);
			$consulta->bindValue(':localidad',$this->localidad, PDO::PARAM_STR);
			$consulta->bindValue(':foto',$this->foto, PDO::PARAM_STR);

			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			return $consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }*/

	public function GuardarCliente()
	 {

	 	/*if($this->id>0)
	 		{
	 			$this->ModificarCliente();
	 		}else {*/
	 			$this->InsertarCliente();
	 		//}

	 }

	public static function validarCliente($usuario,$clave)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("CALL validarCliente(:usuario,:clave)");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->bindvalue(':clave',$clave,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}
	public static function validarRegistro($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("CALL validarRegistro(:usuario)");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}

/*public static function TraerCliente($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("CALL TraerCliente(:usuario)");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}*/

     public static function traerprov($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("CALL traerprov(:usuario)");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}
		public static function traerdir($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("CALL traerdir(:usuario)");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}
		public static function traerloc($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("CALL traerloc(:usuario)");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}
}
?>