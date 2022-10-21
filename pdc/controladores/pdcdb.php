<?php 

try {
     $conex = mysqli_connect("localhost","root","","muni"); 
}catch(PDOException $e){

    die('Connected failed: '.$e ->getMessage());
}

?>