<?php


$host = 'localhost';
$user = 'root';
$pw = '';
$dbName = 'alumnosEscuela';

//Conectar a la base de datos
$conexion = new mysqli($host,$user,$pw,$dbName);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

//Ejecutar las consultas
$consulta = $_POST['consulta'];
$resultado = $conexion->query($consulta);
header("Location:mostrar.php?result=$resultado");