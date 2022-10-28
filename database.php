<?php
    
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    $servername = "localhost";
    $user_Name  = "root";
    $password   = "";
    $dbname     ="tasks";
$conn = mysqli_connect($servername,$user_Name,$password,$dbname);

  if (!$conn){
    die ("connection failed: " . mysqlo_connect_error());
  }
?>