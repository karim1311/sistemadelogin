<?php
session_start();
if (!isset($_SESSION["user_data"])) {
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

<body>
    <?php
    $id = $_SESSION["user_data"]["id"];

    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");
    $stmnt = $mysqli->query("SELECT * FROM usuarios WHERE id='$id'");
    $result = $stmnt->fetch_assoc();

    $contrasena_hash = $_SESSION["user_data"]["contrasena"];
    $contrasena_preview = substr($contrasena_hash, 0, 10) . '...';


    ?>

    <h1>Editar informacion:</h1>
    <p>Name:</p>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input class="input-group-text" type="text" name="name" id="basic-addon1" value="<?php echo $result["name"] ?>">
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <span class="input-group-text" id="basic-addon2">@example.com</span>
    </div>

    <div class="mb-3">
        <label for="basic-url" class="form-label">Your vanity URL</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
        </div>
        <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text">.00</span>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Username" aria-label="Username">
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" placeholder="Server" aria-label="Server">
    </div>

    <div class="input-group">
        <span class="input-group-text">With textarea</span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>

    <form action="/handle_db/update.php" method="post" enctype="multipart/form-data">

        <input type="number" hidden name="id" value="<?php echo $id ?>">


        <label for="photo">PHOTO:</label>
        <input type="file" name="photo" id="photo" value="<?php echo $result["photo"] ?>">


        <br>
        <label>Bio:</label>
        <input type="text" name="bio" value="<?php echo $result["bio"] ?>">

        <br>

        <label>PHONE:</label>
        <input type="text" name="phone" value="<?php echo $result["phone"] ?>">

        <br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $result["email"] ?>">

        <br>

        <label>Password:</label>
        <input type="password" name="contrasena" value="<?php echo $contrasena_preview ?>">

        <br>

        <button type="submit">Actualizar</button>
    </form>

</body>

</html>