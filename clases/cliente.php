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

	 public function InsertarCliente()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarCliente(:usuario,:clave,:nombre,:telefono,:email,:provincia,:direccion,:localidad)");
				$consulta->bindvalue(':usuario',$this->usuario,PDO::PARAM_STR);
				$consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':telefono',$this->telefono, PDO::PARAM_INT);
				$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
				$consulta->bindValue(':provincia',$this->provincia, PDO::PARAM_STR);
				$consulta->bindValue(':direccion',$this->direccion, PDO::PARAM_STR);
				$consulta->bindValue(':localidad',$this->localidad, PDO::PARAM_STR);

				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	/*public function BorrarCliente()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarCliente(:id)");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 } */
	 public function ModificarCliente()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarCliente(:usuario,:clave,:nombre,:telefono,:email,:provincia,:direccion,:localidad,:id)");
			$consulta->bindvalue(':usuario',$this->usuario,PDO::PARAM_STR);
			$consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':telefono',$this->telefono, PDO::PARAM_INT);
			$consulta->bindValue(':email',$this->email, PDO::PARAM_STR);
			$consulta->bindValue(':provincia',$this->provincia, PDO::PARAM_STR);
			$consulta->bindValue(':direccion',$this->direccion, PDO::PARAM_STR);
			$consulta->bindValue(':localidad',$this->localidad, PDO::PARAM_STR);

			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			return $consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	public function GuardarCliente()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarCliente();
	 		}else {
	 			$this->InsertarCliente();
	 		}

	 }
	/*
	public static function TraerClientes()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerClientes()");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "cliente");		
	}

	public static function TraerClienteId($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerClienteId(:id)");
			$consulta->bindvalue(':id',$id,PDO::PARAM_INT);
			$consulta->execute();
			$buscado= $consulta->fetchObject('cliente');
			return $buscado;			

	} */
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
		$consulta->bindvalue(':usuario',$this->usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}

	public static function retornoID($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("CALL retornoID(:usuario)");
		$consulta->bindvalue(':usuario',$usuario,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('cliente');
		return $buscado;
	}

}
?>