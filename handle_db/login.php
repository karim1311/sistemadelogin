<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

    $stmnt = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'");
    //corroboro si el resultado es una fila
    if ($stmnt->num_rows === 1) {
        $result = $stmnt->fetch_assoc();

        var_dump($result);
        if (password_verify($contrasena, $result["contrasena"])) {
            session_start();
            $_SESSION["user_data"] = $result;
            header("Location: /views/dashboard.php");
        }
    }

}