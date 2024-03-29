<?php
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
    require '__dbconnect.php';
    $isloggedin = false;
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $isloggedin = true;
    }
    
    if(!isset($_SESSION['cartProducts'])){
      $_SESSION['cartProducts'] = array();
    }
  
    // get categories as array
    $category = array();
    $sql = "SELECT DISTINCT Category FROM books ";
    $categories = mysqli_query($conn,$sql);

    while($cat=mysqli_fetch_assoc($categories)){
      array_push($category,$cat['Category']);
    }    
  
   // get languages as array
   $languages = array();
   $sql = "SELECT Language_name FROM languages ";
   $language = mysqli_query($conn,$sql);

   while($lang=mysqli_fetch_assoc($language)){
     array_push($languages,$lang['Language_name']);
  }   
   
    //get authors as array
    $authors_name = array();
    $authors_id = array();
    $sql = "SELECT Author_id ,Author_name FROM authors";
    $writers = mysqli_query($conn,$sql);
    while($author=mysqli_fetch_assoc($writers)){
      array_push($authors_name,$author['Author_name']);
      array_push($authors_id,$author['Author_id']);
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- title -->
  <title>Sahitya | Shop</title>
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!-- JQuery -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

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
  <link rel="stylesheet" href="CSS/shop.css">
  <link rel="stylesheet" href="CSS/style.css">

  <link rel="stylesheet" href="CSS/custom.css">
</head>

<body class="bg">

  <!-- navbar -->
  <div id="shopnavbar">
  <?php
         require '__navbar.php';
    ?>
</div>

  <!-- Modal to open when person tries to wishlist item before login. -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Wishlist Says...</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>To add Item Please Login </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <a type="button" href="http://localhost/Bookstore/login.php" class="btn btn-outline-danger">Login</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row  text-center d-flex justify-content-around">
      <div class="col-md-4 col-lg-3 col-xl-3 filters">
        <select class="form-select" aria-label="Default select example" id="sortMethod">
          <option selected disabled>Sort By</option>
          <option value="Recommended">Recommended</option>
          <option value="High">Pricing:High to Low</option>
          <option value="Low">Pricing:Low to High</option>
          <option value="Rating">Customer Rating</option>
          <option value="Popular">Popularity</option>
        </select>

        <div class="card my-3" >
          <div class="card-header d-flex justify-content-between bg-transparent" >
          
              <button class="btn text-danger fs-6 border-0 text-underline clearAll" ><u>Clear All</u></button>
              <button class="btn text-danger offcanvas-footer-btn apply-filter" >APPLY</button>
          </div>
          <div class="card-body">
          <ul class="leftfilter mt-3">
          <li type="button" class="collapsible border-bottom">
            <div class="d-flex justify-content-between">
              <h6>Category</h6>
              <i class="bi bi-plus fs-5"></i>
            </div>
          </li>
          <div class="content">
            <ul class="list-group .list-group-flush text-start">
              <?php

                  foreach($category as $cat){
                    echo "<li class='list-group-item' id='lf".$cat."'><input class='form-check-input me-1' type='checkbox' name='catlist' value=".$cat.">".$cat."</li>";
                  }
            ?>

            </ul>
          </div>

          <li type="button" class="collapsible border-bottom">
            <div class="d-flex justify-content-between">
              <h6>Languages</h6>
              <i class="bi bi-plus fs-5"></i>
            </div>
          </li>
          <div class="content">
            <ul class="list-group .list-group-flush text-start">
              <?php
               foreach($languages as $lang){
                echo "<li class='list-group-item' id='lf".$lang."'><input class='form-check-input me-1' type='checkbox' name='langlist' value=".$lang.">".$lang."</li>";
              }
            ?>
            </ul>
          </div>
          <li type="button" class="collapsible border-bottom">
            <div class="d-flex justify-content-between">
              <h6>Author</h6>
              <i class="bi bi-plus fs-5"></i>
            </div>
          </li>
          <div class="content">
            <ul class="list-group .list-group-flush text-start">
              <?php
              for($i = 0; $i < count($authors_name) ; $i++)
              {
                echo "<li class='list-group-item' id='bf".$authors_id[$i]."'><input class='form-check-input me-1' name='authlist' type='checkbox' value=".$authors_id[$i].">".$authors_name[$i]."</li>";
              }
             
            ?>
            </ul>
          </div>
          <li type="button" class="collapsible border-bottom">
            <div class="d-flex justify-content-between">
              <h6>Prices</h6>
              <i class="bi bi-plus fs-5"></i>
            </div>
          </li>
          <div class="content">
          <ul class="list-group .list-group-flush text-start">
            <li class='list-group-item' id="p0"><input class='form-check-input me-1' type='checkbox' name='pricelist' value="0-500">0-500
            </li>
            <li class='list-group-item' id="p500"><input class='form-check-input me-1' name='pricelist' type='checkbox'
                value="500-1000">500-1000</li>
            <li class='list-group-item' id="p1000"><input class='form-check-input me-1' name='pricelist' type='checkbox'
                value="1000-2000">1000-2000</li>
            <li class='list-group-item' id="p2000"><input class='form-check-input me-1' name='pricelist' type='checkbox'
                value="2000-5000">2000</li>
          </ul>  

          </div>
          <li type="button" class="collapsible border-bottom">
            <div class="d-flex justify-content-between">
              <h6>Ratings</h6>
              <i class="bi bi-plus fs-5"></i>
            </div>
          </li>
          <div class="content">
            <ul class="list-group .list-group-flush text-start">

              <li class='list-group-item' id="p500"><input class='form-check-input me-1' name="ratelist" type='checkbox' value="4star">
                <span class="bi bi-star-fill text-warning"></span>
                <span class="bi bi-star-fill text-warning"></span>
                <span class="bi bi-star-fill text-warning"></span>
                <span class="bi bi-star-fill text-warning"></span>
                <span>& up</span>
              </li>

              <li class='list-group-item' id="p500"><input class='form-check-input me-1' name="ratelist" type='checkbox' value="3star">
                <span class="bi bi-star-fill text-warning"></span>
                <span class="bi bi-star-fill text-warning"></span>
                <span class="bi bi-star-fill text-warning"></span>
                <span>& up</span>
              </li>
            </ul>
          </div>
        </ul>

          </div>
         
        </div>

        
      </div>
      <div class=" col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9 products">
        <div class="container">
          <div class="row d-flex flex-row align-items-left justify-content-left" id="allProducts">
            <?php
                
                $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , languages.Language_name , pictures.CoverPage from books INNER JOIN authors on books.Author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN languages on languages.Language_id = price_detail.Language_id INNER JOIN pictures on pictures.Book_id = books.Book_id";
                $books = mysqli_query($conn,$sql);
               
                while($book=mysqli_fetch_assoc($books)){
                  echo" 
                    <div class='col-10 col-sm-6 col-md-6 col-lg-4 col-xl-4 py-3  m-auto'>
                      <div class='card'>
                        <div class='card-title py-3 d-flex text-dbrown'>
                        <div class='w-75' >
                        <h6 class='text-start text-truncate px-3 fs-5' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='".$book['Title']."' >".$book['Title']."</h6>
                          <h6 class='card-subtitle text-body-secondary text-brown text-end'>- ".$book['Author_name']."</h6>
                        </div>
                        <div class='w-25'>
                        <button class='wishlist btn text-danger'><i class='bi bi-heart fa-lg'></i></button>
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

                        <div class='card-footer'>
                      
                            <button name='tocart'  class='addToCart btn btn-dbrown p-2'>Add to Cart <i class='bi bi-bag fa-lg mx-2'></i></button>
                        
                            <div class='counter input-group d-none' id=".$book['Book_id'].">
                              <button class='btn  minusshop w-25' type='button'><i class='bi bi-dash text-light fa-lg'></i></button>
                              <input readonly type='text' class='form-control countshop text-center fs-5 bg-light w-50' value='1' aria-label='Example text with two button addons'>
                              <button class='btn  plusshop w-25' type='button'><i class='bi bi-plus text-light fa-lg'></i></button>
                            </div>
                      </div>
                      </div>
                    </div>                 
                    ";

               

              }
              
              ?>
            <!-- card end  -->

          </div>
        </div>
      </div>

    </div>



    <!-- Footer -->
    

<div class=" fixed-bottom bg-dark footerbar" id="filterbar">
      <div class="row border d-flex flex-row py-2 text-center">

        <div class="col-6 col-sm-6 text-light fs-5 border-right ">
        <button class="btn btn-dark w-100 border-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasBottomsort" aria-controls="offcanvasBottom">Sort By <i
              class="mx-1 bi bi-funnel"></i></button>
            
            <div class="offcanvas offcanvas-bottom h-50" tabindex="-1" id="offcanvasBottomsort" aria-labelledby="offcanvasBottomLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasBottomLabel">Sort By</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" id="closesortbutton"></button>
              </div>
              <div class="offcanvas-body small lh-base text-start">
              <div class="list-group">
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="sortoption" type="radio" value="Recommended">
                  Recommended
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="sortoption" type="radio" value="Low">
                  Pricing: Low to High
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="sortoption" type="radio" value="High">
                  Pricing : High to Low
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="sortoption" type="radio" value="Rating">
                  Customer Rating
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="sortoption" type="radio" value="popular">
                  Popularity
                </label>
              </div>
              </div>
            </div>
        </div>



        <div class="col-6 col-sm-6 text-light fs-5">
          <button class="btn btn-dark w-100 border-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Filters <i
              class="mx-1 bi bi-funnel"></i></button>

          <div class="offcanvas offcanvas-bottom h-75 " tabindex="-1" id="offcanvasBottom"
            aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header ">
              <h5 class="offcanvas-title fs-6" id="offcanvasBottomLabel">Filters</h5>
              <button class="btn text-danger fs-6 border-0 text-underline clearAll"><u>Clear All</u></button>
            </div>
            <div class="offcanvas-body">
              <div class="row d-flex flex-row justify-content-between h-100 m-0 ">
                <div class="col-5 col-sm-5 fs-6 filtersidelist">
                  <div class="nav flex-column text-center w-100" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-link1-tab" data-bs-toggle="pill"
                      data-bs-target="#v-pills-link1" role="tab" aria-controls="v-pills-link1" aria-selected="true">Category</a>
                    <a class="nav-link" id="v-pills-link2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-link2"
                      role="tab" aria-controls="v-pills-link2" aria-selected="false">Languages</a>
                    <a class="nav-link" id="v-pills-link3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-link3"
                      role="tab" aria-controls="v-pills-link3" aria-selected="false">Authors</a>
                    <a class="nav-link" id="v-pills-link4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-link4"
                      role="tab" aria-controls="v-pills-link4" aria-selected="false">Prices</a>
                    <a class="nav-link" id="v-pills-link4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-link5"
                      role="tab" aria-controls="v-pills-link5" aria-selected="false">Ratings</a>
                  </div>
                </div>
                <div class="col-7 col-sm-7 fs-6">
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-link1" role="tabpanel"
                      aria-labelledby="v-pills-link1-tab">
                      <ul class="list-group .list-group-flush text-start">
                        <?php
                            foreach($category as $cat){

                              echo "<li class='list-group-item' id='bf".$cat."'><input type='checkbox' class='form-check-input me-1' name='catlist'  value=".$cat.">".$cat."</li>";
                            }
                      ?>
          
                      </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-link2" role="tabpanel" aria-labelledby="v-pills-link2-tab">
                      <ul class="list-group .list-group-flush text-start">
                        <?php

                        foreach($languages as $lang){
                          echo "<li class='list-group-item' id='bf".$lang."'><input class='form-check-input me-1' name='langlist' type='checkbox' value=".$lang.">".$lang."</li>";
                        }
                      ?>
                      </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-link3" role="tabpanel" aria-labelledby="v-pills-link3-tab">
                      <ul class="list-group .list-group-flush text-start">
                        <?php
                        for($i = 0; $i < count($authors_name) ; $i++)
                          {
                            echo "<li class='list-group-item' id='bf".$authors_id[$i]."'><input class='form-check-input me-1' name='authlist' type='checkbox' value=".$authors_id[$i].">".$authors_name[$i]."</li>";
                          }
                      ?>
                      </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-link4" role="tabpanel" aria-labelledby="v-pills-link4-tab">
                      <ul class="list-group .list-group-flush text-start">
                        <li class='list-group-item' id="p0"><input class='form-check-input me-1' type='checkbox' name='pricelist' value="0-500">0-500
                        </li>
                        <li class='list-group-item' id="p500"><input class='form-check-input me-1' name='pricelist' type='checkbox'
                            value="500-1000">500-1000</li>
                        <li class='list-group-item' id="p1000"><input class='form-check-input me-1' name='pricelist' type='checkbox'
                            value="1000-2000">1000-2000</li>
                        <li class='list-group-item' id="p2000"><input class='form-check-input me-1' name='pricelist' type='checkbox'
                            value="2000-5000">2000</li>
                      </ul>          
                    </div>
                    <div class="tab-pane fade" id="v-pills-link5" role="tabpanel" aria-labelledby="v-pills-link5-tab">
                      <ul class="list-group .list-group-flush text-start">

                        <li class='list-group-item' id="p500"><input class='form-check-input me-1' name='ratelist' type='checkbox' value="4star">
                          <span class="bi bi-star-fill text-warning"></span>
                          <span class="bi bi-star-fill text-warning"></span>
                          <span class="bi bi-star-fill text-warning"></span>
                          <span class="bi bi-star-fill text-warning"></span>
                          <span>& up</span>
                        </li>
          
                        <li class='list-group-item' id="p500"><input class='form-check-input me-1' name='ratelist' type='checkbox' value="3star">
                          <span class="bi bi-star-fill text-warning"></span>
                          <span class="bi bi-star-fill text-warning"></span>
                          <span class="bi bi-star-fill text-warning"></span>
                          <span>& up</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="offcanvas-footer">
              <div class="row d-flex flex-row py-2">
                <div class="col-6 col-sm-6 fs-6">
                  <button class="btn w-100 text-secondary offcanvas-footer-btn" class="btn-close text-reset" data-bs-dismiss="offcanvas" id="closefilterbutton"> 
                    CLOSE
                  </button>
                </div>
                <div class="col-6 col-sm-6 fs-6">
                  <button class="btn w-100 text-danger offcanvas-footer-btn apply-filter" >
                    APPLY
                  </button>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>

        <div class="toast align-items-center text-bg-success border-0 m-auto" id="successToast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
        Product added in Bag.
      </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
    <?php
        require '__footer.html';
    ?>
    <!-- javascript -->
    <!-- bootstrap -->
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
    <script src="JS/filter.js"></script>
    <script>
      document.getElementById("shop").classList.add("active");

      let coll = document.getElementsByClassName("collapsible");
      let i;

      for (i = 0; i < coll.length; i++) {

        coll[i].addEventListener("click", function () {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (content.style.display === "block") {
            content.style.display = "none";
            this.firstElementChild.lastElementChild.classList.remove("bi-dash");
            this.firstElementChild.lastElementChild.classList.add("bi-plus");
          } else {
            content.style.display = "block";
            this.firstElementChild.lastElementChild.classList.remove("bi-plus");
            this.firstElementChild.lastElementChild.classList.add("bi-dash");

          }
        });
      }

      let wish = document.getElementsByClassName("wishlist");

      for (let itr = 0; itr < wish.length; itr++) {

        wish[itr].addEventListener("click", function () {
    
        <?php
          if ($isloggedin) {
        ?>

              let heart = this.firstElementChild;
            if (heart.classList.contains("bi-heart")) {
              heart.classList.remove("bi-heart");
              heart.classList.add("bi-heart-fill");
            } else {
              heart.classList.remove("bi-heart-fill");
              heart.classList.add("bi-heart");
            }
        <?php
          }
          else {
            ?>
              wish[itr].setAttribute("data-bs-toggle", "modal");
            wish[itr].setAttribute("data-bs-target", "#exampleModal");
              
            <?php
          }   
        ?>
      });
      }


      let carts = document.getElementsByClassName("addToCart");
      let counters = document.getElementsByClassName("counter");
      let plus = document.getElementsByClassName("plusshop");
      let counts = document.getElementsByClassName("countshop");
      let minus = document.getElementsByClassName("minusshop");

      for (let itrc = 0; itrc < carts.length; itrc++) {

          carts[itrc].addEventListener("click", function () {    
              $.ajax({
                url: 'http://localhost/Bookstore/addtocart.php',
                type: 'POST',
                data: {
                quantity :1,
                bookid : counters[itrc].id,
                action : "add"
                },
                success: function(response){
                  $("#offcanvascartTotal").html(response);
                  carts[itrc].style.display = "none";
                  counters[itrc].classList.remove("d-none");
                  counters[itrc].classList.add("d-flex");

                  $('.toast').toast('show');
                  
                  setTimeout(() => {
                    $('.toast').toast('hide');
                  }, 2000);
                  $( "#cartContainer" ).load(window.location.href + " #cartContainer" );
              }
            });
        });
      }
          for (let itrp = 0; itrp < plus.length; itrp++) {
           plus[itrp].addEventListener("click", function () {
              val = counts[itrp].value;
              counts[itrp].value = ++val;
             
          $.ajax({
              url: 'http://localhost/Bookstore/addtocart.php',
              type: 'POST',
              data: {
              quantity :val,
              bookid : counters[itrp].id,
              action : "update"
              },
              success: function(response){
                $("#offcanvascartTotal").html(response);
                $( "#cartContainer" ).load(window.location.href + " #cartContainer" );
            }
         });
            });
          }

    

    for (let itrm = 0; itrm < minus.length; itrm++) {

        minus[itrm].addEventListener("click", function () {
              val = counts[itrm].value;
              counts[itrm].value = --val;
                if (val <= 0) {
                      counts[itrm].value = 1;
                      carts[itrm].style.display = "flex";
                      carts[itrm].classList.add("m-auto");
                      counters[itrm].classList.remove("d-flex");
                      counters[itrm].classList.add("d-none");
                      $.ajax({
                            url: 'http://localhost/Bookstore/addtocart.php',
                            type: 'POST',
                            data: {
                            quantity :0,
                            bookid : counters[itrm].id,
                            action : "remove"
                            },
                            success: function(response){
                              $("#offcanvascartTotal").html(response);
                              $( "#cartContainer" ).load(window.location.href + " #cartContainer" );
                          }
                       });
                }
                else{
                        
          $.ajax({
              url: 'http://localhost/Bookstore/addtocart.php',
              type: 'POST',
              data: {
              quantity :val,
              bookid : counters[itrm].id,
              action : "update"
              
              },
              success: function(response){
                $("#offcanvascartTotal").html(response);
                $("#cartContainer").load(window.location.href + "#cartContainer");
            }
      });
                }
  });
}

</script>
</body>
</html>