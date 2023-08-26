<?php
        require '__dbconnect.php';
        require '__navbar.php';
        
        $success=false;

        if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['signup']) and !empty($_POST["pass"]))
        {
            // var_dump($_POST);
            $name = $_POST["uname"];
            $email = $_POST["semail"];
            $num = $_POST["mobile"];
            $pass = $_POST["spass"];
            // echo $name;
            $sql = "INSERT INTO `users` (`Name`, `Email`, `MobileNum`, `Password`) VALUES ('$name', '$email', '$num', '$pass')";
            // echo $sql;
            unset($_POST);
            $result = mysqli_query($conn,$sql);
            if(!$result){
                echo '<div class="alert alert-danger alert-dismissible fade show "  role="alert">
                                        <strong>Error!</strong> You should check in on some of those fields below.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else{
                $success=true;
            }
         }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <title>Sahitya | Login</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Montserrat:wght@500&family=Mukta&family=Playfair+Display:ital@0;1&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--  style sheets -->
    <link rel="stylesheet" href="CSS/style.css">

</head>

<body class="bg">
    <!-- Signup-form -->

    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 ">
                <div class="col-xl-9">
                    <div class="card text-light">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2 l-rad">
                                <div class="mx-auto text-center align-items-center justify-content-center pb-4">
                                    <p class="mb-0 me-2 d-block text-center">Already a member?</p>
                                    <a href="/Bookstore/login.php" class="btn btn-light">Login</a>
                                </div>
                            </div>
                            <div class="col-lg-6 form-decor r-rad">
                                <div class="card-body p-md-5 mx-md-4 ">

                                    <form action="/Bookstore/signup.php" method="POST">
                                        <?php
                                        if($success){
                                                echo ' <div class="alert alert-success alert-dismissible fade show " id="sucess" role="alert">
                                                <strong>Success! </strong> Login Successful.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                        }
                                        ?>
                                        <div class=" mb-4">
                                            <input type="text" id="uname" name="uname" class="form-control"
                                                placeholder="Name" required>
                                        </div>
                                        <div class=" mb-4">
                                            <input type="email" id="semail" name="semail" class="form-control"
                                                placeholder="Email address" required>
                                        </div>
                                        <div class=" mb-4">
                                            <input type="tel" id="mobile" name="mobile" class="form-control"
                                                placeholder="Mobile Number">
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" id="spass" name="spass" class="form-control"
                                                placeholder="Password" required>
                                        </div>
                                        <div class=" mb-4">
                                            <input type="password" id="passC" name="passC" class="form-control"
                                                placeholder="Confirm Password" required>
                                        </div>
                                        <div class=" pt-1 mb-3 pb-1 d-flex justify-content-center">
                                            <button class="btn btn-light py-3 fa-lg mb-2" id="signup" name="signup"
                                                type="submit">Signup</button>
                                        </div>
                                        <div class="d-flex justify-content-center text-center mt-3 pb-4 top-line">
                                            <p class="text-light fs-6 mx-2"> Continue With </p>
                                            <a href="#!" class="text-danger"><i class="fa fa-google fs-3 mx-2"></i></a>
                                            <a href="#!" class="text-primary "><i
                                                    class="fa fa-linkedin fs-3 mx-2 px-2"></i></a>
                                            <a href="#!" class="text-dark"><i class="fa fa-github fs-3 mx-2"></i></a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- javascript -->
        <script src="JS/login.js"></script>
</body>

</html>