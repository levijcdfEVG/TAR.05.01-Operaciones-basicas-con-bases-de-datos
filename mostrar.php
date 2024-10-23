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
            <?php
                // Mostrar resultados directamente sin foreach
                while ($filaDeResultado = $resultado->fetch_row()) {
                    echo implode(" ", $filaDeResultado) . "<br />"; //https://www.php.net/manual/en/function.implode.php
                }
                $conexion->close();
            ?>
    </div>
    </body>
</html>