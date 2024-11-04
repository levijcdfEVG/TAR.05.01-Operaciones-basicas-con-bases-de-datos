<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/index.css" />
        <title>Insertar Datos</title>
    </head>
    <body>
        <h1>Elige una Operación</h1>
        <?php  
            // Conectar con BD
            require 'configuracionBD.php';

            if(isset($error)){
                echo $error.'<br/>';
            }
            // Verificar si se ha seleccionado un alumno
            if (!isset($_POST['seleccionarAlumnos'])) {
                // Formulario para insertar
                echo '<form action="ejecutarConsultas.php" method="post">
                        <input type="text" name="nombre" placeholder="Nombre">
                        <input type="text" name="apellido" placeholder="Apellido">
                        <input type="text" name="dni" placeholder="DNI">
                        <input type="submit" name="operacion" value="insertar">
                    </form>';
            } else {
                // Recuperar el id del alumno seleccionado
                $idAlumno = $_POST['seleccionarAlumnos'];

                // Consulta para obtener los datos del alumno
                $sql = "SELECT nombre, apellido, dni FROM alumnos WHERE idAlumno = " . $idAlumno . ";";
                $resultado = $conexion->query($sql); // Ejecutamos la consulta

                // Verificar si se encontró el alumno
                if ($resultado && $resultado->num_rows > 0) {
                    $alumno = $resultado->fetch_assoc();
                    $nombre = $alumno['nombre'];
                    $apellido = $alumno['apellido'];
                    $dni = $alumno['dni'];
                } else {
                    echo "Alumno no encontrado.";
                }

                // Formulario para modificar con valores predefinidos
                echo '<form action="ejecutarConsultas.php" method="post">
                        <input type="hidden" name="idAlumno" value="' . $idAlumno. '">
                        <input type="text" name="nombre" placeholder="Nombre" value="' . $nombre . '">
                        <input type="text" name="apellido" placeholder="Apellido" value="' . $apellido . '">
                        <input type="text" name="dni" placeholder="DNI" value="' . $dni . '">
                        <input type="submit" name="operacion" value="modificar">
                    </form>';
            }

            require 'verificacionInsert.php';
        ?>  
        <br>
    </body>
</html>