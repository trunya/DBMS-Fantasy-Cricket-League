<?php
  $username="root";
  $servername="localhost";
  $password="****"; //add your password
  $dbname = "Project";
  $conn= mysqli_connect($servername,$username,$password,$dbname);
  //echo("connected");
  if($conn->connect_error){
    echo("Connection Failed");
  }
?>