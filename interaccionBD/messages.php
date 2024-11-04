<?php

require 'configuracionBD.php';

//Verificar si se han enviado datos
if (isset($_POST['operacion'])) {
    
    $sql = "SELECT ";

}else{
    echo 'No has introducido datos en el formulario';
}