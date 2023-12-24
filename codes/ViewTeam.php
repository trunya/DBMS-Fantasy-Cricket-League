<?php 
    include("connection.php");
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM MyTeams WHERE user_id=$user_id"; 
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Team</title>
    <style>
        body {
            font-family: 'Courier';
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 97vh;
            position: relative;
            color: red;
            background-color: rgb(10, 17, 84);
            margin: 0;
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
    </style>
</head>
<body>

<h1>View Team</h1>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table style='width: 30%; height:5%; margin-top: 20px; background-color: rgb(10, 17, 84); border-collapse: collapse; border: 2px solid red;'>";
        //echo "<table style='width: 25%; margin-top: 20px; background-color: rgb(10, 17, 84); border-collapse: collapse; border: 2px solid red;'>";
        echo "<tr><th style='padding: 15px; text-align: left; border: 1px solid red; background-color: #af4c4c; color: white;'>Player Name</th><th style='padding: 15px; text-align: left; border: 1px solid red; background-color: #af4c4c; color: white;'>Team Name</th><th style='padding: 15px; text-align: left; border: 1px solid red; background-color: #af4c4c; color: white;'>Points</th>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td style='padding: 15px; text-align: left; border: 1px solid red; color:white;'>" . $row["Player_name"] . "</td><td style='padding: 15px; text-align: left; border: 1px solid red;color:white;'>" . $row["Team_name"] . "</td><td style='padding: 15px; text-align: left; border: 1px solid red; color:white;'>" . $row["points"] . "</td></tr>";
        }        
        echo "</table>";
    } else {
        echo "<p>No data found.</p>";
    }
    echo '<a href="home.php" class="button">Home</a>';
?>

</body>
</html>