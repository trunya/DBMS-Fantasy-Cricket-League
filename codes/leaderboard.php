<?php
    include("connection.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <style>
        
        body {
            font-family: 'Courier';
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 88vh;
            position: relative;
            background-color: rgb(2, 7, 51);
            margin: 30;
            
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
            opacity: 0.15; /* Adjust the opacity level (0.0 to 1.0) */
            z-index: -1;
            border-radius: inherit;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid rgb(186, 179, 179);
            padding: 8px;
            text-align: left;
        }

        a.button {
            background-color: rgb(194, 25, 25);
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h2>LEADERBOARD</h2>

    <?php
        $sql = "SELECT user_name, Team_name, user_id, MAX(Points) as max_points FROM game GROUP BY user_name, Team_name, user_id ORDER BY max_points DESC"; 
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>User Name</th><th>Team Name</th><th>Player ID</th><th>Total Points</th>";

            $winnersCount = 0;
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["user_name"] . "</td><td> " . $row["Team_name"] . "</td><td> " . $row["user_id"] . "</td><td> " . $row["max_points"] . " </td></tr>";
                $winnersCount++;
            }

            echo "</table>";

            // Check if there is only one winner
            if ($winnersCount == 1) {
                // Move back to the beginning of the result set to access the first row
                mysqli_data_seek($result, 0);
                $winnerRow = mysqli_fetch_assoc($result);
                echo "<p>Congratulations, " . $winnerRow["user_name"] . "! You are the winner of today's contest!</p>";
            } else {
                echo "<p>Multiple winners today! Check out the leaderboard.</p>";
            }
        } else {
            echo "No data found.";
        }
    ?>

    <p>Come back <a href="home.php" class="button">Home</a></p>

</body>
</html>