<?php
session_start();
require '__dbconnect.php';
$isloggedin = false;
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $isloggedin = true;
}
    $item_total = 0; 
    $discount = 100; 
if(isset($_POST['bookid'])){   
    if( !empty( $_POST['bookid'] )){
        if($_POST['action']==="add" ){
            

        if($isloggedin){

        }
        else{
           $_SESSION['cartProducts'][$_POST['bookid']] = 1 ;
           foreach ($_SESSION['cartProducts'] as $key => $value) {
               
            $sql = "SELECT Price FROM price_detail where Book_id = '".$key."'";
        
            $result = mysqli_query($conn,$sql);
          
            while($price = mysqli_fetch_assoc($result))
            {
             $item_total += ($price['Price'] * $value);
            }
            
            }
            echo $item_total." ".$discount;
         }
         
        }
        else if($_POST['action']==="update"){
            if($isloggedin){

            }
            else{
            $_SESSION['cartProducts'][$_POST['bookid']] = $_POST['quantity'] ;

            foreach ($_SESSION['cartProducts'] as $key => $value) {
               
                $sql = "SELECT Price FROM price_detail where Book_id = '".$key."'";
            
                $result = mysqli_query($conn,$sql);
              
                while($price = mysqli_fetch_assoc($result))
                {
                 $item_total += ($price['Price'] * $value);
                }
                
                }
                echo $item_total." ".$discount;
        }
    }
        else if($_POST['action']==="remove"){

            if($isloggedin){

            }
            else{

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
                echo $item_total." ".$discount;
         
        }
    }
        else if($_POST['action']==="ordersummary"){
            
            if($isloggedin){
                $updatecart = "update `carts` set Quantity=".$_POST['quantity']." where carts.User_id = ".$_POST['userid']." and carts.book_id =".$_POST['bookid'];
               
                $res = mysqli_query($conn,$updatecart);
            }
            else{
            $_SESSION['cartProducts'][$_POST['bookid']] = $_POST['quantity'] ;  
            foreach ($_SESSION['cartProducts'] as $key => $value) {
               
               $sql = "SELECT Price FROM price_detail where Book_id = '".$key."'";
           
               $result = mysqli_query($conn,$sql);
             
               while($price = mysqli_fetch_assoc($result))
               {
                $item_total += ($price['Price'] * $value);
               }
                
            }
            echo $item_total." ".$discount;
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