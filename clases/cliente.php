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
	public $tipo_usuario; //ver agregado en InsertarCliente!

	 public function InsertarCliente()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cliente(usuario, clave, nombre, telefono, email, provincia, direccion, localidad, foto, tipo_usuario) values('$this->usuario', '$this->clave','$this->nombre','$this->telefono','$this->email','$this->provincia', '$this->direccion','$this->localidad','$this->foto', '$this->tipo_usuario')");

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
	public static function traerTipo($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT tipo_usuario from cliente where usuario=:usuario");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}

	/*public function __toString() //PARA CONVERTIR A UN STRING (metodo magico)
    {
        return $this->tipo_usuario;
    }*/
   
   public function TraerClientes() //va a traer a los clientes dependiendo el tipo de usuario
   {
   		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT foto,usuario, nombre, email, telefono from cliente where tipo_usuario='cliente'");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "cliente");	

   }
}
?>