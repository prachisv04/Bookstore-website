<?php
session_start();

$products = [];
$quants = [];
require '__dbconnect.php';
if(isset($_POST['id'])){   
    if( !empty( $_POST['id'] )){
        // if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        //   //insert into db


        // }
        // else{
        //     //insert into session
        //     array_push($products,$_POST['id']);
        //     array_push($quants,$_POST['quantity']);
        //     $_SESSION["cart_items"]=$products;
        //     $_SESSION["cart_items_quantity"]=$quants;
            
        // }

        echo  $_POST['id'];
    }
}
else{
    echo "its here";
}

?>