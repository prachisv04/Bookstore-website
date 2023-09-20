<div class="container container-fluid tabs mb-5 text-center">
        <h3>Categories</h3>
        <div>
            <ul class="nav nav-pills d-flex align-items-center justify-content-center">
                <li class="nav-item  text-nowrap"><a class="nav-link fs-4 active" data-bs-target="#all" data-bs-toggle="tab"
                       >All</a></li>
                <li class="nav-item text-nowrap "><a class="nav-link fs-4" data-bs-target="#romance" data-bs-toggle="tab"
                        >Romance</a></li>
                <li class="nav-item text-nowrap "><a class="nav-link fs-4" data-bs-target="#novel" data-bs-toggle="tab"
                        >Novel</a></li>
                <li class="nav-item text-nowrap "><a class="nav-link fs-4" data-bs-target="#fiction" data-bs-toggle="tab"
                        >Fiction</a></li>
                <li class="nav-item text-nowrap "><a class="nav-link fs-4" data-bs-target="#non-fiction" data-bs-toggle="tab"
                        id="non-fiction">Non-Fiction</a></li>
                <li class="nav-item text-nowrap "><a class="nav-link fs-4" data-bs-target="#history" data-bs-toggle="tab"
                        id="history">History</a></li>
                <li class="nav-item text-nowrap "><a class="nav-link fs-4" data-bs-target="#finance" data-bs-toggle="tab"
                        id="finance">Finance</a></li>

            </ul>
        </div>

        <div id='content' class="tab-content">
            <div class="tab-pane active" id="all">
                <div class="container product-line">
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                        require '__dbconnect.php';

                        $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , language_details.Language_name ,pictures.CoverPage from books INNER JOIN authors on books.author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN language_details on language_details.Language_id = price_detail.Language_id INNER JOIN pictures on pictures.Book_id = books.Book_id ";
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
            <div class="tab-pane" id="romance">
                <div class="container product-line">
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                        require '__dbconnect.php';

                        $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , language_details.Language_name , pictures.CoverPage from books INNER JOIN authors on books.Author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN language_details on language_details.Language_id = price_detail.language_id INNER JOIN pictures on pictures.Book_id = books.Book_id Where books.Category='Romance'";
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
                            <button class="right-paddle paddle" ><i class="bi bi-arrow-right fs-4"></i>

                            </button>
                        </div>

                    </div>

                </div>
            </div>

            <div class="tab-pane" id="novel">
                <div class="container product-line">
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                        require '__dbconnect.php';

                        $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , language_details.Language_name , pictures.CoverPage from books INNER JOIN authors on books.Author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN language_details on language_details.Language_id = price_detail.language_id INNER JOIN pictures on pictures.Book_id = books.Book_id Where books.Category='Novel'";
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
            <div class="tab-pane" id="fiction">
                <div class="container product-line">
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                        require '__dbconnect.php';

                        $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , language_details.Language_name , pictures.CoverPage from books INNER JOIN authors on books.Author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN language_details on language_details.Language_id = price_detail.language_id INNER JOIN pictures on pictures.Book_id = books.Book_id Where books.Category='Fiction'";
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
            <div class="tab-pane" id="non-fiction">
                <div class="container product-line">
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                        require '__dbconnect.php';

                        $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , language_details.Language_name , pictures.CoverPage from books INNER JOIN authors on books.Author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN language_details on language_details.Language_id = price_detail.language_id INNER JOIN pictures on pictures.Book_id = books.Book_id Where books.Category='Non-fiction'";
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
            <div class="tab-pane" id="history">
                <div class="container product-line">
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                        require '__dbconnect.php';

                        $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , language_details.Language_name , pictures.CoverPage from books INNER JOIN authors on books.Author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN language_details on language_details.Language_id = price_detail.language_id INNER JOIN pictures on pictures.Book_id = books.Book_id Where books.Category='History'";
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
            <div class="tab-pane" id="finance">
                <div class="container product-line">
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                        require '__dbconnect.php';

                        $sql = "select books.Book_id , books.Title , books.PageNums , books.Category , authors.Author_name, price_detail.Price , language_details.Language_name , pictures.CoverPage from books INNER JOIN authors on books.Author_id = authors.Author_id INNER JOIN price_detail on books.Book_id = price_detail.Book_id  INNER JOIN language_details on language_details.Language_id = price_detail.language_id INNER JOIN pictures on pictures.Book_id = books.Book_id Where books.Category='Finance'";
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