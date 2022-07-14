<?php
define('USER',"root");
define('PASSWORD',"AdminRosales25");
define('SERVER',"localhost");
define('BASEDATOS',"sistema_permisos");
define('PUERTO',"3306");
define("CONSULTA","SELECT *FROM roles");
define("QUERY","INSERT INTO roles(nombre_rol) VALUES(?)");
define("EXISTEROL","SELECT *FROM roles WHERE nombre_rol=?");
define("QUERYEDITAR","SELECT *FROM roles WHERE id_rol=?");
define("QUERYMODIFY","UPDATE roles set nombre_rol=? WHERE id_rol=?");
define("QUERYDELETE","DELETE FROM roles WHERE id_rol=?");
