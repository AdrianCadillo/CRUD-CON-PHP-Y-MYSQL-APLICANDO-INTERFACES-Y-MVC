<?php
require 'config.php';
class Conexion{
    /********************* VARIABLES ********************** */
 private $conection=null;
 public $Query;
 public $res;
 public $pps;
 
/**
 * Conexion
 */
public function getConexion(){
    $URL="mysql:host=".SERVER.";dbname=".BASEDATOS;
    $this->conection = new PDO($URL,USER,PASSWORD); 
    $this->conection->query('SET NAMES utf8');
    return $this->conection; 
}
/**
 * Cerrar la conexion
 */
public function Cerrar_Conexion(){
if($this->conection!=null){
$this->conection=null;
} 
}
}
?>