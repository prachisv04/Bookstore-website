<?php
session_start();

if(isset($_SESSION['cartProducts'])){   
    echo print_r( $_SESSION['cartProducts']);
}
?>