<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Registrate</title>
</head>

<body class="d-flex justify-content-center vh-100 w-100">
    <section class="d-flex flex-column justify-content-center align-items-center w-100 vh-100 ">
        <form action="/handle_db/create.php" method="post" class="d-flex flex-column form-register justify-content-center border border-1 --bs-tertiary-color gap-4 p-5 rounded-4">

            <div class="d-flex pt-2">
                <img src="/assets/devchallenges.svg" height="18px" width="131"></img>
            </div>

            <div class="d-flex flex-column texto-register mb-5">

                <p class="join-text">
                    Join thousands of learners from around the world
                </p>
                <p class="master-text">
                    Master web development by making real-life projects. There are multiple paths for you to choose
                </p>

            </div>

            <div class="d-flex flex-column gap-3">
                <div class="d-flex border border-1 input rounded p-2">
                    <label class="d-flex border border-0" for="email">
                        <span class="material-symbols-rounded d-flex justify-content-center p-1">mail</span>
                        <input type="email" name="email" placeholder="Email" class="border border-0">
                    </label>

                </div>

                <div class="d-flex border border-1 input rounded p-2">
                    <span class="material-symbols-rounded d-flex justify-content-center p-1">lock</span>

                    <input type="password" name="contrasena" placeholder="Password" class="border border-0">
                </div>

            </div>


            <button class="w-100 btn btn-primary" type="submit">Start coding now</button>



            <div class="d-flex flex-column justify-content-center">
                <p class="d-flex justify-content-center gray-text">or continue with these social profile</p>
                <div class="d-flex justify-content-center gap-4">
                    <img src="/assets/Google.svg"></img>
                    <img src="/assets/Facebook.svg"></img>
                    <img src="/assets/Twitter.svg"></img>
                    <img src="/assets/Gihub.svg"></img>
                </div>

            </div>

            <p>
                <i class="fa-solid fa-circle-user"></i>
            </p>

            <p class="d-flex justify-content-center gray-text">Already a member?<a href="/views/login.php">Log In</a></p>

        </form>




    </section>


    <?php
    session_start();
    if (isset($_SESSION["duplicado"])) {
        echo $_SESSION["duplicado"] . "<br>";
        unset($_SESSION["duplicado"]);
    }

    ?>



</body>

</html>