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
    <link rel="stylesheet" href="CSS/shop.css">
</head>

<body class="bg">

    <?php
        require '__navbar.php';
    ?>

    <!-- center container -->

    <div class="container mt-3 mb-5 w-75 rectangle">
        <div class=" transbox text-center">

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
                        <i class="bi bi-truck"></i> Shipping Options:
                    </div>
                    <div class="card-body text-start">
                        live chat , email or ticketing system to provide customer support and address issues properly.
                    </div>
                </div>
            </div>
            <div class="col hor-rect mx-1">
                <div class="card bg-transparent text-light text-center">
                    <div class="card-title mt-2 mx-2">
                        <i class="bi bi-pin-map"></i> Order Tracking:
                    </div>
                    <div class="card-body text-start">
                        live chat , email or ticketing system to provide customer support and address issues properly.
                    </div>
                </div>
            </div>
            <div class="col hor-rect mx-1">
                <div class="card bg-transparent text-light text-center">
                    <div class="card-title mt-2 mx-2">
                        <i class="bi bi-telephone"></i> Customer Support:
                    </div>
                    <div class="card-body text-start">
                        live chat , email or ticketing system to provide customer support and address issues properly.
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- tabs -->
    <div class="container container-fluid tabs mb-5">
        <ul class="nav nav-pills">
            <li class="nav-item w-50 text-nowrap text-end mr-1"><a class="nav-link fs-3 active font-weight-bold"
                    data-bs-toggle="tab" data-bs-target="#trend">Trending Now</a></li>
            <li class="nav-item w-50 text-nowrap"><a class="nav-link fs-3 font-weight-bold" data-bs-target="#release"
                    data-bs-toggle="tab">New Releases</a></li>
        </ul>

        <div id='content' class="tab-content">
            <div class="tab-pane active" id="trend">
                <div class="container product-line">
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                        require '__dbconnect.php';

                        $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , languages.Language_name ,pictures.CoverPage from books INNER JOIN authors on books.author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN languages on languages.Language_id = price_detail.Language_id INNER JOIN pictures on pictures.Book_id = books.Book_id ";
                        $books = mysqli_query($conn,$sql);
                        $no=1;
                    
                        while($book=mysqli_fetch_assoc($books)){
                        echo" 
                    <li class='item'>
                      <div class='card'>
                        <div class='card-title d-flex text-dbrown'>
                        <div class='w-75' >
                        <h6 class='text-start text-truncate px-3 fs-5' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='".$book['Title']."' >".$book['Title']."</h6>
                          <h6 class='card-subtitle text-body-secondary text-brown text-end'>- ".$book['Author_name']."</h6>
                        </div>
                        
                        </div>
  
                        <div class='card-body text-nowrap d-flex flex-column ' >
                        
                     
                        <img src='data:image/jpeg;charset=utf8;base64,".base64_encode($book['CoverPage'])."' class='bookcover'/> 
                     
                        <div class='details mb-3 d-flex flex-column'>
                        <input class='border-0 text-left px-3 mt-3 fs-6 ' type='text' readonly value='".$book['Category']."' >
                        <input class='border-0 text-left px-3 fs-6 ' type='text' readonly value='".$book['Language_name']."' >

                        </div>
                        <div class='price-box text-center '>
                          <div class='d-flex justify-content-between'>
                          <h6 class='fs-5'><i class='bi bi-star-fill text-success'></i> 5 | ".$book['PageNums']."</h6>
                            <h5 class='fs-5'>&#x20B9;".$book['Price']."</h5>
                          </div>
                        </div>
                        </div>
                      </div>
                    </li>                 
                    ";
                        }
                    
                        ?>

                        </ul>

                        <div class="paddles">
                            <button class="left-paddle paddle"> <i class="bi bi-arrow-left fs-4"></i>
                            </button>
                            <button class="right-paddle paddle"><i class="bi bi-arrow-right fs-4"></i>

                            </button>
                        </div>

                    </div>

                </div>
            </div>
            <div class="tab-pane" id="release">
                <div class="container product-line">
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                        require '__dbconnect.php';

                        $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , languages.Language_name , pictures.CoverPage from books INNER JOIN authors on books.Author_id = authors.author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN languages on languages.Language_id = price_detail.Language_id INNER JOIN pictures on pictures.Book_id = books.Book_id Where YEAR(books.PublicationDate) = YEAR(NOW()) ";
                        $books = mysqli_query($conn,$sql);
                        $no=1;
                    
                        while($book=mysqli_fetch_assoc($books)){
                        echo" 
                    <li class='item'>
                      <div class='card'>
                        <div class='card-title d-flex text-dbrown'>
                        <div class='w-75' >
                        <h6 class='text-start text-truncate px-3 fs-5' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='".$book['Title']."' >".$book['Title']."</h6>
                          <h6 class='card-subtitle text-body-secondary text-brown text-end'>- ".$book['Author_name']."</h6>
                        </div>
                        
                        </div>
  
                        <div class='card-body text-nowrap d-flex flex-column ' >
                        
                     
                        <img src='data:image/jpeg;charset=utf8;base64,".base64_encode($book['CoverPage'])."' class='bookcover'/> 
                     
                        <div class='details mb-3 d-flex flex-column'>
                        <input class='border-0 text-left px-3 mt-3 fs-6 ' type='text' readonly value='".$book['Category']."' >
                        <input class='border-0 text-left px-3 fs-6 ' type='text' readonly value='".$book['Language_name']."' >

                        </div>
                        <div class='price-box text-center '>
                          <div class='d-flex justify-content-between'>
                          <h6 class='fs-5'><i class='bi bi-star-fill text-success'></i> 5 | ".$book['PageNums']."</h6>
                            <h5 class='fs-5'>&#x20B9;".$book['Price']."</h5>
                          </div>
                        </div>
                        
                        </div>

                      
                      </div>
                    </li>                 
                    ";
              }
              
              ?>

                        </ul>

                        <div class="paddles">
                            <button class="left-paddle paddle"> <i class="bi bi-arrow-left fs-4"></i>
                            </button>
                            <button class="right-paddle paddle"><i class="bi bi-arrow-right fs-4"></i>

                            </button>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="text-center my-3">
            <a href="http://localhost/Bookstore/shop.php" class="btn btn-dbrown">View All -></a>
        </div>
    </div>

    <!-- categories -->
    <?php
        include("__categories.php");
    ?>


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
            <div class="col-7 text-center m-auto mb-3">
                <div class="fs-1 font-weight-bold ">
                    " Welcome to Bookstore -
                    Where Books Comes to Life ."
                </div>
                <div class="fs-5 font-weight-bold text-dbrown mt-5 mb-3">
                    At Bookstore , we are dedicated to the enchanting world of books and the incredible impact they have
                    on hour lives. With a passion for literature and a commitment to providing an exceptional reading
                    experience , we've created a virtual heaven for <strong>Book Lovers</strong> like you .
                </div>
                <div>
                    <button class="btn btn-darkb mb-5 mt-5">Learn More</button>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-7 text-center m-auto mb-3">
                <div class="fs-1 font-weight-bold ">
                    " Unlock the power of Imagination at Bookstore -
                    Your Gateway to Extraordinary World ."
                </div>
                <div class="fs-5 font-weight-bold text-dbrown mt-5 mb-5">
                    Immerse Yourself in our meticulously curate collection, spanning across genres, from timeless
                    classics to the latest bestsellers. Dive into enthralling mysteries , thought-provoking non fiction
                    , and captivating tales that await within our virtual shelves. With Bookstore , finding your next
                    great read has never been easier.
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>

    <!-- site-custom -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="JS/customs.js"></script>
    <script>
        document.getElementById("home").classList.add("active");


    </script>
</body>

</html>