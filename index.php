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
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Montserrat:wght@500&family=Mukta&family=Playfair+Display:ital@0;1&display=swap"
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
                <div class="leftmenu">
                    <ul>
                        <li class="nav-item dropdown menu-item" id="lmenu">

                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-list fs-3 mx-1"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item mx-2" href="/Bookstore/index.php"><i class="bi bi-house mx-2 "></i> Home</a>
                                </li>
                                <li><a class="dropdown-item mx-2" href="/Bookstore/shop.php"><i class="bi bi-shop-window mx-2"></i>
                                        Shop</a></li>
                                <li><a class="dropdown-item mx-2" href="#"><i class="bi bi-file-earmark-post mx-2"></i>
                                        Blogs</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="leftnav">
                    <ul class="navbar-nav mb-2 mb-lg-0 d-flex flex-row">
                        <li class="nav-item mx-3">
                            <a class="nav-link active" aria-current="page" href="/Bookstore/index.php">Home</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="/Bookstore/shop.php">Shop</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#">Blogs</a>
                        </li>
                    </ul>

                </div>
                <!-- brand in middle -->
                <div class="d-flex nav-brand nav-item align-items-center ">
                    <a class="nav-link text-center"> <img src="img/logo.png" alt="LOGO" class="logo"> </a>
                </div>

                <!-- right navbar -->
                <div class="rightmenu">
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

                        <li class="nav-item " >
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

    <div class="container mt-3 mb-5 w-75 rectangle">
        <div class="  transbox text-center">

            <div class="row  text-center d-flex justify-content-center align-items-center">
                <div class="col">
                    <h1>Discover the World </h1>
                    <h1>of Words.</h1>

                    <h6 class="mt-3">
                        Journey Through Pages of Adventure , knowledge ,
                    </h6>
                    <h6>
                        and Inspiration. Find Your Next favourite Book Here.
                    </h6>

                    <button class="btn btn-light mt-3 mb-3">Shop Now</button>

                </div>
                <div class="col">

                    <div class="col">
                        <h3 class="mt-3 mb-3">Best Sellers</h3>
                    </div>
                    <div class="col ">
                        <div id="carouselExample"
                            class="carousel slide d-flex align-items-center justify-content-center mb-2 ml-4">

                            <div class="carousel-inner w-50">
                                <div class="carousel-item active">
                                    <img src="img/last-hope.jpg" class="vert-img d-block w-75" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/million.jpg" class="vert-img d-block w-75" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/vav.jpg" class="vert-img d-block w-75" alt="...">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 mx-5 d-flex align-items-center justify-content-around  ">
                        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="bi bi-arrow-left fs-3 text-dark" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="bi bi-arrow-right fs-3 text-light" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button> -->
                        <button class="btn">
                            <i class="bi bi-arrow-left fs-3 text-light"></i>
                        </button>
                        <button class="btn">
                            <i class="bi bi-arrow-right fs-3 text-light"></i>
                        </button>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <!-- container -->
    <!-- for services -->

    <div class="container mb-5">
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

    <!-- tabs -->
    <!-- will do later -->
    <div class="container container-fluid tabs mb-5">
        <ul class="nav nav-pills">
            <li class="nav-item active w-50 text-nowrap text-end mr-1"><a class="nav-link fs-3 font-weight-bold" href="#trend" data-toggle="tab">Trending Now</a></li>
            <li class="nav-item w-50 text-nowrap" ><a class="nav-link fs-3 font-weight-bold" href="#release" data-toggle="tab">New Releases</a></li>
        </ul>
        
        <div id='content' class="tab-content">
            <div class="tab-pane active" id="trend">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet aspernatur, tempora praesentium in illum ullam eum reprehenderit. Quod ducimus animi nam earum cum omnis praesentium libero quo fuga tenetur aliquid, repellat necessitatibus nostrum ipsa.
            </div>
            <div class="tab-pane" id="release">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa officiis in odit animi! Numquam dicta quidem vel, obcaecati nulla quam tenetur. Laborum ea saepe nisi at alias exercitationem corrupti fugit, numquam illo reprehenderit architecto.
            </div>
           
        </div>
    </div>
    
    <!-- categories -->

    <div class="container container-fluid tabs mb-5 text-center">
        <h3>Categories</h3>
        <ul class="nav nav-pills d-flex align-items-center justify-content-center">
            <li class="nav-item active text-nowrap"><a class="nav-link fs-4" href="" data-toggle="tab">All</a></li>
            <li class="nav-item text-nowrap " ><a class="nav-link fs-4" href="" data-toggle="tab">Fantasy</a></li>
            <li class="nav-item text-nowrap " ><a class="nav-link fs-4" href="" data-toggle="tab">Romance</a></li>
            <li class="nav-item text-nowrap " ><a class="nav-link fs-4" href="" data-toggle="tab">History</a></li>
            <li class="nav-item text-nowrap " ><a class="nav-link fs-4" href="" data-toggle="tab">Psychology</a></li>
            <li class="nav-item text-nowrap " ><a class="nav-link fs-4" href="" data-toggle="tab">Kids</a></li>
            <li class="nav-item text-nowrap " ><a class="nav-link fs-4" href="" data-toggle="tab">Art</a></li>
        </ul>
        
        <div id='content' class="tab-content">
            <div class="tab-pane active" id="trend">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet aspernatur, tempora praesentium in illum ullam eum reprehenderit. Quod ducimus animi nam earum cum omnis praesentium libero quo fuga tenetur aliquid, repellat necessitatibus nostrum ipsa.
            </div>
            <div class="tab-pane" id="release">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa officiis in odit animi! Numquam dicta quidem vel, obcaecati nulla quam tenetur. Laborum ea saepe nisi at alias exercitationem corrupti fugit, numquam illo reprehenderit architecto.
            </div>
           
        </div>
    </div>

    <div class="container text-center mb-5 mt-1">
            <h3 class="font-weight-bold fs-2"> Special Offers </h3>
            <div class=" w-75 m-auto offer">
            </div>
    </div>

    <div class="container text-center mb-1 mt-5" id="about">
            <h3 class="font-weight-bold fs-2 mb-3"> About Us </h3>
            <div class="row">
                <div class="col-4 about-img m-auto mb-2 px-5">
                <img src="img/bookstore.jpg" alt="" srcset="">
                </div>
                <div class="col-7 text-center m-auto mb-3" >
                    <div class="fs-1 font-weight-bold ">
                       " Welcome to Bookstore  - 
                        Where Books Comes to Life ."
                    </div>
                    <div class="fs-5 font-weight-bold text-dbrown mt-5 mb-3">
                            At Bookstore , we are dedicated to the enchanting world of books and the incredible impact they have on hour lives. With a passion for literature and a commitment to providing an exceptional reading experience , we've created a virtual heaven for <strong>Book Lovers</strong> like you .
                    </div>
                    <div>
                        <button class="btn btn-darkb mb-5 mt-5">Learn More</button>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
            <div class="col-7 text-center m-auto mb-3" >
                    <div class="fs-1 font-weight-bold ">
                       " Unlock the power of Imagination at Bookstore  - 
                        Your Gateway to Extraordinary World ."
                    </div>
                    <div class="fs-5 font-weight-bold text-dbrown mt-5 mb-5">
                            Immerse Yourself in our meticulously curate collection, spanning across genres, from timeless classics to the latest bestsellers. Dive into enthralling mysteries , thought-provoking  non fiction , and captivating tales that await within our virtual shelves. With Bookstore , finding your next great read has never been easier.
                    </div>
                 
                </div>
                <div class="col-4 about-img mb-5 px-5">
                    <img src="img/bookstall.jpg" alt="" srcset="">
                </div>
                
            </div>
    </div>
    

    <?php
        require '__footer.html';
    ?>
    <!-- javascript -->
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- site-custom -->
    <script src="JS/customs.js"></script>

</body>

</html>