<?php
class user
{
	public $id;
	public $usuario;
	public $clave;
	public $nombre;
	public $telefono;
	public $email;

	 public function InsertarUsuario()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarUsuario(:usuario,:clave,:nombre,:telefono,:email)");
				$consulta->bindvalue(':usuario',$this->usuario,PDO::PARAM_STR);
				$consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':telefono',$this->telefono, PDO::PARAM_INT);
				$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);

				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	public function BorrarUsuario()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarUsuario(:id)");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 } 
	 public function ModificarUsuario()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarUsuario(:usuario,:clave,:nombre,:telefono,:email,,:id)");
			$consulta->bindvalue(':usuario',$this->usuario,PDO::PARAM_STR);
			$consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':telefono',$this->telefono, PDO::PARAM_INT);
			$consulta->bindValue(':email',$this->email, PDO::PARAM_STR);
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			return $consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	public function GuardarUsuario()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarUsuario();
	 		}else {
	 			$this->InsertarUsuario();
	 		}

	 }
	
	public static function TraerUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUsuarios()");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "user");		
	}

	public static function TraerUsuarioId($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUsuarioId(:id)");
			$consulta->bindvalue(':id',$id,PDO::PARAM_INT);
			$consulta->execute();
			$buscado= $consulta->fetchObject('user');
			return $buscado;			

	}
	public function validarUsuario($usuario,$clave)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("CALL validarusuario(:usuario,:clave)");
		$consulta->bindvalue(':usuario',$this->usuario,PDO::PARAM_STR);
		$consulta->bindvalue(':clave',$this->clave,PDO::PARAM_STR);
		$consulta->execute();
		$buscado=$consulta->fetchObject('user');
		return $buscado;
	}

}
?>