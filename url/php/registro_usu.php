<?php
include 'conexion_be.php';
    
    $Nombre = $_POST['Nombre'];
    $Correo = $_POST['Correo'];
    $Contraseña = $_POST['$Contraseña'];
    $query = "INSERT INTO login_medic(Nombre, Correo, Contraseña) 
     VALUES ('$Nombre','$Correo','$Contraseña')";
     $verificar_correo = mysqli_query($conexion, "SELECT * FROM  login_medic WHERE Correo='$Correo' ");
     if(mysqli_num_rows($verificar_correo) > 0){
         echo'
         <script>
         alert("El correo ya esta registrado, intenta de nuevo");
         window.location= "../html/login.html";
         </script>
         ';
         exit();
     }
 
     $ejecutar = mysqli_query($conexion , $query);
 
      if($ejecutar){
         echo'
         <script>
         alert("Se hizo el registro");
         window.location = "../html/login.html";
         </script>
         ';
      }
 
?>