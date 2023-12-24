<?php
include("connection.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_sub'])) 
{    
    if(isset($_POST['name'])&& isset($_POST['pw']))
    {        
        $name = $_POST["name"];
        $pw = $_POST["pw"];

        $ge="SELECT user_id,name FROM `user` WHERE name='$name' and role='user'";
        $result=mysqli_query($conn, $ge);        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $sql="SELECT * FROM `user` WHERE name='$name' AND pw='$pw'";
        $query= mysqli_query($conn,$sql);
        if($query->num_rows > 0)
        {
            $_SESSION['user_id']=$row["user_id"];
            $_SESSION['usern']=$row['name'];
            header("Location: home.php");
        }
        else
        {
            header("Location: login.php?warning=true");
        }
    }
}
?>