<?php
require 'ejecutarConsultas.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/index.css" />
        <title>Visualizar Consulta</title>
    </head>
    <body>
        <div class="contendorCentrado">
        <table>
            <tr>
                <th class="titulos">Nombre</th>
                <th class="titulos">Apellido</th>
                <th class="titulos">DNI</th>
            </tr>
            <?php
                // Mostrar resultados directamente sin foreach
                while ($filaDeResultado = $resultado->fetch_assoc()) {   
                    echo "<tr>";
                    echo "<td>";
                    echo $filaDeResultado['nombre'];
                    echo "</td>";
                    echo "<td>";
                    echo $filaDeResultado['apellido'];
                    echo "</td>";
                    echo "<td>";
                    echo $filaDeResultado['dni'];
                    echo "</td>";
                    echo "</tr>";
                }
                $conexion->close();
            ?>
        </table>
    </div>
    </body>
</html>