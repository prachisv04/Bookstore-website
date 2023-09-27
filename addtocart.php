<?php
session_start();
require '__dbconnect.php';
$isloggedin = false;
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $isloggedin = true;
}
$products =[];
$_SESSION['cartProducts']=array();
if(isset($_POST['bookid'])){   
    if( !empty( $_POST['bookid'] )){
        if($_POST['action']==="add" ){
            $products += [$_POST['bookid'] => $_POST['quantity']];
            array_push($_SESSION['cartProducts'],[$_POST['bookid'],1]);
        }
        else if($_POST['action']==="update"){
            $products[$_POST['bookid']] = $_POST['quantity'];
            array_push($_SESSION['cartProducts'],[$_POST['bookid'],$_POST['quantity']]);
        }
        else if($_POST['action']==="remove"){
            unset($products[$_POST['bookid']]);
            $_SESSION['cartProducts']=array_diff($_SESSION['cartProducts'],$_POST['bookid']);
        }
   
    }
}
else{
    echo "its here";
}

?>