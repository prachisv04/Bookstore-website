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
    <link rel="stylesheet" href="CSS/shop.css">

</head>

<body class="bg">

    <!-- navbar -->
    <?php
         require '__navbar.php';
    ?>


    <div class="container">
        <div class="row gx-3 text-center d-flex justify-content-around">

            <div class="col-lg-3 col-md-4 col-xl-3 filters ">

                <div class="accordion " id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" id="accordion-button1" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                            Catogory
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                          <div class="accordion-body ">
                            <ul class="list-group list-group-flush list-group-light text-start">
                                <li class="list-group-item ">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                    Fantasy
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Art
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Romance
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  History
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Psychology
                                </li>
                              </ul>
                          </div>
                        </div>
                      </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                          Author
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <ul class="list-group list-group-flush list-group-light text-start">
                                <li class="list-group-item ">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                    Fantasy
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Art
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Romance
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  History
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Psychology
                                </li>
                              </ul>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                          Price
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <ul class="list-group list-group-flush list-group-light text-start">
                                <li class="list-group-item ">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                    Fantasy
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Art
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Romance
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  History
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Psychology
                                </li>
                              </ul>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                            Language
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            <ul class="list-group list-group-flush list-group-light text-start">
                                <li class="list-group-item ">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                    Fantasy
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Art
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Romance
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  History
                                </li>
                                <li class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="..." />
                                  Psychology
                                </li>
                              </ul>
                          </div>
                        </div>
                      </div>
                  </div>
                
            </div>
            <div class="col-8 products">Check</div>
        </div>
    </div>




    <!-- Footer -->
    <?php
        require '__footer.html';
    ?>
    <!-- javascript -->
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>
       <!-- site-custom -->

    <script src="JS/customs.js"></script>
    <script>
        document.getElementById("shop").classList.add("active");

        document.getElementById("accordion-button1").addEventListener("click",()=>{

            if(document.getElementById("panelsStayOpen-collapseOne").classList.contains("show")){
                document.getElementById("panelsStayOpen-collapseOne").classList.remove("show");
                document.getElementById("panelsStayOpen-collapseOne").classList.add("hide");
            }
          
        });
    </script>
</body>

</html>