<?php


$host = 'localhost';
$user = 'root';
$pw = '';
$dbName = 'alumnosEscuela';

//Conectar a la base de datos
$conexion = new mysqli($host,$user,$pw,$dbName);

$consulta = $_POST['consulta'];


$resultado = $conexion->query($consulta);