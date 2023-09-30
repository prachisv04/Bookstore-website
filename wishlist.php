<?php
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
    require '__dbconnect.php';
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
 
  <?php
         require '__navbar.php';
    ?>

    <!-- wishlist items -->

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col col-md-8 col-lg-8 col-xl-6">
            
                <?php 

                    if($isloggedin){
                        
                        $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , languages.Language_name , pictures.CoverPage from books INNER JOIN authors on books.Author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN languages on languages.Language_id = price_detail.Language_id INNER JOIN pictures on pictures.Book_id = books.Book_id inner join wishlists on books.Book_id = wishlists.book_id where wishlists.User_id='".$_SESSION['userid']."'";
                        $result = mysqli_query($conn,$sql);

                        while($book = mysqli_fetch_assoc($result)){
                            echo "
                        <div class='col-10 col-sm-6 col-md-6 col-lg-5 col-xl-5  m-auto'>
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
                      
                            <button name='".$book['Book_id']."' class='addToCart btn btn-dbrown m-auto'>Add to Cart <i class='bi bi-bag fa-lg mx-2'></i></button>
                        
                           
                      </div>
                      </div>
                      </div>      ";
                        }
                        
                    }
                    else{
                        echo " Please login to view wishlisted items. ";
                    }

                ?>

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="JS/customs.js"></script>
    <script src="JS/filter.js"></script>
    
    <script>
        let carts = document.getElementsByClassName("addToCart");
        for (let itrc = 0; itrc < carts.length; itrc++) {

            carts[itrc].addEventListener("click", function () {    
                $.ajax({
                    url: 'http://localhost/Bookstore/addtocart.php',
                    type: 'POST',
                    data: {
                    quantity :1,
                    bookid : carts[itrc].getAttribute("name"),
                    action : "add"
                    },
                    success: function(response){
                        $("#offcanvascartTotal").html(response);
                        
                        $('.toast').toast('show');
                        
                        setTimeout(() => {
                        $('.toast').toast('hide');
                        }, 2000);
                        carts[itrc].setAttribute("disabled","true");
                        $( "#cartContainer" ).load(window.location.href + " #cartContainer" );
                    }
                });
            });
        }
    </script>

</body>
</html>