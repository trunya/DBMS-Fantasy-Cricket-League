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
            font-family:  Courier;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 88vh;
            background: rgb(241, 241, 245);
            text-align: center;
            color: rgb(4, 4, 4);
            border-radius: 20px;
            padding: 20px;
            margin: 10px;
            border: 10px solid rgb(4, 0, 0);
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/Project/ball.jpeg') no-repeat center center fixed;
            background-size: cover;
            opacity: 0.35; /* Adjust the opacity level (0.0 to 1.0) */
            z-index: -1;
            border-radius: inherit;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        a.button {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            border: 2px solid #080d0f; /* Light blue border for the buttons */
            border-radius: 5px;
            display: inline-block;
            background-color: #2b7a80;
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
        } else {
            echo "No data found.";
        }
    ?>

    <p>Come back <a href="adminhome.php" class="button">Home</a></p>

</body>
</html>