<?php
// ejecutarConsultas.php

$host = 'localhost';
$user = 'root';
$pw = ''; 
$dbName = 'alumnosPruebas';

// Conectar a la base de datos
$conexion = new mysqli($host, $user, $pw, $dbName);

// Ejecutar la consulta
if (isset($_GET)) {
    $operacion = $_GET['operacion'];
    switch ($operacion) {
        case 'mostrarAlumnos':
            // Mostrar alumnos ordenados por nombre
            $resultado = $conexion->query("SELECT nombre FROM alumnos ORDER BY nombre");
            break;
        
        case 'contarNombres':
            // Contar nombres únicos
            $resultado = $conexion->query("SELECT COUNT(DISTINCT nombre) as Nombres FROM alumnos");
            break;

        case 'mostrarApellidos':
            // Mostrar apellidos ordenados por DNI
            $resultado = $conexion->query("SELECT apellido FROM alumnos ORDER BY dni");
            break;

        case 'mostrarNombresApellidosUnicos':
            // Mostrar nombres y apellidos únicos
            $resultado = $conexion->query("SELECT DISTINCT nombre, apellido FROM alumnos ORDER BY apellido");
            break;

        case 'mostrarTodo':
            // Mostrar todos los datos
            $resultado = $conexion->query("SELECT DISTINCT nombre, apellido, dni FROM alumnos ORDER BY nombre");
            break;

        default:
            die("Operación no válida.");
    }

}else{
    
}


