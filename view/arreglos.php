<?php
echo "<h1 style='text-align:center'> Tema de Arreglos</h1>";

/**
 * Array normal
 */
$empleados = array(
"Abelardo Adrian",/// 0
"María Alessia", //1
"Irma Julieta",//2
"Pedro Montalvan" //3
    
);

$empleados1 =[
    "Abelardo Adrian",/// 0
    "María Alessia", //1
    "Irma Julieta",//2
    "Pedro Montalvan" //3

];

foreach ($empleados1 as $key => $value) { /// key => indice del elemento 
    /// value => indica el valor que contiene el array
    echo $key." ".$value."<br>";
}
echo "<br>";
for($i=0;$i<count($empleados1);$i++){
    echo $empleados1[$i]."<br>";
}


/**
 * Arreglos asociativos
 */

 ECHO "<BR>";
 $frutas = [
  "FRUTA1"=>"Naranja",
  "FRUTA2"=>"Pacae",
  "FRUTA3"=>"Piña",
  "FRUTA4"=>"Mandarina"   
 ];

 foreach ($frutas as $key => $value) { /// key => indice del elemento 
    /// value => indica el valor que contiene el array
    echo $key." : ".$value."<br>";
}

echo "<br> verificar si es un array, para ello usamos <b>is_array</b>";
$datos=3;
$verifica = is_array($empleados) ?'si es un array':'no es un array';
echo "<br>".$verifica;

echo "<br> verificar si un elemento existe dentro de un array, para ello usamos <b>in_array</b>";

$elemento = "Naranja";
$existeElemento = in_array($elemento,$frutas)?
 true:false;

 if(!$existeElemento)
 echo "<br>elemento insertado";
 else
 echo "<br> ya existe";

echo "<br> elimina el último elemento del array <b>array_pop()</b> <br>";

array_pop($empleados);

print_r($empleados);

echo "<br>agregar un elemento al array <b>array_merge()</b> <br>";

$elementoAdd = "Pera";
$existe = in_array($elementoAdd,$frutas)?true:false;
if(!$existe){
print_r(array_merge($frutas,["FRUTA5"=> $elementoAdd]));
}else{
echo "ya existe";
}

echo "<br> AHORA PARA BORRAR UN ELEMENTO EN ESPECIFICO DEL ARRAY USAMO : <B>unset(arreglo[indice])</b><br>";

unset($frutas['FRUTA3']);// eliminamos el elemento con key FRUTA5
print_r($frutas);

echo "<br> ARRAYS MULTIDIMENASIONALES<br>";

$Persona =[
 "Nombre"=>'Abelardo Adrian',
 "Apellidos"=>"Rosales Cadillo",
 "Genero"=>"Masculino",
 "Direccion"=>"Ancash-Carhuaz-Carhuaz",
 "Profesión"=>["Ing.de sistemas","Ing-Civil","Administración"],
 "Deporte"=>["Caminata","VIDEO"=>"Dragón ball super"]
];

$EXISTE_IN_ARRAY = in_array("Dragón ball super",$Persona['Deporte'])?true:false;

echo $EXISTE_IN_ARRAY;

 print_r(array_count_values($empleados));


 echo "<br>";

 $numeros =[1,2,3,4];

 echo "multimplicacion : ".array_product($numeros).
 "<br> SUMA : ".array_sum($numeros).
 "<br> RESTA : ".array_diff($numeros)."<br>";

 /**
  * USO DE EXPLODE E IMPLODE
  */

  $explodestr ="adrian-rosales-cadillo";

  $explode = explode("-",$explodestr);

print_r($explode);
echo "<br> IMPLODE<BR>";

$implodeArray =['adrian','rosales','cadillo'];

$implode = implode("-",$implodeArray);

echo $implode;

 










 



