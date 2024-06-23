<?php
session_start();
include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Verificar los datos de inicio de sesión
$validar_log = mysqli_query($conexion, "SELECT * FROM login_medic WHERE correo='$correo' AND contrasena='$contrasena'");
$filas = mysqli_fetch_array($validar_log);
/*esta es parte del admin*/
if ($filas) {
    $_SESSION['correo'] = $correo;

    if ($filas['id'] == 6) { // Asumiendo que el ID 6 es el admin
        header("Location: ../html/admin.php");
        exit();
    } else {
        header("Location: ../html/index.php");
        exit();
    }
} else {
    echo '
    <script>
        alert("Correo o contraseña incorrectos, por favor intenta de nuevo.");
        window.location = "../html/login.html";
    </script>
    ';
    exit();
}
?>
