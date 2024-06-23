<?php
    $conexion = mysqli_connect("localhost","root","","medicgenely");
    if($conexion){
        echo 'Conectado exitosamente a la Base dee Datos';
        }else{
            echo 'No se ha podido conectar a la base de datos';
        }

?>