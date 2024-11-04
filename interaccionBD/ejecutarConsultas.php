<?php
// conectar con BD
require 'configuracionBD.php';


// Inicializar variables
$operacion = null;
$sql = "";

// Ejecutar la consulta
if (isset($_GET['operacion'])) {
    $operacion = $_GET['operacion'];
    switch ($operacion) {
        case 'mostrarAlumnos':
            // Mostrar alumnos ordenados por nombre
            $resultado = $conexion->query("SELECT nombre as Nombres FROM alumnos ORDER BY nombre");
            break;
        
        case 'contarNombres':
            // Contar nombres únicos
            $resultado = $conexion->query("SELECT COUNT(DISTINCT nombre) as Nombres FROM alumnos");
            break;

        case 'mostrarApellidos':
            // Mostrar apellidos ordenados por DNI
            $resultado = $conexion->query("SELECT apellido as Apellidos FROM alumnos ORDER BY dni");
            break;

        case 'mostrarNombresApellidosUnicos':
            // Mostrar nombres y apellidos únicos
            $resultado = $conexion->query("SELECT DISTINCT nombre as Nombres, apellido as Apellidos FROM alumnos ORDER BY apellido");
            break;

        case 'mostrarTodo':
            // Mostrar todos los datos
            $resultado = $conexion->query("SELECT DISTINCT nombre as Nombres, apellido as Apellidos, dni as DNI FROM alumnos ORDER BY nombre");
            break;

        default:
            die("Operación no válida.");
    }

}else if (isset($_POST['operacion'])) {
    $operacion = $_POST['operacion']; // Recoge el value del botón submit
    
    switch ($operacion) {
        case 'insertar':
            // Construir consulta de inserción y verificar si el DNI ya existe
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];

            // Verificar la existencia del DNI antes de insertar (Ejercicio dia 4 de Noviembre)
            $sqlVerificacion = "SELECT dni FROM alumnos WHERE dni = '" .$dni. "';";
            $resultadoVerificacion = $conexion->query($sqlVerificacion);

            if ($resultadoVerificacion && $resultadoVerificacion->num_rows > 0) {
                // Si existe un alumno con el mismo DNI, regresar con mensaje de error
                $error = "Error: Ya existe un alumno con el mismo DNI.";
                include 'insertarDatos.php'; // Incluir el formulario nuevamente con el error
                return; // Detener la ejecución
                //Fin del nuevo bloque de codigo
            } else {
                // Si el DNI no existe, insertar en la base de datos
                $sql = "INSERT INTO alumnos (nombre, apellido, dni) VALUES ('$nombre', '$apellido', '$dni')";
                if ($conexion->query($sql)) {
                    echo "<h1>¡CONSULTA EXITOSA!</h1>";
                } else {
                    echo "<h1>Error al insertar: " . $conexion->error . "</h1>";
                }
                echo "<a href='../index.html'>Volver al Menu Principal</a>";
            }
            break;

        case 'borrar':
            // Construir consulta de borrado
            $dni = $_POST['dni'];

            // Verificar la existencia del DNI antes de borrar (Ejercicio dia 4 de Noviembre)
            $sqlVerificacion = "SELECT dni FROM alumnos WHERE dni = '" .$dni. "';";
            $resultadoVerificacion = $conexion->query($sqlVerificacion);

            if ($resultadoVerificacion && $resultadoVerificacion->num_rows == 0) {
                // Si existe un alumno con el mismo DNI, regresar con mensaje de error
                $error = "Error: No existe ese DNI.";
                include 'borrarDatos.php'; // Incluir el formulario nuevamente con el error
                return; // Detener la ejecución
                //Fin del nuevo bloque de codigo
            }
            $sql = "DELETE FROM alumnos WHERE dni = '$dni'";
            $conexion->query($sql);
            echo "<h1>¡CONSULTA EXITOSA!</h1>";
            echo "<a href='../index.html'>Volver al Menu Principal</a>";
            break;
            
        case 'modificar':
            // Construir consulta de modificación
            $dni =$_POST['dni'];
            $nuevoNombre = $_POST['nombre'];
            $nuevoApellido = $_POST['apellido'];
            $sql = "UPDATE alumnos SET nombre = '$nuevoNombre', apellido = '$nuevoApellido' WHERE dni = '$dni'";
            $conexion->query($sql);
            echo "<h1>¡CONSULTA EXITOSA!</h1>";
            echo "<a href='../index.html'>Volver al Menu Principal</a>";
            break;

        default:
            die("Operación no válida.");
    }
}


