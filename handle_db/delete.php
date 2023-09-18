<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["eliminar"];

    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

    $result = $mysqli->query("DELETE FROM usuarios WHERE id=$id");

    $result ? header("Location: /views/dashboard.php") : print("Error al eliminar");

} else {
    header("Location: /index.php");
}