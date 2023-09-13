<?php
        require '__dbconnect.php';
        
        
        $success=false;
        
        if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['signup']) and !empty($_POST["spass"]))
        {
            // var_dump($_POST);
           
            $name = $_POST["uname"];
            $email = $_POST["semail"];
            $num = $_POST["mobile"];
            $pass = $_POST["spass"];
            $sql = "INSERT INTO `customers` (`User_Name`, `Email`, `MobileNum`, `Password`) VALUES ('$name', '$email', '$num','". password_hash( $pass , PASSWORD_DEFAULT)."')";
            
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
              
                header('Refresh:1; url=http://localhost/Bookstore/login.php');
                
                exit;
            }
         }
         require '__navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <title>Sahitya | Signup</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
                                <div class="card-title mx-1 mt-2 ">
                                    <button type="button" class="btn btn-outline-dark bi bi-arrow-left" id="back2"
                                        aria-label="Close">
                                        Back
                                    </button>
                                </div>
                                <div class="card-body p-md-4 mx-md-4 ">

                                    <form action="/Bookstore/signup.php" onsubmit="return validateSignupForm(this)"
                                        method="POST" autocomplete="off">

                                        <div class="form-outline mb-4">
                                            <p id="formwarn"> </p>
                                        </div>
                                        <div class=" mb-4">
                                            <input type="text" id="uname" name="uname" onkeyup="validateUsername(this)"
                                                class="form-control" placeholder="Name">
                                        </div>
                                        <div class=" mb-4">
                                            <input type="email" id="semail" name="semail" onkeyup="validateEmail(this)"
                                                class="form-control" placeholder="Email address">
                                        </div>
                                        <div class=" mb-4">
                                            <input type="tel" id="mobile" name="mobile"
                                                onkeyup="validateMobileNum(this)" class="form-control"
                                                placeholder="Mobile Number">
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" id="spass" name="spass"
                                                onkeyup="validatePassword(this)" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <div class=" mb-4">
                                            <input type="password" id="passC" name="passC" onkeyup="samePassword(this)"
                                                class="form-control" placeholder="Confirm Password">
                                        </div>

                                        <div class=" pt-1 mb-3 pb-1  d-flex justify-content-center">
                                            <button class="btn bg-bdark py-3 fa-lg mb-2" id="signup" name="signup"
                                                type="submit">Signup</button>
                                        </div>
                                        <div class="d-flex justify-content-center text-center mt-3 pb-4 top-line">
                                            <p class="text-dark fs-6 mx-2"> Continue With </p>
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
            crossorigin="anonymous"></script>
        <script src="JS/signup.js"></script>
</body>

</html>