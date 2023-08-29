<?php
    
    require '__dbconnect.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login']) and !empty($_POST["pass"]))
    { 
      $email = $_POST["email"];
      $pass = $_POST["pass"];
      $sql = "SELECT * FROM `Users` WHERE `Email` = '$email'";
      $result = mysqli_query($conn, $sql);
      if ($result)
      {
          $row = mysqli_fetch_assoc($result);
          if (password_verify($pass, $row['Password'])) {
            $success = true;
            session_start();
            $_SESSION['user'] = $row['Name'];
            $_SESSION['usermail'] = $email;

            header("location: http://localhost/Bookstore/index.php");
            exit;
          }
          else {
              ?>
<script>
  document.getElementById("warn").innerHTML = "<div class='alert alert-danger alert-dismissible fade show '  role='alert'><strong> <i class='bi bi-exclamation-triangle-fill'></i> Error!</strong> Try again.. <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
  document.getElementById("warn").style.color = "red";
</script>
<?php
          }
      }
      else{
        ?>
<script>
  document.getElementById("warn").innerHTML = "<div class='alert alert-danger alert-dismissible fade show '  role='alert'><strong> <i class='bi bi-exclamation-triangle-fill'></i> Error!</strong> Invalid Username or Password. <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
  document.getElementById("warn").style.color = "red";
</script>
<?php
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
          <div class="card text-dark form-decor">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-5 l-rad">
                  <form action="/Bookstore/login.php" onsubmit="return validateLoginForm(this)" method="POST"
                    autocomplete="off">
                    <p id="warn"></p>
                    <div class="form-outline my-4">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email address" />
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="pass" name="pass" placeholder="Password" class="form-control" />
                    </div>

                    <div class="form-outline mb-4">
                      <p id="warn"> </p>
                    </div>

                    <div class=" pt-1 mb-3 pb-1  d-flex justify-content-center">
                      <button class="btn bg-bdark py-3 fa-lg mb-2" id="login" name="login" type="submit">Login</button>
                    </div>
                    <div class="d-flex align-items-left">
                      <a class=" fs-6 text-dark" href="#!">
                        <i class="bi bi-phone"></i> Login with OTP
                      </a>
                    </div>
                    <div class="d-flex align-items-left">
                      <a class=" fs-6 text-primary" href="#!">
                        <i class="bi bi-info"></i> Forgot Password?
                      </a>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center text-center mt-3 pb-4 top-line">
                      <p class="text-dark fs-6 mx-2"> Sign In With </p>
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
    <script>
      document.getElementById("email").addEventListener("keyup", () => {
        let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (!email.value.match(validRegex)) {
          email.placeholder = "Please Enter valid Email";
          email.style.borderBottom = "2px solid rgb(234, 75, 75)";
          isfalse = true;
        }
        if (email.value.match(validRegex)) {
          email.style.borderBottom = "2px solid green";
        }
      });

      document.getElementById("pass").addEventListener("keyup", () => {
        let pass = new String(document.getElementById("pass").value);
        if (pass.length < 8 || pass.length > 13) {
          passerr = true;
          document.getElementById("pass").style.borderBottom = "2px solid rgb(234, 75, 75)";
        }
        if (pass.length >= 8 && pass.length <= 13) {
          passerr = false;
          document.getElementById("pass").style.borderBottom = "2px solid green";
        }
        });
      
      function validateLoginForm(form) {

        // console.log(form);
        let isfalse = false;
        let email = document.getElementById("email");
        let pass = document.getElementById("pass");
        if (email.value == "") {
          email.placeholder = "please enter Email";
          email.style.borderBottom = "2px solid rgb(234, 75, 75)";
          isfalse = true;
        }

        if (pass.value == "") {
          document.getElementById("pass").placeholder = " please enter Password";
          document.getElementById("pass").style.borderBottom = "2px solid rgb(234, 75, 75)";
          isfalse = true;
        }
        if (isfalse)
          return false;
        return true;
      }

    </script>
</body>

</html>