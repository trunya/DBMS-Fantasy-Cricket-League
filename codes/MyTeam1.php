<?php
include("connection.php");
session_start();    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selected_players']) && count($_POST['selected_players']) == 11) {
        $selectedPlayers = $_POST['selected_players'];  
        $Team_name = $_POST['team_name'];    
        $user_id = $_SESSION['user_id'];
        //echo $user_id;
        $values = array();
        foreach ($selectedPlayers as $player) {
            // Fetch Total_points for each player
            $Total_points_query = "SELECT Total_points FROM player_data WHERE player_name='$player'";
            $res = mysqli_query($conn, $Total_points_query);

            if ($res && mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $a = $row['Total_points'];
                
                // Add the values to the array for the INSERT query
                $values[] = "('$user_id', '$player', '$Team_name', '$a')";
            } else {
                echo "Error fetching Total_points for player: $player<br>";
            }
        }

        if (!empty($values)) {
            $teamInsertQuery = "INSERT INTO Myteams (user_id, player_name, Team_name, points) VALUES ";
            $teamInsertQuery .= implode(', ', $values);

            if (mysqli_query($conn, $teamInsertQuery)) {
                echo "<h1>Your selected team:</h1>";
                foreach ($selectedPlayers as $player) {
                    echo $player . "<br>";
                }
                echo "<br><br>";
                //echo "Your selected team has been saved.";
            } else {
                echo "Error inserting data into Myteams table: " . mysqli_error($conn);
            }
        } else {
            echo "No data to insert.";
        }
    } else {
        echo '<script>alert("You must select exactly 11 players to proceed.")</script>';
        //echo "Please select exactly 11 players.";
        echo '<a href="contest1.php" class="button">Select</a>';  
        exit();
    }
} else {
    header("Location: home.php");
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Team Form</title>
    <style>
        body {
            font-family: 'Courier';
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 85vh;
            position: relative;
            color: red;
            background-color: rgb(10, 17, 84);
            margin: 0;
            border-radius: 40px;
            padding: 20px;
            margin: 30px;
            border: 10px solid rgb(148, 12, 12);
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
    <form method="post" action="TeamCalc.php">
        <!-- Hidden input fields to store selected players -->
        <?php foreach ($selectedPlayers as $player) : ?>
            <input type="hidden" name="selected_players[]" value="<?php echo $player; ?>">
        <?php endforeach; ?>

        <br>
        <label for="captain">Captain:</label>
        <select name="captain" id="captain">
            <?php
            foreach ($selectedPlayers as $player) {
                echo "<option value=\"$player\">$player</option>";
            }
            ?>
        </select>

        <label for="vice_captain">Vice-Captain:</label>
        <select name="vice_captain" id="vice_captain">
            <?php
            // Populate options dynamically based on available players excluding the captain
            foreach ($selectedPlayers as $player) {
                if ($player != $captain) {
                    echo "<option value=\"$player\">$player</option>";
                }
            }
            ?>
        </select>
        <br>
        <br>
        <input type="submit" id="myT" name="myT" value="Make My Team" style="justify:centre";>
    </form>
</body>
</html>