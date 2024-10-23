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
            <?php
                // Mostrar resultados directamente sin foreach
                while ($filaDeResultado = $resultado->fetch_array()) {   
                
                    foreach ($filaDeResultado as $key => $value) {
                        echo $key . '<br>';
                        echo $value . '<br>';
                    }
                }
            ?>
        </table>
    </div>
    </body>
</html>