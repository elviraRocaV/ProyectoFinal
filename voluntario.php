<?php
require_once "Entities/Voluntario.php";
require_once "Database/Connection.php";

$conexion=Connection::make();   //llamar a la base de datos
$consulta="insert into (nombre, apellidos) values (:nombre,:apellidos)";  //preparamos la consulta
$stmnt=$conexion->prepare($consulta);  //hacemos el objeto $stmnt !Importante
$nombre="Elvira";
$apell="Roca Vaño";
$arrayparametros=[":nombre"=>$nombre,":apellidos"=>$apell];  //ponemos los datos
//$arrayparametros=[":nombre"=>$persona1->getNombre(),":apellidos"=>$persona1->getApellidos()];  //ponemos los datos

$stmnt->execute($arrayparametros);    //ejercutamos el objeto $stmnt con los datos que hemos creado




?>