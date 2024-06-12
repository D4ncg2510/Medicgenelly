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
  //ADMIN
      /*  $_SESSION['id']=$filas;*/
      if($filas['id']==6){
        header("Location: ../AR/html/admin.php");
       exit;
   }else if (mysqli_num_rows($validar_log) > 0 ){
       header("Location:  ../AR/html/inde.php");
       exit;
   }else{
       echo' 
       <script>
       alert("Por favor registrate o inicia sesión");
       window.location = "../AR/html/index.php";
       </script>
       ';
       exit;
   }

?>