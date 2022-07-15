<?php
require '../Interface/RepoGeneral.php';
require 'ServiceGeneral.php';
require '../Interface/ReporPermiso.php';
class Permiso implements Repo{
private $conexion;
private $service;
private $misDatos=[];
public function __construct()
{
$this->conexion = new Conexion();   
$this->service = new Service(); 
foreach ($this->getShowPermisos() as $value) {
array_push($this->misDatos,$value['nombre_rol']);
}
}  

/***
 * VER LA LISTA DE PERMISOS
 */
public function getShowPermisos()
{
    try {
    $this->conexion->Query = CONSULTA;
    $this->conexion->pps = $this->conexion->getConexion()->prepare($this->conexion->Query);
    $this->conexion->pps->execute();
    /// verficAR SI HAY DATOS
    $rows = $this->conexion->pps->rowCount();/// vemos la cantidad de datos
   if($rows>0){
    return $this->conexion->res = $this->conexion->pps->fetchAll(PDO::FETCH_ASSOC);
   }
    } catch (\Throwable $th) {echo "no hay datos";}finally{$this->conexion->Cerrar_Conexion();}   
}

/**
 * Crear nuevos roles
 */

public function saveRol($Name_rol)
{
$datos=[$Name_rol];
$this->conexion->Query = QUERY;
$valor=0;
try {
if(!$this->service->existeDatoLogico($this->misDatos,$Name_rol)){
    $valor=$this->service->CrudOptimize(QUERY,$datos);
}else{
    $valor =2;
}
} catch (\Throwable $th) {
    //throw $th;
}finally{$this->conexion->Cerrar_Conexion();}
return $valor;
}

/**
 * LISTAR POR ID para editar
  */
  public function findById($Query,$Id)
  {
  $datos=[];
  try {
   $this->conexion->pps = $this->conexion->getConexion()
   ->prepare($Query);
   $this->conexion->pps->bindParam(1,$Id);
   $this->conexion->pps->execute();
   if($this->conexion->pps->rowCount()>0){
   return $this->conexion->pps->fetchAll(PDO::FETCH_ASSOC);
   }
  } catch (\Throwable $th) {
  }finally{$this->conexion->Cerrar_Conexion();}
  }
/**
 * Modificar los roles
 */

 public function update($Query,$datos=array()){
 $valor =0;
 if(!$this->service->existeDatoLogico($this->misDatos,$datos[0])){
 $valor=$this->service->CrudOptimize(QUERYMODIFY,$datos);//  
 }else{
 $valor=2;
 }
 return $valor;
 }

 /**
  * Eliminar roles, este metoo viene  de la interface 
  * Repo
  */
  public function destroy($id)
  {
   $data=[$id];   
   return $this->service->CrudOptimize(QUERYDELETE,$data);
  }
    
}
