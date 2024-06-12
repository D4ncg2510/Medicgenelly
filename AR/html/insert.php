<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$database = "base_de_datos";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Proceso de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, username, password FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $stmt->bind_result($id, $username_db, $password_db);
    $stmt->fetch();
    if (password_verify($password, $password_db)) {
        session_start();
        $_SESSION["username"] = $username_db;
        header("Location: insert.php");
        exit();
    } else {
        $error_message = "Usuario o contraseña incorrectos.";
    }
    $stmt->close();
}

//Proceso de Registro de usuario

?>