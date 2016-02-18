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
	 	
	 			//require_once("cliente.php");
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarInvitado(:user,:dni,:nomyape,:pariente,:nromesa)");
				$consulta->bindValue(':user',$this->user, PDO::PARAM_STR); //VER
				$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);
				$consulta->bindValue(':nomyape',$this->nomyape, PDO::PARAM_STR);
				$consulta->bindvalue(':pariente',$this->pariente,PDO::PARAM_STR);
				$consulta->bindValue(':nromesa',$this->nromesa, PDO::PARAM_INT);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	public function BorrarInvitado()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarInvitado(:dni)");	
				$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);		
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
	
	public static function TraerInvitados($user) //VER
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerInvitados(:user)");
			$consulta->bindvalue(':user',$user,PDO::PARAM_STR);
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "invitado");		
	}

	public static function TraerInvitadosDNI($dni)  
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerInvitadosDNI(:dni)");
			$consulta->bindvalue(':dni',$dni,PDO::PARAM_INT);
			$consulta->execute();
			$buscado= $consulta->fetchObject('invitado');
			return $buscado;			

	}
	
	public static function TraerEstadisticas()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select count(nromesa) as invitados, nomyape as nombre from invitado group by nomyape order by invitados");
		$consulta->execute();			
		return $consulta->fetchAll();		
	}



}
?>