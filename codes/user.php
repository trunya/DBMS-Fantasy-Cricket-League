<?php
    include("connection.php");
    session_start();        
    $name = $_SESSION["usern"];
    $user_id = $_SESSION['user_id'];
$sql="SELECT * FROM `user` WHERE name='$name'";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        body {
            text-align: center;
            font-family: 'Courier', monospace;
            margin: 0;
            padding: 0;
            background-color: rgb(2, 12, 70);
            color: rgb(146, 23, 23);
            box-sizing: border-box;
            border: 10px solid rgb(118, 9, 9);
            border-radius: 40px;
            padding: 20px;
            margin: 10px;
        
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/Project/cri.png') no-repeat center center fixed;
            background-size: cover;
            opacity: 0.15; /* Adjust the opacity level (0.0 to 1.0) */
            z-index: -1;
            border-radius: inherit;
}

        h1 {
            color: #c42f2f;
        }

        .button-container {
            margin-top: 20px;
        }

        .button {
            font-family: 'Courier', monospace;
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            background-color: rgb(188, 55, 55);
            color: white;
            border: none;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
        }

        #logout-btn {
            font-family: 'Courier', monospace;
            background-color: #165d98;
        }
    </style>
</head>
<body>
    <h1>User Information</h1>
    <p>Thank you for playing.</p>

    <div class="button-container">
        <!--button class="button" onclick="location.href='#'">My Contests</button-->
        <button class="button" onclick="location.href='ViewTeam.php'">My Team</button>
        <button class="button" onclick="location.href='MyInfo.php'">My Information</button>
        <button class="button" onclick="location.href='Home.php'">Home</button>
        <button id="logout-btn" class="button" onclick="location.href='logout.php'">Log Out</button>
    </div>
</body>
</html>
