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
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cliente(usuario, clave, nombre, telefono, email, provincia, direccion, localidad, foto) values('$this->usuario', '$this->clave','$this->nombre','$this->telefono','$this->email','$this->provincia', '$this->direccion','$this->localidad','$this->foto')");

				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 
	public function GuardarCliente()
	 {
	 	$this->InsertarCliente();

	 }

	public static function validarCliente($usuario,$clave)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT * from cliente where usuario=:usuario && clave=:clave");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->bindvalue(':clave',$clave,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}
	public static function validarRegistro($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT usuario from cliente where usuario=:usuario");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}



     public static function traerprov($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT provincia from cliente where usuario=:usuario");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}
		public static function traerdir($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT direccion from cliente where usuario=:usuario");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}
		public static function traerloc($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT localidad from cliente where usuario=:usuario");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}
}
?>