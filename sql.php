<?php
    
$servername="localhost";
$username="root";
$password="";
$dbname="agriculture_db";
$conn = mysqli_connect($servername, $username, $password, $dbname);
  
    if(!$conn){
        echo 'Connection error' . mysqli_connect_error();
    } 
?>


