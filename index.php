<?php 
$arreglo = ["Java", "Python","C++",'Java','Java','Java'];

$Elemento_Buscar_In_Array="Java";

echo "EL ELEMENTO <h1>".$Elemento_Buscar_In_Array."</h1> SE ENCONTRO ". CountElementoInArray($arreglo,$Elemento_Buscar_In_Array).
" VECES EN EL ARREGLO";

function CountElementoInArray($array=array(),$ElementoBuscar)
{
$contar=0;
foreach ($array as $items) {
 if($items==$ElementoBuscar){
  $contar+=1;
 }
}
 return $contar;
}

 ?>