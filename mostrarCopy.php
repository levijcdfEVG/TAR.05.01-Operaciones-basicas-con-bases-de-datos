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
        <h1>Resultados</h1>
        <div class="contendorCentrado">
            <table>
                <?php
                    // Mostrar resultados directamente sin foreach
                    while ($filaDeResultado = $resultado->fetch_array()) {   
                        echo "<tr>";
                        foreach ($filaDeResultado as $key => $value) {
                            echo "<td>";
                            echo $key;
                            echo "</td>";
                            echo "<td>";
                            echo $value;
                            echo "</td>";
                            
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>