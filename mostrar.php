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
        <h1>Resultado</h1>
        <div class="contendorCentrado">
            <?php
                // Mostrar resultados directamente sin foreach
                while ($filaDeResultado = $resultado->fetch_assoc()) {   
                    
                    foreach ($filaDeResultado as $key => $value) {
                        echo $key.":    ".$value.'<br>';
                        var_dump($filaDeResultado);
                        echo "<br>";
                        
                    }
                    echo "------------------------------------------------------------";
                    echo "<br>";
                }
                $conexion->close();
            ?>
    </div>
    </body>
</html>