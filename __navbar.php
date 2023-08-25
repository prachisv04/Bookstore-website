<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bookstore</title>
  <link rel="shortcut icon" href="Images/logo.svg" type="image/x-icon">
  <!-- CSS -->
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- edits CSS -->
  <link rel="stylesheet" href="CSS/style.css">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Montserrat:wght@500&family=Mukta&family=Playfair+Display&display=swap"
    rel="stylesheet">
</head>

<body class="bg-img">

  <!-- Navbar -->

  <div class="container">

    <nav class="navbar navbar-expand-lg sticky-top d-flex justify-content-between ">

      <div class="navbar-nav  col-4 align-items-start ">
        <div class="container-fluid">

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-3">
                <a class="nav-link active" aria-current="page" href="/Bookstore/">Home</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link text-brown" href="#">Shop</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link text-brown" aria-current="page" href="#">Blogs</a>
              </li>
            </ul>

          </div>
        </div>
      </div>

      <div class="col-4  d-flex justify-content-center">
        <a class="navbar-brand" href="#">
          <img src="Images/logo.png" width="150" height="60">
        </a>
      </div>

      <button class=" navbar-toggler ml-auto  align-items-end " type="button" data-toggle="collapse"
        data-target="#icons" aria-controls="navbarNavDropdown" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse  col-5" class="icons">
        <div class="navbar-nav ml-auto ">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item mx-3">
              <a class="nav-link text-brown" aria-current="page" href="/Bookstore/"><i class="bi bi-search fs-4"></i></a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link text-brown" href="/Bookstore/login.php"><i class="bi bi-person fs-3"></i></a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link text-brown" aria-current="page" href="#"><i class="bi bi-bookmark fs-4"></i></a>
            </li>
            <li class="nav-item mx-3">
              <button class="nav-link btn bg-brown" aria-current="page" href="#"><i class="bi bi-cart fs-4 "></i><i
                  class="bi bi-arrow-right-circle-fill fs-4 mx-3"></i></button>
            </li>
          </ul>

        </div>
      </div>

    </nav>

  </div> <!-- container  -->
  <!-- Navbar ends -->

    
  <!-- Javascript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>