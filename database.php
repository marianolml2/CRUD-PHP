<?php

try {

    $con = mysqli_connect("localhost","root","","php_login_database"); 

}catch(PDOException $e){

    die('Connected failed: '.$e ->getMessage());

}

?>