/* archivo update.php dentro de carpeta handle_db */
<?php
session_start();
if (!isset($_SESSION["user_data"])) {
    echo "No existe una sesion iniciada";
    header("Location: /views/login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");
    extract($_POST);


    try {
        //mover la imagen al servidor
        $type = substr($_FILES["photo"]["type"], 0, 5);
        var_dump($type);
        if ($type === "image") {
            $tmp_location = $_FILES["photo"]["tmp_name"];

            $fn_location_db = "/public/img" . $_FILES["photo"]["name"];
            $fn_location = $_SERVER["DOCUMENT_ROOT"] . $fn_location_db;

            if (move_uploaded_file($tmp_location, $fn_location)) {
                $mysqli->query("UPDATE usuarios SET photo = '$fn_location_db' WHERE id = '$id'");

                header("Location: /views/dashboard.php");
            }
        } else {
            echo "Solo puede subir imagenes";
        }

        //Corroborar que no puso un string vacío
        $email !== "" && $mysqli->query("UPDATE usuarios SET email = '$email' WHERE id = '$id'");

        // Crear un hash de la nueva contraseña
        $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

        // Actualizar la contraseña en la base de datos
        $mysqli->query("UPDATE usuarios SET contrasena = '$contrasena_hash' WHERE id = '$id'");
        
        $name !== "" && $mysqli->query("UPDATE usuarios SET name = '$name' WHERE id = '$id'");

        $bio !== "" && $mysqli->query("UPDATE usuarios SET bio = '$bio' WHERE id = '$id'");

        $phone !== "" && $mysqli->query("UPDATE usuarios SET phone = '$phone' WHERE id = '$id'");



        // Después de actualizar los datos en la base de datos
        $_SESSION["user_data"] = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id'")->fetch_assoc();

        header("Location: /views/dashboard.php");
    } catch (mysqli_sql_exception $e) {
        echo "Error al actualizar los datos " . $e->getMessage();
    }
} else {
    var_dump($_POST);
    echo "Location: /views/dashboard.php";
}
