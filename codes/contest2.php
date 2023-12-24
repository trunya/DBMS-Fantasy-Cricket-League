<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW CONTEST</title>
    <style>
        
        body {
            font-family: 'Courier';
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 83vh;
            position: relative;
            color: white;
            background-color: rgb(10, 17, 84);
            margin: 0;
            border-radius: 40px;
            padding: 20px;
            margin: 20px;
            border: 10px solid rgb(155, 37, 37);
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
            opacity: 0.15;
            z-index: -1;
            border-radius: inherit;
        }

        h1 {
            margin-bottom: 20px;
            margin-top:5px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: red; 
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        form {
            color: red;
        }
        input{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }
    </style>
</head>
<body>

<?php
include("connection.php");
session_start();
echo "<h1>NEW CONTEST</h1>";
echo "<h2>Hang in there, this contest will be updated soon!</h2>";
echo '<a href="home.php" class="button">Home</a>';
?>
</body>
</html>