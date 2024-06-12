<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$database = "medicgenely";

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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar_paciente"])) {
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];

        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $sintomas = implode(", ", $_POST['sintomas']);
        $descripcion = $_POST['descripcion'];
        $duracion = $_POST['duracion'];
        $intensidad = $_POST['intensidad'];
        $factores = implode(", ", $_POST['factores']);
        $antecedentes = implode(", ", $_POST['antecedentes']);

        $stmt = $conn->prepare("INSERT INTO pacientes (usuario_id, nombre, edad, sexo, sintomas, descripcion, duracion, intensidad, factores, antecedentes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isississsss", $user_id, $nombre, $edad, $sexo, $sintomas, $descripcion, $duracion, $intensidad, $factores, $antecedentes);

        if ($stmt->execute()) {
            echo "Datos insertados correctamente";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Debes iniciar sesión para registrar un paciente.";
    }
}
$conn->close();
?>