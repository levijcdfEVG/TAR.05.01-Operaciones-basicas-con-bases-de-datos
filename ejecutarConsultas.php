<?php
// ejecutarConsultas.php

$host = 'localhost';
$user = 'root';
$pw = '20055002'; 
$dbName = 'alumnosPruebas';

// Conectar a la base de datos
$conexion = new mysqli($host, $user, $pw, $dbName);

// Ejecutar la consulta
$consulta = $_POST['consulta'];
$resultado = $conexion->query($consulta);

?>
