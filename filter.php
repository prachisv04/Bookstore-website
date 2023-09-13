<?php

// get array process sql return echo statement to print on page
// whatever we will echo on this page will be sent back to requesting page
require '__dbconnect.php';
$sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , language_Details.Language_name , pictures.CoverPage from books INNER JOIN authors on books.Author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN languages on language_details.Language_id = price_detail.language_id INNER JOIN pictures on pictures.Book_id = books.Book_id WHERE TRUE";
if(isset($_POST['categorylistdata'])){   
    if( !empty( $_POST['categorylistdata'] )){
        $category = explode(",",$_POST['categorylistdata']);
        $cats = join("','",$category);   
        $sql = $sql . " AND  books.Category IN ('$cats')";
    }
}
if(isset($_POST['languagelistdata'])){   
    if( !empty( $_POST['languagelistdata'] )){
        $languages = explode(",",$_POST['languagelistdata']);
        $langs = join("','",$languages);  
        $sql = $sql . " AND  language_details.Language_name IN ('$langs')"; 
    }
}
if(isset($_POST['authorlistdata'])){   
    if( !empty( $_POST['authorlistdata'] )){
        $authors = explode(",",$_POST['authorlistdata']);
        $auths = join("','",$authors);   
        $sql = $sql . " AND authors.Author_id IN ('$auths')"; 
    }
}

if(isset($_POST['pricelistdata'])){              
if( !empty(  $_POST['pricelistdata'] )){
    $prices = explode(",", $_POST['pricelistdata']);
    
    $prices = implode(" ",$prices);
    $prices = str_replace(" ","-",$prices);

    $prices = explode("-",$prices);
    sort($prices);  
    $sql = $sql . " AND price_detail.Price BETWEEN ".$prices[0]." AND  ".$prices[count($prices)-1]; 
    // echo "<br> ".$sql;
}
}

if(isset($_POST['ratelistdata'])){  
if( !empty( $_POST['ratelistdata'] )){
    $ratings = explode(",",$_POST['ratelistdata']);
}
}

if(isset($_POST['sortmethod'])){  
  if( !empty( $_POST['sortmethod'] )){
      if($_POST['sortmethod']==="Low")
      $sql = $sql." order by price_details.Price ";
      else if($_POST['sortmethod']==="High")
      $sql = $sql." order by price_details.Price desc";
  }
  }
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
                            <button class='addToCart btn btn-dbrown p-2'>Add to Cart <i class='bi bi-bag fa-lg mx-2'></i></button>
                        </div>
                      </div>
                    </div>                 
                    ";
              }


?>