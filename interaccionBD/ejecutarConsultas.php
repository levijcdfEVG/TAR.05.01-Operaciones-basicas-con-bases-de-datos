<?php
// ejecutarConsultas.php

$host = 'localhost';
$user = 'root';
$pw = ''; 
$dbName = 'alumnosPruebas';

// Conectar a la base de datos
$conexion = new mysqli($host, $user, $pw, $dbName);
// Inicializar variables
$resultado = null;
$operacion = null;
$sql = "";

// Ejecutar la consulta
if (isset($_GET['operacion'])) {
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

}else if (isset($_POST['operacion'])) {
    $operacion = $_POST['operacion']; // Recoge el value del botón submit
    
    switch ($operacion) {
        case 'insertar':
            // Construir consulta de inserción
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $sql = "INSERT INTO alumnos (nombre, apellido, dni) VALUES ('$nombre', '$apellido', '$dni')";
            echo "<h1>¡CONSULTA EXITOSA</h1>";
            break;

        case 'borrar':
            // Construir consulta de borrado
            $dni = $_POST['dni'];
            $sql = "DELETE FROM alumnos WHERE dni = '$dni'";
            echo "<h1>¡CONSULTA EXITOSA</h1>";
            break;

        case 'modificar':
            // Construir consulta de modificación
            $dni =$_POST['dni'];
            $nuevoNombre = $_POST['nombre'];
            $nuevoApellido = $_POST['apellido'];
            $sql = "UPDATE alumnos SET nombre = '$nuevoNombre', apellido = '$nuevoApellido' WHERE dni = '$dni'";
            echo "<h1>¡CONSULTA EXITOSA</h1>";
            break;

        default:
            die("Operación no válida.");
    }
}


