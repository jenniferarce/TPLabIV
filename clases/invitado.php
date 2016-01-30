<?php
class invitado
{
	
	public $id; //de cliente
	public $dni;
	public $nomyape;
	public $pariente;
	public $nromesa;

	 public function InsertarInvitado()
	 {
	 	
	 			//require_once("cliente.php");
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarInvitado(:id,:dni,:nomyape,:pariente,:nromesa)");
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT); //VER
				$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);
				$consulta->bindValue(':nomyape',$this->nomyape, PDO::PARAM_STR);
				$consulta->bindvalue(':pariente',$this->pariente,PDO::PARAM_STR);
				$consulta->bindValue(':nromesa',$this->nromesa, PDO::PARAM_INT);

				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	/*public function BorrarInvitado()
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
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarInvitado(:nomyape,:dni,:pariente,:nromesa,:idd)");
			$consulta->bindValue(':nomyape',$this->nomyape, PDO::PARAM_STR);
			$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);
			$consulta->bindvalue(':pariente',$this->pariente,PDO::PARAM_STR);
			$consulta->bindValue(':nromesa',$this->nromesa, PDO::PARAM_INT);
			$consulta->bindValue(':idd',$this->idd, PDO::PARAM_INT);
			return $consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }*/

	public function GuardarInvitado()
	 {

	 	/*if($this->dni>0)
	 		{
	 			$this->ModificarInvitado();
	 		}else {*/
	 			$this->InsertarInvitado();
	 		//}

	 }
	
	public static function TraerInvitados($id) //VER
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerInvitados(:id)");
			$consulta->bindvalue(':id',$id,PDO::PARAM_INT);
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "invitado");		
	}

	/*public static function TraerInvitadoId($idd)  //hacer por DNI
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerInvitadoId(:idd)");
			$consulta->bindvalue(':idd',$idd,PDO::PARAM_INT);
			$consulta->execute();
			$buscado= $consulta->fetchObject('invitado');
			return $buscado;			

	}
	public function validarInvitado($dni) 
	//validar que no exista el dni y que el numero de mesa no sobrepase las 10 personas!!!
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta=$objetoAccesoDato->RetornarConsulta("CALL validarInvitado(:dni)");
		$consulta->bindvalue(':dni',$this->dni,PDO::PARAM_INT);
		$consulta->execute();
		$buscado=$consulta->fetchObject('invitado');
		return $buscado;
	}//validda que no exista */
}
?>