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
   
       
       
    }
}
else{
    echo "its here";
}

?>