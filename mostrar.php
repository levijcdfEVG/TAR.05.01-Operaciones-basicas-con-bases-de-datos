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
        <style>
            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
            th, td {
                padding: 12px;
                text-align: left;
                border: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            tr:hover {
                background-color: #f1f1f1;
            }
            .contenedorCentrado {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Resultado</h1>
        <div class="contenedorCentrado">
            <?php
                if ($resultado->num_rows > 0) {
                    echo "<table>";
                    // Obtener los encabezados de las columnas
                    $filaDeResultado = $resultado->fetch_assoc();
                    echo "<tr>";
                    foreach (array_keys($filaDeResultado) as $key) {
                        echo "<th>" . $key . "</th>";
                    }
                    echo "</tr>";
                    
                    // Volver a imprimir la primera fila
                    echo "<tr>";
                    foreach ($filaDeResultado as $value) {
                        echo "<td>" . $value . "</td>";
                    }
                    echo "</tr>";

                    // Mostrar el resto de los resultados
                    while ($filaDeResultado = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($filaDeResultado as $value) {
                            echo "<td>" . $value . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No se encontraron resultados.";
                }

                $conexion->close();
            ?>
        </div>
    </body>
</html>
