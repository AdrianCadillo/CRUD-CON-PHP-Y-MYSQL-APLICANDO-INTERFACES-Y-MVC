<?php
$url = $_SERVER['PHP_SELF'];

$Name_file = basename($url,".php");

if($Name_file=='menu' || $Name_file=='plantilla')
header("Location:../");