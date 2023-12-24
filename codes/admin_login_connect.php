<?php
include("connection.php");
session_start();  
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_login_sub'])) 
{ 
    $ID = $_POST["id"];
    $pw = $_POST["pw"];
    $sql="SELECT * FROM `user` WHERE user_id='$ID' AND pw='$pw' and role='admin'";
    $query= mysqli_query($conn,$sql);
    if($query->num_rows > 0)
    {
        header("Location: adminhome.php");
    }
    else
    {
        echo 'Invalid username or password. Please try again';
    }
}
?>