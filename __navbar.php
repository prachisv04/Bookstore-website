<?php
session_start();
    require '__dbconnect.php';
    error_reporting (E_ALL ^ E_NOTICE);
    $isloggedin = false;
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $isloggedin = true;    
    }
    
    class CartProduct{
       private $bookid;
       private $count;

        function set_id($bid){
            $this->bookid = $bid;
        }

        function get_id(){
            return $this->bookid;
        }

        function set_count($c){
            $this->count = $c;
        }

        function get_count(){
            return $this->count;
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <!-- <title>Sahitya | Login</title>-->
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
    <link rel="stylesheet" href="CSS/custom.css">
</head>

<body>
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
                                <li><a class="dropdown-item mx-2" href="/Bookstore/index.php"><i
                                            class="bi bi-house mx-2 "></i> Home</a>
                                </li>
                                <li><a class="dropdown-item mx-2" href="/Bookstore/shop.php"><i
                                            class="bi bi-shop-window mx-2"></i>
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
                            <a class="nav-link" id="home" aria-current="page" href="/Bookstore/index.php">Home</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" id="shop" href="/Bookstore/shop.php">Shop</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" id="blog" href="#">Blogs</a>
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
                        <li class="nav-item menu-item laptopsearch">
                            <div class="input-group">
                                <div class="form-outline">
                                    <input id="search-inputmenu" type="search" id="form1" class="form-control" />
                                  
                                </div>
                                <button id="search-button" type="button" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </li>
                        <li class="nav-item dropdown menu-item  dropleft" id="menu">

                            <a class="nav-link dropdown-toggle  " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-three-dots-vertical  fs-3 mx-2"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="profile.php"> <i class="bi bi-person-fill mx-1"></i> My
                                        Profile</a>
                                </li>
                                <li><a class="dropdown-item" href="wishlist.php"><i class="bi bi-heart-fill mx-1 text-danger"></i>
                                        Wishlist</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart"><i class="bi bi-cart mx-1 "></i>
                                        cart</a></li>

                                <li>
                                    <hr class="dropdown-divider mt-2">
                                </li>
                                <li><a class="dropdown-item" href="/Bookstore/logout.php"><i
                                            class="bi bi-box-arrow-right"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--  -->

                <div id="rightnav" class="rightnavmenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">

                        <li class="nav-item laptopsearch">
                            <div class="input-group ">
                                <div class="form-outline">
                                  <input id="search-inputnav" type="search" id="form1" class="form-control bg-transparent" placeholder="Search" />
                                  
                                </div>
                                <button id="search-button" type="button" class="btn btn-dbrown ">
                                  <i class="bi bi-search fa-lg"></i>
                                </button>
                              </div>
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
                            <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
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
                                <li><a class="dropdown-item" href="profile.php"> <i class="bi bi-person-fill mx-1"></i> My
                                        Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-bag-heart-fill mx-1"></i>
                                        Orders</a></li>
                                <li><a class="dropdown-item" href="http://localhost/Bookstore/index.php#about"><i class="bi bi-info-circle-fill mx-1"></i> About
                                        us</a></li>
                                <li><a class="dropdown-item" href="http://localhost/Bookstore/index.php#footer"><i class="bi bi-telephone-fill mx-1"></i> Contact
                                        Us</a></li>

                                <li>
                                    <hr class="dropdown-divider mt-2">
                                </li>
                                <li><a class="dropdown-item" href="/Bookstore/logout.php"><i
                                            class="bi bi-box-arrow-right"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            }
                            else{
                                ?>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
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
        <div class="input-group mb-1 m-auto mobilesearch">
            <input type="search" class="form-control py-2" placeholder="Search" aria-label="Search"
                aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text h-100 fs-5 btn btn-dbrown py-2" id="basic-addon2">Search</span>
            </div>
        </div>
    </div>

    <!-- <button class="btn btn-primary" type="button" >Toggle right offcanvas</button> -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasCartLabel">Your Bag</h5>
    <div class="d-flex justify-content-right">
        <a href="#" class="text-danger px-2">Clear Cart</a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
  </div>
  <div class="offcanvas-body">
    <div class="container h-100 w-100 border cartContainer" id="cartContainer">

    <div class="d-flex flex-column">
        <?php
                if($isloggedin){
                    // to fetch from database
                    
                }
                else{
                    //fetch from cart session variable 
                    // temp adding data to cart For testing.
                    $myCart = ['B1','B7'];  
                    $cartDetails = [];
                    // $_SESSION['TempCart'] = $myCart;
                    
                        $itemstr = implode("','",$myCart);
                     //   echo $itemstr;
                        $sql = "select book.book_id , book.Title , book_pictures.CoverPage ,Author.Author_name, Price_details.Price , Price_details.Quantity from book inner join book_pictures on book.book_id = book_pictures.book_id inner join Price_details on book.book_id = price_details.book_id inner join author on author.Author_id = book.Author_id where book.book_id IN ('".$itemstr."')";
                      //  echo $sql;
                      
                        $items = mysqli_query($conn,$sql);
                        while($item = mysqli_fetch_assoc($items)){
                            $prod = new CartProduct();
                            $prod->set_id($item['book_id']);
                            $prod->set_count(1);
                            array_push($cartDetails,$prod);
                            echo "
                            <div class='row w-100 mt-1 '>
                            <div class='col-3 h-25'>
                            
                            <img src='data:image/jpeg;charset=utf8;base64,".base64_encode($item['CoverPage'])."' width='70px' height='100px'/>
                                </div>
                                <div class='col-5 h-25'>
                                    <h6>".$item['Title']."</h6>
                                    <p>-".$item['Author_name']."</p>
                                </div>
                                <div class='col-4 h-25'>
                                <h5>&#x20B9;".$item['Price']."</h5>
                                    <div class='input-group counter'>
                                    <button class='btn btn-dark minus w-25 ' type='button'><i class='bi bi-dash text-light'>  </i>  </button>
                                    <input type='text' name='bookcount' class='form-control count text-center bg-light' value='".$prod->get_count()."' aria-label='Example text with two button addons'>
                                   
                                    <button class='btn btn-dark plus w-25' type='button'><i class='bi bi-plus text-light'>  </i></button>
                                    
                                    </div>
                                   
                                </div>
                            </div>
                            ";
                            
                        }
                        
                    }

                $_SESSION['cart'] = $cartDetails;
            ?>
            
        </div>
        
    </div>
  </div>
  <div class="offcanvas-footer sticky-bottom d-flex flex-column justify-content-center align-items-center">
        <a class="btn btn-outline-dark w-75 my-2" id="opencart" href="cart.php" >
            View Cart
        </a>
        <button class="btn  w-75 my-2 mb-4" id="checkoutbtn">
            Quick Checkout
        </button>
  </div>
</div>


    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>

    <script>
        let increase = document.getElementsByClassName("plus");
        let count = document.getElementsByClassName("count");
        let decrease = document.getElementsByClassName("minus");
        for(let $itr = 0;$itr < increase.length;$itr++){
            increase[$itr].addEventListener("click",()=>{
                
              val = count[$itr].value;
              count[$itr].value = ++val;
              
           

            });
        }

        for(let $itr = 0;$itr < decrease.length;$itr++){
            decrease[$itr].addEventListener("click",()=>{
                val = count[$itr].value;
                count[$itr].value = --val;

              

            });
        }

    </script>

</body>

</html>