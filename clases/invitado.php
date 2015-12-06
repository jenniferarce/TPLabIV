<?php
class invitado
{
	public $idd;
	public $id; //de cliente
	public $nom;
	public $dni;
	public $provincia;
	public $localidad;
	public $direccion;
	public $pariente;
	public $nromesa;
	//public $ubicado; //true-false

	 public function InsertarInvitado()
	 {
	 	require_once("cliente.php");

				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarInvitado(:id,:nom,:dni,:provincia,:localidad,:direccion,:pariente,:nromesa,)");
				$consulta->bindValue(':id',$this->id, PDO::PARAM_STR); //VER
				$consulta->bindValue(':nom',$this->nom, PDO::PARAM_STR);
				$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);
				$consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
				$consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
				$consulta->bindValue(':direccion', $this->direccion, PDO::PARAM_STR);
				$consulta->bindvalue(':pariente',$this->pariente,PDO::PARAM_STR);
				$consulta->bindValue(':nromesa',$this->nromesa, PDO::PARAM_INT);

				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	public function BorrarInvitado()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarInvitado(:idd)");	
				$consulta->bindValue(':idd',$this->idd, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 } 
	 public function ModificarInvitado()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarInvitado(:nom,:dni,:direccion,:provincia,:localidad,:pariente,:nromesa,:idd)");
			$consulta->bindValue(':nom',$this->nom, PDO::PARAM_STR);
			$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);
			$consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
			$consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
			$consulta->bindValue(':direccion',$this->direccion, PDO::PARAM_STR);
			$consulta->bindvalue(':pariente',$this->pariente,PDO::PARAM_STR);
			$consulta->bindValue(':nromesa',$this->nromesa, PDO::PARAM_INT);
			$consulta->bindValue(':idd',$this->idd, PDO::PARAM_INT);
			return $consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	public function GuardarInvitado()
	 {

	 	if($this->idd>0)
	 		{
	 			$this->ModificarInvitado();
	 		}else {
	 			$this->InsertarInvitado();
	 		}

	 }
	
	public static function TraerInvitados()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerInvitados()");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "invitado");		
	}

	public static function TraerInvitadoId($idd) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerInvitadoId(:idd)");
			$consulta->bindvalue(':idd',$idd,PDO::PARAM_INT);
			$consulta->execute();
			$buscado= $consulta->fetchObject('invitado');
			return $buscado;			

	}
	public function validarInvitado($dni)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("CALL validarInvitado(:dni)");
		$consulta->bindvalue(':dni',$this->dni,PDO::PARAM_INT);
		$consulta->execute();
		$buscado=$consulta->fetchObject('invitado');
		return $buscado;
	}//validda que no exista
}
?>