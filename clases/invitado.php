<?php
class invitado
{
	
	//public $id; //de cliente
	public $user;
	public $dni;
	public $nomyape;
	public $pariente;
	public $nromesa;

	 public function InsertarInvitado()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into invitado (user, dni, nomyape, pariente, nromesa) values('$this->user', '$this->dni', '$this->nomyape', '$this->pariente', '$this->nromesa')");
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	public function BorrarInvitado()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("delete from invitado where dni='$this->dni'");		
				$consulta->execute();
				return $consulta->rowCount();
	 } 
	 public function ModificarInvitado()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarInvitado(:dni,:nomyape,:pariente,:nromesa,:user)");
			$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);
			$consulta->bindValue(':nomyape',$this->nomyape, PDO::PARAM_STR);
			$consulta->bindvalue(':pariente',$this->pariente,PDO::PARAM_STR);
			$consulta->bindValue(':nromesa',$this->nromesa, PDO::PARAM_STR);
			$consulta->bindValue(':user',$this->user, PDO::PARAM_STR);
			return $consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	public function GuardarInvitado()
	 {

	 	/*if($this->dni>0)
	 		{
	 			$this->ModificarInvitado();
	 		}else {*/
	 			$this->InsertarInvitado();
	 		//}

	 }
	
	public static function TraerInvitados($user) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT dni, nomyape, pariente, nromesa from invitado where user=:user");
			$consulta->bindvalue(':user',$user,PDO::PARAM_STR);
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "invitado");		
	}

	public static function TraerInvitadosDNI($dni)  
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT dni, nomyape, pariente, nromesa from invitado where dni=:dni");
			$consulta->bindvalue(':dni',$dni,PDO::PARAM_INT);
			$consulta->execute();
			$buscado= $consulta->fetchObject('invitado');
			return $buscado;			

	}
	
	public static function TraerEstadisticas($user)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT count(nromesa) as invitadosenmesa from invitado where user=:user group by nromesa desc");
		$consulta->bindvalue(':user',$user,PDO::PARAM_STR);
		$consulta->execute();			
		return $consulta->fetchAll();		
	}

		public static function EstadisticasClientes()//cantidad de invitados por usuario
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT count(i.dni) as invitadosxcliente, c.id as idC from invitado as i, cliente as c where i.user=c.usuario group by user desc");
		//$consulta->bindvalue(':user',$user,PDO::PARAM_STR);
		$consulta->execute();			
		return $consulta->fetchAll();		
	}

	public static function buscadorDNI($dni)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT dni, nomyape, nromesa from invitado where dni=:dni");
			$consulta->bindvalue(':dni',$dni,PDO::PARAM_INT);
			$consulta->execute();
			$buscado= $consulta->fetchObject('invitado');
			return $buscado;		
	} //PARA BUSCADOR / PARA SER VISTO POR EL INVITADO


}
?>