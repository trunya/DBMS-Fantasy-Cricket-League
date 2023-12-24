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
            height: 88vh;
            position: relative;
            color: red;
            background-color: rgb(10, 17, 84);
            margin: 0;
            border-radius: 60px;
            padding: 20px;
            color: rgb(194, 63, 63);
            border: 15px solid rgb(171, 51, 57);
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

        a.button {
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

<?php
include("connection.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['myT'])) {
    $selectedPlayers = $_POST['selected_players'];
    //$Total_points=$_POST['Total_points'];
    $captain = $_POST['captain'];
    $viceCaptain = $_POST['vice_captain'];
    //echo $row['Total_points'],"<br>";


    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['usern'];
    $pointsQuery = "SELECT player_name, points, Team_name FROM myteams WHERE user_id = '$user_id'";
    $pointsResult = mysqli_query($conn, $pointsQuery);

    $playerPoints = array();
    while ($row = mysqli_fetch_assoc($pointsResult)) {
        $playerPoints[$row['player_name']] = $row['points'];
        $Team_name=$row['Team_name'];
    }

    $totalPoints = 0;
    foreach ($selectedPlayers as $player) {
        $multiplier = 1.0; 
        if ($player == $captain) {
            $multiplier = 2.0; 
        } elseif ($player == $viceCaptain) {
            $multiplier = 1.5; 
        }
        if (isset($playerPoints[$player])) {
            $totalPoints += $playerPoints[$player] * $multiplier;
        }
    }


    $insertTotalPointsQuery = "INSERT INTO game (user_name,Team_name, user_id, points) VALUES ('$user_name','$Team_name','$user_id', '$totalPoints')";
    mysqli_query($conn, $insertTotalPointsQuery);
    echo "<h1>Final points after match </h1>";
    echo "<table style='width: 25%; height:5%; margin-top: 20px; background-color: rgb(10, 17, 84); border-collapse: collapse; border: 2px solid red;'>";
    echo "<tr><th style='padding: 15px; text-align: centre; border: 1px solid red; background-color: #af4c4c; color: white;'>Player Name</th><th style='padding: 15px; text-align: centre; border: 1px solid red; background-color: #af4c4c; color: white;'>Points</th>";
    foreach ($selectedPlayers as $player) {
        echo "<tr><td style='text-align: centre;'>$player";
        if ($player == $captain) {
            echo " (C)</td>";
        }
        if ($player == $viceCaptain) {
            echo " (VC)</td>";
        }
        if (isset($playerPoints[$player])) {
            echo  "<td style='text-align: centre;'>$playerPoints[$player]</td>";
        } else {
            echo "<td>N/A</td>"; 
        }

        echo "<br>";
    }
    echo "<h2>Total Points: " . $totalPoints."<br></h2>";
    echo "</table>";
}

echo "<br>";
//echo "We call a stored procedure to check if each team has atleast 1 batsman, bowler and wicketkeeper to be a well rounded team";

echo "<br>";
$sql = "CALL CheckTeamRole('$Team_name')";
$result = $conn->query($sql);

if ($result) {
    // Loop through the result set to the last row
    while ($row = $result->fetch_assoc()) {
        $lastRow = $row;
    }

    // Check if the key 'Result' exists in the last row
    if (isset($lastRow['Result'])) {
        echo "<h4>Result from stored procedure: " . $lastRow['Result'] ."</h4>";
    } else {
        echo "Key 'Result' is not present in the last row.";
    }
} else {
    echo "Error calling stored procedure: " . $conn->error;
}
echo "<br>";

echo '<a href="home.php" class="button">Home</a>';
?>
</body>
</html>