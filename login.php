<?php
        require '__dbconnect.php';
        require '__navbar.php';
        
        if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['login']) and !empty($_POST["pass"]))
        {
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $sql = "SELECT * FROM `Users` WHERE `Email` = '$email' ";
            unset($_POST);
            $result = mysqli_query($conn,$sql);
            if(!$result){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> You should check in on some of those fields below.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else{
              $row=mysqli_fetch_assoc($result);
              $pass2 = $row['Password'];
             
                if($pass == $pass2){
                  echo '<div class="container alert alert-success alert-dismissible fade show text-center" role="alert">
                  <strong>Success ! </strong> Login Successful.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
                else{
                  echo "Wrong password";
                }
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

  <!-- login-form -->
  <section class="h-100 gradient-form">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100 ">
        <div class="col-xl-9">
          <div class="card text-light form-decor">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-5 l-rad">
                  <form action="/Bookstore/login.php" method="POST">
                    <div class="form-outline my-4">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email address" />
                    </div>
                    <div class="form-outline mb-4">
                      <input type="password" id="pass" name="pass" placeholder="Password" class="form-control" />
                    </div>
                    <div class=" pt-2 mb-2 pb-2 d-flex justify-content-center">
                      <button class="btn btn-light fa-lg mb-3 pb-2 pt-2" name="login" id="login" type="submit">Login</button>
                    </div>
                    <div class="d-flex align-items-left">
                      <a class=" fs-6 text-dark" href="#!">
                        <i class="bi bi-phone"></i> Login with OTP
                      </a>
                    </div>
                    <div class="d-flex align-items-left">
                      <a class=" fs-6 text-dark" href="#!">
                        <i class="bi bi-info"></i> Forgot Password?
                      </a>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center text-center mt-3 pb-4 top-line">
                      <p class="text-light fs-6 mx-2"> Sign In With </p>
                      <a href="#!" class="text-danger"><i class="fa fa-google fs-3 mx-2"></i></a>
                      <a href="#!" class="text-primary"><i class="fa fa-linkedin fs-3 mx-2 px-2"></i></a>
                      <a href="#!" class="text-dark"><i class="fa fa-github fs-3 mx-2"></i></a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2 r-rad">
                <div class="mx-auto text-center align-items-center justify-content-center pb-4">
                  <p class="mb-0 me-2 d-block text-center over-img">Don't have an acoount</p>
                  <a href="/Bookstore/signup.php" class="btn btn-light">Signup</a>
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