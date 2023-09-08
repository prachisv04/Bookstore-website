<?php
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
    require '__dbconnect.php';
    $isloggedin = false;
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $isloggedin = true;
    }

    // get categories as array
    $category = array();
    $sql = "SELECT DISTINCT Category FROM book ";
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
    $sql = "SELECT Author_id ,Author_name FROM author";
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

  <style>
    .offcanvas-footer-btn{
      border: none;
    }
   
  </style>


</head>
<body>


<div class=" fixed-bottom bg-dark footerbar" id="filterbar">
      <div class="row border d-flex flex-row py-2 text-center">

        <div class="col-6 col-sm-6 text-light fs-5 border-right ">

          <div class="dropdown">
            <a class="btn btn-dark border-0 w-100 dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
              data-bs-toggle="dropdown" aria-expanded="false">
              Sort By <i class="mx-1 bi bi-arrow-down-up"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li class="dropdown-item">Recommended</li>
              <li class="dropdown-item">Pricing:Low to High</li>
              <li class="dropdown-item">Pricing:High to Low</li>
              <li class="dropdown-item">Customer Rating</li>
              <li class="dropdown-item">Popularity</li>
            </ul>
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
              <button class="btn text-danger fs-6 border-0 text-underline" id="clearAll"><u>Clear All</u></button>
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
                        <li class='list-group-item' id="p0"><input class='form-check-input me-1' type='checkbox' name='pricelist' value="0">0-500
                        </li>
                        <li class='list-group-item' id="p500"><input class='form-check-input me-1' name='pricelist' type='checkbox'
                            value="500">500-1000</li>
                        <li class='list-group-item' id="p1000"><input class='form-check-input me-1' name='pricelist' type='checkbox'
                            value="1000">1000-2000</li>
                        <li class='list-group-item' id="p2000"><input class='form-check-input me-1' name='pricelist' type='checkbox'
                            value="2000">2000 & up</li>
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
                  <button class="btn w-100 text-secondary offcanvas-footer-btn" class="btn-close text-reset" data-bs-dismiss="offcanvas"> 
                    CLOSE
                  </button>
                </div>
                <div class="col-6 col-sm-6 fs-6">
                  <button class="btn w-100 text-danger offcanvas-footer-btn" id="apply-filter">
                    APPLY
                  </button>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Javascript -->
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


//function to delete specified element from array 
      function arrayRemove(arr, value) {
      
        return arr.filter(function (ele) {
            return ele != value;
        });

      }

     // filter by category 
    let categoryfilter = document.getElementsByName("catlist");
    let categorylist = [];

    for(let i =0;i< categoryfilter.length;i++){
      categoryfilter[i].addEventListener("change",()=>{
          if (categoryfilter[i].checked == true){
            categorylist.push(categoryfilter[i].value);
          } 
          else {
            categorylist= arrayRemove(categorylist,categoryfilter[i].value);
          }
      });
    }

    // filter by language
    let languagefilter = document.getElementsByName("langlist");
    let languagelist = [];
    for(let i =0;i< languagefilter.length;i++){
      languagefilter[i].addEventListener("change",()=>{
          if (languagefilter[i].checked == true){
            languagelist.push(languagefilter[i].value);
          } 
          else {
            languagelist= arrayRemove(languagelist,languagefilter[i].value);
          }
      });
    }

    // filter by author

    let authorfilter = document.getElementsByName("authlist");
    let authorlist = [];
    for(let i =0;i< authorfilter.length;i++){

      authorfilter[i].addEventListener("change",()=>{
          if (authorfilter[i].checked == true){
            authorlist.push(authorfilter[i].value);
          } 
          else {
            authorlist =  arrayRemove(authorlist,authorfilter[i].value);
          }
      });
    }


    // filter by price
    let pricefilter = document.getElementsByName("pricelist");
    let pricelist = [];
    for(let i =0;i< pricefilter.length;i++){

      pricefilter[i].addEventListener("change",()=>{
          if (pricefilter[i].checked == true){
            pricelist.push(pricefilter[i].value);
          } 
          else {
            pricelist =  arrayRemove(pricelist,pricefilter[i].value);
          }         
      });
    }

    // filter by rate
    let ratefilter = document.getElementsByName("ratelist");
    let ratelist= [];
    for(let i =0;i< ratefilter.length;i++){

      ratefilter[i].addEventListener("change",()=>{
          if (ratefilter[i].checked == true){
            ratelist.push(ratefilter[i].value);
          } 
          else {
            ratelist =  arrayRemove(ratelist,ratefilter[i].value);
          }
      });
    }

    document.getElementById("apply-filter").addEventListener("click",()=>{
      // console.log(ratelist);
      // console.log(pricelist);
      // console.log(authorlist);
      // console.log(languagelist);
      console.log(categorylist);

      let catlist_str = categorylist.join(",");
      // let pricelist_str = pricelist.join(",");
      // let ratelist_str = ratelist.join(",");
      // let langlist_str = languagelist.join(",");
      // let authlist_str = authorlist.join(",");

    $.ajax({
           url: 'http://localhost/Bookstore/test.php',
           type: 'POST',
            data: {
              extra :1,
              categorylistdata: catlist_str          
            },
            success: function(response){
              alert('response : ' +response);
            }
    });
    
  });
    document.getElementById("clearAll").addEventListener("click",()=>{
      categorylist = []
      pricelist = []
      authorlist = []
      ratelist = []
      languagelist = []
      $('input[type=checkbox]').prop('checked',false); 
      
    });
</script>
</body>

</html>
