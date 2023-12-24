<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTEST 1 </title>
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
echo "<style>table { float: left; margin-right: 20px; }</style>";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    //echo "$user_id";
} else {
    echo "User_id not set in session.";
}
$maxPlayers = 11;

$sql1="SELECT 
    pd.Player_name,
    pd.Team_name,
    pd.Strike_rate,
    pd.Economy, 
    pd.Role
FROM     
    player_data pd
JOIN     
    calendar c ON (pd.Team_name = c.Team_name1) 
WHERE c.Match_date =CURDATE()";


$result1 = mysqli_query($conn, $sql1);
//echo "<h1> CONTEST 1</h1>";
echo '<h1 style="color: red;">CONTEST 1</h1>';
//echo "<title 'CONTEST1' /title>";
echo "Today's match is between the following teams<br><br>";
echo "<p style='align-items: center;'>Select 11 players from both teams: </p>";
echo "<form action='MyTeam1.php' method='post'>";
echo '<label for="team_name">Enter Your Team Name:</label>';
echo '<input type="text" id="team_name" name="team_name" required>';
echo '<br><br>';
echo "<table border='1'>";
echo "<tr><th>Player Name</th><th>Team Name</th><th>Strike Rate</th><th>Economy</th><th>Role</th><th>Select</th></tr>";
while ($row = mysqli_fetch_assoc($result1)) { 
    
    $playerName = $row['Player_name'];
    $teamName = $row['Team_name'];
    $strikeRate = $row['Strike_rate'];
    $Economy = $row['Economy'];
    $Role = $row['Role'];
    
    echo "<tr>";
    
    echo "<td>$playerName</td><td>$teamName</td><td>$strikeRate</td><td>$Economy</td><td>$Role</td>";
    echo "<td><input type='checkbox' name='selected_players[]' value='$playerName'></td>";
    echo "</tr>";
}
echo "</table>";


$sql2="SELECT 
    pd.Player_name,
    pd.Team_name,
    pd.Strike_rate,
    pd.Economy, 
    pd.Role
FROM     
    player_data pd
JOIN     
    calendar c ON (pd.Team_name = c.Team_name2) 
WHERE c.Match_date =CURDATE()";
$result2 = mysqli_query($conn, $sql2);  
echo "<table border='1'>";
echo "<tr><th>Player Name</th><th>Team Name</th><th>Strike Rate</th><th>Economy</th><th>Role</th><th>Select</th></tr>";

while ($row = mysqli_fetch_assoc($result2)) { 
    $playerName = $row['Player_name'];
    $teamName = $row['Team_name'];
    $strikeRate = $row['Strike_rate'];
    $Economy = $row['Economy'];
    $Role = $row['Role'];

    echo "<tr>";
    echo "<td>$playerName</td><td>$teamName</td><td>$strikeRate</td><td>$Economy</td><td>$Role</td>";
    echo "<td><input type='checkbox' name='selected_players[]' value='$playerName'></td>";
    echo "</tr>";
}
echo "</table>";
echo '<br><br>';
echo "<input type='submit' value='Make Team'></form>";
echo "</div>";
?>
</body>
</html>