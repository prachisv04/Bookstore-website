<?php
error_reporting(0);
$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'bookstore';



if(!$conn = mysqli_connect($servername,$username,$password,$databasename)){
   ?>
   <img src="img/503.png" alt="error page" style="width:98vw; height:98vh;">
   <?php
    die();
}

?>