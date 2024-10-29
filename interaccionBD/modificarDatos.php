<?php 
// conectar con BD
require 'configuracionBD.php';

$sql = "SELECT nombre as Nombre, apellido as Apellido from alumnos a order by idAlumno ;";
$datosAlumnos = $conexion->query($sql); //Ejecutamos una consulta que recoja los datos de los alumnos

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/index.css" />
        <title>Modificar Datos</title>
    </head>
    <body>
        <h1>Modificar Datos</h1>
        <h2>Seleccionar Alumnos</h2>
        <form action="ejecutarConsultas.php" method="post">
            <select name="seleccionarAlumnos" require>
                <option value="" disabled selected>Selecciona el alumno que quieras modificar</option>
                <?php 
                foreach ($datosAlumnos as $alumno) {
                echo '<option value="' . $alumno['idAlumno'] . '">';
                echo htmlspecialchars($alumno['Nombre'] . ' ' . $alumno['Apellido']);
                echo '</option>';
                } 
                ?>
            </select>
        </form>   
    </body>
</html>