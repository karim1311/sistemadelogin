// archivo upload_img.php dentro de carpeta handle_db
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");


    //mover la imagen al servidor
    $type = substr($_FILES["photo"]["type"], 0, 5);
    var_dump($type);
    if ($type === "photo") {
        $tmp_location = $_FILES["photo"]["tmp_name"];

        $fn_location_db = "/public/img" . $_FILES["photo"]["name"];
        $fn_location = $_SERVER["DOCUMENT_ROOT"] . $fn_location_db;

        if (move_uploaded_file($tmp_location, $fn_location)) {
            $mysqli->query("INSERT INTO usuarios (photo) VALUES ('$fn_location_db')");

            header("Location: /views/dashboard.php");
        }
    } else {
        echo "Solo puede subir imagenes";
    }
}

//usamos las funciones file_get_contents y addslashes para guardarlos en la base de datos, así guardado en una variable.