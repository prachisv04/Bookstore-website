<?php
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
    $isloggedin = false;
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $isloggedin = true;
    }
   

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <title>Sahitya | Home</title>
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

    <!-- navbar -->
    <div class="container" id="navbar_top">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid ">


                <!-- left subnav -->
                
                

                <!-- testing leftnavbar to work as navbar -->
                
                <div class="leftmenu ">
                    <ul class="d-flex flex-row">
                        
                        <li class="nav-item dropdown menu-item" id="lmenu">

                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-three-dots-vertical  fs-3 mx-1"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item mx-2" href="#"><i class="bi bi-house mx-2"></i> Home</a></li>
                                <li><a class="dropdown-item mx-2" href="#"><i class="bi bi-shop-window mx-2"></i> Shop</a></li>
                                <li><a class="dropdown-item mx-2" href="#"><i class="bi bi-file-earmark-post mx-2"></i> Blogs</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="leftnav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row">
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
                <div class="d-flex nav-brand nav-item align-items-center justify-content-center">
                    <a class="nav-link text-center"> <img src="img/logo.png" alt="LOGO" class="logo"> </a>
                </div>

                <!-- right navbar -->
                <div class="rightmenu mr-2">
                    <ul class="d-flex flex-row">
                        <li class="nav-item menu-item ">
                            <a class="nav-link" aria-current="page" href="#">
                                <i class="bi bi-search fs-3 mx-2"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown menu-item  dropleft" id="menu">

                            <a class="nav-link dropdown-toggle  " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-three-dots-vertical  fs-3 mx-2"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person-fill mx-1"></i> My
                                        Profile</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-heart-fill mx-1 text-danger"></i>
                                        Wishlist</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-cart mx-1 "></i>
                                        cart</a></li>

                                <li>
                                    <hr class="dropdown-divider mt-2">
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--  -->

                <div id="rightnav" class="rightnavmenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">

                        <li class="nav-item ">
                            <a class="nav-link" aria-current="page" href="#">
                                <i class="bi bi-search fs-3 mx-3"></i>
                            </a>
                        </li>
                        <?php
                            if($isloggedin){
                                ?>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bookmark fs-3 mx-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-cart fs-3 mx-3"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person-circle fs-3 mx-3"></i>
                            </a>
                            <ul class="dropdown-menu ">

                                <li>
                                    <a class="dropdown-item text-primary fs-5 lh-1" href="#">
                                        <?php echo $_SESSION['user'] ?>
                                    </a>
                                    <a class="dropdown-item text-dark lh-1" href="#">
                                        <?php echo $_SESSION['usermail'] ?>
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider mb-2">
                                </li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person-fill mx-1"></i> My
                                        Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-bag-heart-fill mx-1"></i>
                                        Orders</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle-fill mx-1"></i> About
                                        us</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-telephone-fill mx-1"></i> Contact
                                        Us</a></li>

                                <li>
                                    <hr class="dropdown-divider mt-2">
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            }
                            else{
                                ?>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-cart fs-3 mx-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Bookstore/login.php">
                                <i class="bi bi-person-check fs-2 mx-3"></i>
                            </a>
                        </li>
                        <?php        
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- center container -->

    <!-- container -->

    <!-- for services -->

    <div class="container">

        <div class="row d-flex align-items-center justify-content-between mx-5">
            <div class="col hor-rect mx-1">
                <div class="card bg-transparent text-light text-center">
                    <div class="card-title mt-2 mx-2">
                        <i class="bi bi-telephone-inbound"></i> Customer Support:
                    </div>
                    <div class="card-body text-start">
                        live chat , email or ticketing system to provide customer support and address issues properly.
                    </div>
                </div>
            </div>
            <div class="col hor-rect mx-1">
                <div class="card bg-transparent text-light text-center">
                    <div class="card-title mt-2 mx-2">
                        <i class="bi bi-telephone-inbound"></i> Customer Support:
                    </div>
                    <div class="card-body text-start">
                        live chat , email or ticketing system to provide customer support and address issues properly.
                    </div>
                </div>
            </div>
            <div class="col hor-rect mx-1">
                <div class="card bg-transparent text-light text-center">
                    <div class="card-title mt-2 mx-2">
                        <i class="bi bi-telephone-inbound"></i> Customer Support:
                    </div>
                    <div class="card-body text-start">
                        live chat , email or ticketing system to provide customer support and address issues properly.
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- service container -->

    <div class="text-dark" id="shop">
        shop here
    </div>


    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            window.addEventListener('scroll', function () {
                if (window.scrollY > 50) {
                    document.getElementById('navbar_top').classList.add('fixed-top');
                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector('.navbar').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                    document.getElementById('navbar_top').style.backgroundColor = "white";

                } else {
                    document.getElementById('navbar_top').classList.remove('fixed-top');
                    document.getElementById('navbar_top').style.background = "transparent";
                    // remove padding top from body
                    document.body.style.paddingTop = '0';

                }
            });
        });


    </script>

</body>

</html>