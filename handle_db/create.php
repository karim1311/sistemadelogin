// archivo create.php dentro de carpeta handle_db
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);
    

    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

    try {
        $result = $mysqli->query("INSERT INTO usuarios (email, contrasena) VALUES ('$email', '$hash')");

        if($result) {
            session_start();
            $_SESSION["user_data"] = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'")->fetch_assoc();
            header("Location: /views/dashboard.php");
        } else {
            echo "Error al registrar un usuario";
        }
    } catch (mysqli_sql_exception $e) {
        if ($mysqli->errno === 1062) {
            session_start();
            $_SESSION["duplicado"] = "El correo ya existe";
            header("Location: /index.php");
        } else {
            echo "Error al registrar: " . $e->getMessage();
        }
    }
}