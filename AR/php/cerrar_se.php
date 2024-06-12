<?php
 include 'conexion_be.php'; 

             session_start();
             session_destroy();
             header('Location:  ../AR/html/index.html');
          
?>