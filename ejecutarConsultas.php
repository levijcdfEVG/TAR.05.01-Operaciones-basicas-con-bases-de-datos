<?php
// ejecutarConsultas.php

$host = 'localhost';
$user = 'root';
$pw = ''; // Sin espacio si no hay contraseña
$dbName = 'alumnosEscuela';

// Conectar a la base de datos
$conexion = new mysqli($host, $user, $pw, $dbName);

// Ejecutar la consulta
$consulta = $_POST['consulta'];
$resultado = $conexion->query($consulta);


