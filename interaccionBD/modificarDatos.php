<?php 
    // Conectar con BD
    require 'configuracionBD.php';

    // Consulta SQL
    $sql = "SELECT idAlumno, nombre AS Nombre, apellido AS Apellido FROM alumnos ORDER BY idAlumno;";
    $datosAlumnos = $conexion->query($sql); // Ejecutamos una consulta que recoge los datos de los alumnos

    // Verificar si la consulta fue exitosa
    if (!$datosAlumnos) {
        die("Error en la consulta: " . $conexion->error);
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/index.css" />
    <title>Modificar Datos</title>
</head>
<body>
    <h1>Modificar Datos</h1>
    <h2>Seleccionar Alumnos</h2>
    <form action="insertarDatos.php" method="post">
        <select name="seleccionarAlumnos" required>
            <option value="" disabled selected>Selecciona el alumno que quieras modificar</option>           
            <?php 
                // Recorrer los resultados si la consulta fue exitosa
                foreach ($datosAlumnos as $alumno) {
                    echo '<option value="' . $alumno['idAlumno'] . '">';
                    echo $alumno['Nombre'] . ' ' . $alumno['Apellido'];
                    echo '</option>';
                } 
            ?>
        </select>
        <input type="submit" />
    </form>   
</body>
</html>
