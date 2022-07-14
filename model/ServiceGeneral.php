<?php
class Service implements RepoGeneral{
 private $conexion;
 private $conector;
 public function __construct()
 {
 $this->conexion = new Conexion();
 $this->conector = $this->conexion->getConexion();   
 }   

 /**
  * Verificar si existe
  */
  public function existeDato($Sql,$data){
  try {
    $this->conexion->pps = $this->conector->prepare($Sql);
    $this->conexion->pps->bindParam(1,$data,PDO::PARAM_STR);
    $this->conexion->pps->execute();
    return $this->conexion->pps->rowCount();
  } catch (\Throwable $th) {}finally{$this->conexion->Cerrar_Conexion();}
  }
/**Implementa el método de la interface
 * este método realiza un crud completo, haciendo uso de PDO
 */
  public function CrudOptimize($Query, $datos = [])
  {
    $valor=0;
    try {
      $this->conexion->pps = $this->conector->prepare($Query);
      for($i=0;$i<count($datos);$i++){
      $this->conexion->pps->bindParam(($i+1),$datos[$i]);
      }
      return $this->conexion->pps->execute();
     } catch (\Throwable $th) {
      echo $th->getMessage();
    }finally{$this->conexion->Cerrar_Conexion();}
  }
}