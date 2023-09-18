<?php
session_start();
if (!isset($_SESSION["user_data"])) {
    echo "No existe una sesion iniciada";
    header("Location: /views/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="d-flex justify-content-center vh-100 w-100">
    <a href="/views/edit.php">Editar</a>
    <?php

    $photo = $_SESSION["user_data"]["photo"];
    $email = $_SESSION["user_data"]["email"];
    $id = $_SESSION["user_data"]["id"];
    $bio = $_SESSION["user_data"]["bio"];
    $name = $_SESSION["user_data"]["name"];
    $phone = $_SESSION["user_data"]["phone"];
    $hash = $_SESSION["user_data"]["contrasena"];
    $contrasena_preview = substr($hash, 0, 10) . '...';
    ?>

    <section class="d-flex flex-column justify-content-center align-items-center w-100 vh-100">
    <div class='card info  d-flex flex-column form-register justify-content-center border border-1 --bs-tertiary-color gap-4 p-5 rounded-4'>
        <div class='card-body'>
            <h5 class='card-title'>Profile</h5>
            <p class='card-text'>Some info may be visible for other people</p>
        </div>
        <img src=<?php echo $photo ?> class='border rounded-1' alt='picture' width="72"  height='72' />
        <ul class='list-group list-group-flush'>
            <li class='list-group-item d-flex'>
               <?php echo $name ?></li>
            <li class='list-group-item'><?php echo $bio ?></li>
            <li class='list-group-item'><?php echo $phone ?></li>
            <li class='list-group-item'><?php echo $email ?></li>
            <li class='list-group-item'>******</li>
        </ul>
    </div>

    </section>
    


    <a href="/handle_db/logout.php">Logout</a>
</body>

</html>

<!-- /* 

require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

$stmnt = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id'");

// while ($row = $stmnt->fetch_assoc()) {
    $id = $row["id"];
    $email = $row["email"];
*/ -->