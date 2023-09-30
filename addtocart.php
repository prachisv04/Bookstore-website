<?php
session_start();
require '__dbconnect.php';
$isloggedin = false;
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $isloggedin = true;
}
if(isset($_POST['bookid'])){   
    if( !empty( $_POST['bookid'] )){
        if($_POST['action']==="add" ){

        if($isloggedin){
            $item_total = 0; 
           $updatecart = "INSERT INTO `carts` VALUES('".$_SESSION['userid']."','".$_POST['bookid']."','".$_POST['quantity']."')";
            $res = mysqli_query($conn,$updatecart);

            $SQL = "SELECT carts.book_id , carts.Quantity , price_detail.Price from carts inner join  price_detail on carts.book_id = price_detail.Book_id where carts.User_id='".$_SESSION['userid']."'";
            $res = mysqli_query($conn,$SQL);

            while($row = mysqli_fetch_assoc($res)){

                $item_total += $row['Price'] * $row['Quantity'];
              
            }
            echo $item_total;
        }
        else{
            $item_total = 0; 
           $_SESSION['cartProducts'][$_POST['bookid']] = 1 ;
           foreach ($_SESSION['cartProducts'] as $key => $value) {
               
            $sql = "SELECT Price FROM price_detail where Book_id = '".$key."'";
        
            $result = mysqli_query($conn,$sql);
          
            while($price = mysqli_fetch_assoc($result))
            {
             $item_total += ($price['Price'] * $value);
            }
            
            }
            echo $item_total;
         }
        
        }
        else if($_POST['action']==="update"){
            if($isloggedin){
                $item_total = 0; 
                $updatecart = "UPDATE `carts` set Quantity='".$_POST['quantity']."' where User_id = '".$_SESSION['userid']."' and carts.book_id ='".$_POST['bookid']."'";
                $res = mysqli_query($conn,$updatecart);

                $SQL = "SELECT carts.book_id , carts.Quantity , price_detail.Price from carts inner join  price_detail on carts.book_id = price_detail.Book_id where carts.User_id='".$_SESSION['userid']."'";
                $res = mysqli_query($conn,$SQL);

                while($row = mysqli_fetch_assoc($res)){

                    $item_total += $row['Price'] * $row['Quantity'];
                  
                }
                echo $item_total;
            }
            else{
                $item_total = 0; 
              $_SESSION['cartProducts'][$_POST['bookid']] = $_POST['quantity'] ;

            foreach ($_SESSION['cartProducts'] as $key => $value) {
               
                $sql = "SELECT Price FROM price_detail where Book_id = '".$key."'";
            
                $result = mysqli_query($conn,$sql);
              
                while($price = mysqli_fetch_assoc($result))
                {
                 $item_total += ($price['Price'] * $value);
                }
                
                }
                echo $item_total;
        }
        
    }
        else if($_POST['action']==="remove"){

            if($isloggedin){

                $item_total = 0;
               
               $updatecart = "DELETE FROM `carts`  where User_id ='".$_SESSION['userid']."' and carts.book_id ='".$_POST['bookid']."'" ;
                $res = mysqli_query($conn,$updatecart);
                $SQL = "SELECT carts.book_id , carts.Quantity , price_detail.Price from carts inner join  price_detail on carts.book_id = price_detail.Book_id where carts.User_id='".$_SESSION['userid']."'";
                $res = mysqli_query($conn,$SQL);

                while($row = mysqli_fetch_assoc($res)){

                    $item_total += $row['Price'] * $row['Quantity'];
                }
                echo $item_total;
            }
            else{
                $item_total = 0; 
           foreach ($_SESSION['cartProducts'] as $key => $value) {
               if($key == $_POST['bookid'] ){
                unset($_SESSION['cartProducts'][$key]);
               }
            }
            foreach ($_SESSION['cartProducts'] as $key => $value) {
               
                $sql = "SELECT Price FROM price_detail where Book_id = '".$key."'";
            
                $result = mysqli_query($conn,$sql);
              
                while($price = mysqli_fetch_assoc($result))
                {
                 $item_total += ($price['Price'] * $value);
                }
                
                }
                echo $item_total;
        }
        
    }
        else if($_POST['action']==="ordersummary"){
            
            if($isloggedin){
                $item_total = 0;
                $updatecart = "UPDATE `carts` set Quantity='".$_POST['quantity']."' where User_id = '".$_SESSION['userid']."' and carts.book_id ='".$_POST['bookid']."'";
                $res = mysqli_query($conn,$updatecart);

                $SQL = "SELECT carts.book_id , carts.Quantity , price_detail.Price from carts inner join  price_detail on carts.book_id = price_detail.Book_id where carts.User_id='".$_SESSION['userid']."'";
                $res = mysqli_query($conn,$SQL);

                while($row = mysqli_fetch_assoc($res)){

                    $item_total += $row['Price'] * $row['Quantity'];
                  
                }
                echo $item_total;
            }
            else{
                $item_total = 0; 
              $_SESSION['cartProducts'][$_POST['bookid']] = $_POST['quantity'] ;  
            foreach ($_SESSION['cartProducts'] as $key => $value) {
               
               $sql = "SELECT Price FROM price_detail where Book_id = '".$key."'";
           
               $result = mysqli_query($conn,$sql);
             
               while($price = mysqli_fetch_assoc($result))
               {
                $item_total += ($price['Price'] * $value);
               }
                
            }
            echo $item_total;
        }
       
    }
    }
}

// clears cart
if(isset($_POST['action']) and $_POST['action']==="removeall"){
    if($isloggedin){

    }
    else{
    $_SESSION['cartProducts'] = array();  
    echo "0";
    }
}
?>