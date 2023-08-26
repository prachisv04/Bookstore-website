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

<body>

    <!-- container for Navbar  -->

    <div class="container">
        <nav class="navbar sticky-top navbar-expand-lg ">
            <div class="container-fluid">
                
                <!-- left subnav -->
                <button class="navbar-toggler" type="btn btn-secondary" data-bs-toggle="collapse"
                    data-bs-target="#leftnav" aria-controls="leftnav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="leftnav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-3">
                            <a class="nav-link active" aria-current="page" href="/Bookstore/index.php">Home</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#">Shop</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#">Blogs</a>
                        </li>
                    </ul>

                </div>

                <!-- brand in middle -->
                <div class="container d-flex align-items-center justify-content-center">
                    <div> <img src="img/logo.png" alt="LOGO" class="logo" > </div>
                </div>

                <!-- right navbar -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#rightnav" aria-controls="rightnav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="rightnav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                            <i class="bi bi-search fs-3 mx-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/Bookstore/login.php">
                            <i class="bi bi-person-fill fs-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="bi bi-bookmark fs-3 mx-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-brown" href="#">
                            <i class="bi bi-cart fs-3 mx-3"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>


    <!-- javascript -->
    <script src="JS/login.js"></script>
</body>

</html>