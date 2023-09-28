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
            
           $_SESSION['cartProducts'][$_POST['bookid']] = 1 ;
        
        }
        else if($_POST['action']==="update"){
            
            $_SESSION['cartProducts'][$_POST['bookid']] = $_POST['quantity'] ;
           
        }
        else if($_POST['action']==="remove"){
            unset( $_SESSION['cartProducts'][$_POST['bookid']]);
        }
        else if($_POST['action']==="ordersummary"){
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

            echo "<div class='d-flex flex-row justify-content-around'>
            <div>Cart Total:</div>
            <div>$item_total</div>
        </div>";
        }
       
       
    }
}
if(isset($_POST['quants'])){

}
?>