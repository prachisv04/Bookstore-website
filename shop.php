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
  <title>Sahitya | Shop</title>
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

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

</head>

<body class="bg">

  <!-- navbar -->
  <?php
         require '__navbar.php';
    ?>


  <div class="container">
    <div class="row gx-3 text-center d-flex justify-content-around">

      <div class="col-lg-3 col-md-4 col-xl-3 filters">

        <div class="dropdown">
          <a class="btn btn-outline-dark  w-100 dropdown-toggle" href="#" role="button" id="sortbtn" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="d-flex justify-content-between">
              <h6>Sort By</h6>
              <i class="bi bi-caret-right"></i>
            </div>
          </a>
        
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="#">Recommended</a></li>
            <li><a class="dropdown-item" href="#">Pricing:Low to High</a></li>
            <li><a class="dropdown-item" href="#">Pricing:High to Low</a></li>
            <li><a class="dropdown-item" href="#">Customer Rating</a></li>
            <li><a class="dropdown-item" href="#">Popularity</a></li>
          </ul>
        </div>
        <ul class="leftfilter mt-3">

          <li type="button" class="collapsible border-bottom">
            <div class="d-flex justify-content-between">
              <h6>Category</h6>
              <i class="bi bi-plus fs-5"></i>
            </div>
          </li>
          <div class="content">
            <ul class="list-group .list-group-flush text-start">
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Romance
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Fantasy
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Art
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                History
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Suspence
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Fiction
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Non-Fiction
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Science
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Horror
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Poetry
              </li>
            </ul>
          </div>

          <li type="button" class="collapsible border-bottom">
            <div class="d-flex justify-content-between">
              <h6>Languages</h6>
              <i class="bi bi-plus fs-5"></i>
            </div>
          </li>
          <div class="content">

          </div>
          <li type="button" class="collapsible border-bottom">
            <div class="d-flex justify-content-between">
              <h6>Author</h6>
              <i class="bi bi-plus fs-5"></i>
            </div>
          </li>
          <div class="content">
            <ul class="list-group .list-group-flush text-start">
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                First checkbox
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Second checkbox
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Third checkbox
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Fourth checkbox
              </li>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                Fifth checkbox
              </li>
            </ul>
          </div>
          <li type="button" class="collapsible border-bottom">
            <div class="d-flex justify-content-between">
              <h6>Prices</h6>
              <i class="bi bi-plus fs-5"></i>
            </div>
          </li>
          <div class="content">

          </div>
          <li type="button" class="collapsible border-bottom">
            <div class="d-flex justify-content-between">
              <h6>Ratings</h6>
              <i class="bi bi-plus fs-5"></i>
            </div>
          </li>
          <div class="content">
            
          </div>
        </ul>


      </div>
      <div class="col-lg-9 col-md-7 col-xl-9  products">
        <div class="container ">
            <div class="row d-flex justify-content-around g-3" id="allProducts">
              
              <?php

                require '__dbconnect.php';

                $sql = "select * from `book`";

                $books = mysqli_query($conn,$sql);
                $no=1;
                while($book=mysqli_fetch_assoc($books)){
                  echo" 
                    <div class='col py-3 my-5'>
                      <div class='card'>
                        <div class='card-title py-3 d-flex text-dbrown'>
                        <div class='w-75 border'>
                        <h6 class='text-start px-3'>".$book['Title']."</h6>
                          <h6 class='card-subtitle mb-2 text-body-secondary text-brown'>- Author</h6>
                        </div>
                        <div class='w-25'>
                        <button class='wishlist btn text-danger'><i class='bi bi-heart fa-lg'></i></button>
                        </div>
                        </div>
  
                        <div class='card-body  text-nowrap'>
                        <h5>isbn : ".$book['isbn']."</h5>
                        <h5>Category : ".$book['Category']."</h5>
                        <h5>PageNums : ".$book['PageNums']."</h5>    
                        </div>
  
                        <div class='card-footer d-block'>
                          
                          <button class='btn btn-dbrown '>Add to Cart</button>
                        </div>
                      </div>
                    </div>                 
                    ";
              }
              
              ?>
              
              <!-- card end -->

            </div>
        </div>
      </div>
    </div>
  </div>


 

  <!-- Footer -->
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
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script>
        $(document).ready(function () {
          $('#allProducts').DataTable();

        });
      </script>
  <script src="JS/customs.js"></script>
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

    document.getElementById("sortbtn").addEventListener("click",()=>{
      if( document.getElementById("sortbtn").classList.contains("show")){
        document.getElementById("sortbtn").firstElementChild.lastElementChild.classList.remove("bi-caret-right");
        document.getElementById("sortbtn").firstElementChild.lastElementChild.classList.add("bi-caret-down");
      }
      else{
        document.getElementById("sortbtn").firstElementChild.lastElementChild.classList.remove("bi-caret-down");
        document.getElementById("sortbtn").firstElementChild.lastElementChild.classList.add("bi-caret-right");
      }
    });


    let wish = document.getElementsByClassName("wishlist");
    console.log(wish);
    let itr;

    for (itr = 0; itr < wish.length; itr++) {

      wish[itr].addEventListener("click", function () {
    
        let heart = this.firstElementChild;
        if ( heart.classList.contains("bi-heart") ) {
          heart.classList.remove("bi-heart");
          heart.classList.add("bi-heart-fill");
        } else {
          heart.classList.remove("bi-heart-fill");
          heart.classList.add("bi-heart");
        }
      });
    }

  </script>
</body>

</html>