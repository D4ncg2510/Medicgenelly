<?php
session_start();
    include 'conexion_be.php';
    $Correo = $_POST['Correo'];
    $Contraseña = $_POST['Contraseña'];
    session_start();
    $_SESSION['Correo']=$Correo;

    $validar_log = mysqli_query($conexion, "SELECT * FROM login_medic WHERE Correo='Correo' and Contraseña='$Contraseña'");
    $_SESSION['login_medic'] = $Correo;
    $filas=mysqli_fetch_array($validar_log);



?>