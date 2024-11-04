<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/index.css" />
        <title>Borrar Datos</title>
    </head>
    <body>
        <h1>Elige una Operación</h1>
        <?php
            if(isset($error)){
                echo $error.'<br/>';
            }
        ?>
        <form action="ejecutarConsultas.php" method="post">
            <input type="text" name="dni" placeholder="DNI" required>
            <input type="submit" name="operacion" value="borrar">
        </form>        
        <br>
    </body>
</html>