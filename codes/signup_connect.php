<?php
include("connection.php");
session_start();  

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup_sub'])) 
{
    if(isset($_POST['pw'])&& isset($_POST['name']))
    {        
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $pw = $_POST["pw"];
        $dob= $_POST["dob"];

        $sql="INSERT INTO `user` (`name`,`phone`,`pw`,`dob`,`role`) VALUES ('$name','$phone','$pw',STR_TO_DATE('$dob','%Y-%m-%d'),'user')";
        $query= mysqli_query($conn,$sql);
        if($query)
        {
            header("Location: login.php");
            echo 'Entry success';
        }
        else
        {
            echo 'Entry error';
        }
    }
}
$conn -> close()
?>