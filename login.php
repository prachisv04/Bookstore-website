<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <link rel="shortcut icon" href="Images/logo.svg" type="image/x-icon">

    <link rel="stylesheet" href="CSS/style.css">
</head>

<body class="loginpage">
    <?php
            include("__navbar.php");
        ?>

    <div class=" d-flex align-items-center justify-content-center loginFormCard">
        <div class="my-5 ">
            <div class="card my-5 mx-5 bg-transparent text-light text-center">
                <div class="card-title py-2">
                        Login
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <form class="text-light" action="/Bookstore/login.php" method="POST">
                        <div class="mb-3">

                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email Address">

                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                        </div>
                        <div class="mb-1">
                            <button type="submit" id="login" name="login" class="login btn">Login</button>
                        </div>
                        
                        <a href="/Bookstore/signup.php" >Dont have an account? signup </a>
                    </form>
                </div>
                <div class="card-footer">
                    <ul class="social">
                        <button class="btn btn-danger mb-1">
                            <i class="bi bi-google text-light block"> </i>continue With Google
                        </button>
                        <button class="btn btn-primary mb-1">
                            <i class="bi bi-linkedin text-light block"> </i>continue With Linkedin
                        </button>
                        <button class="btn btn-dark mb-1">
                            <i class="bi bi-github text-light block"> </i>continue With Github
                        </button>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>