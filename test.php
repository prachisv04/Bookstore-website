<?php

// get array process sql return echo statement to print on page
// whatever we will echo on this page will be sent back to requesting page

echo "on test page to check";

if(isset($_POST['categorylistdata'])){
    $checked_arr = $_POST['categorylistdata'];
    $array = explode(",",$checked_arr);
    print_r($array);
 }
?>