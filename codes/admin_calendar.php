<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Courier;
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

        h1,
        p,
        form {
            margin-bottom: 20px;
        }

        p {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
        }

        input[type="text"],
        input[type="checkbox"],
        input[type="submit"] {
            text-decoration: none;
            color: white;
            background-color: #2b8080;
            /* Light red background for the buttons */
            padding: 8px 16px;
            /* Adjusted padding for smaller buttons */
            text-align: center;
            font-size: 14px;
            /* Adjusted font size for smaller buttons */
            cursor: pointer;
            border: 2px solid rgb(18, 17, 17);
            /* White border for the buttons */
            border-radius: 5px;
            margin: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #2b8080;
            color: white;
        }
    </style>
</head>
<body>
    <?php
        include("connection.php");
        session_start();

        if (isset($_POST['add_cont'])) {
            $matchDate = mysqli_real_escape_string($conn, $_POST['matchDate']);
            $teamName1 = mysqli_real_escape_string($conn, $_POST['teamName1']);
            $teamName2 = mysqli_real_escape_string($conn, $_POST['teamName2']);
            $game = mysqli_real_escape_string($conn, $_POST['game']);

            $conquery = "INSERT INTO calendar (`Match_date`, `Team_name1`, `Team_name2`, `game`) VALUES ('$matchDate', '$teamName1', '$teamName2', '$game')";
            $res = mysqli_query($conn, $conquery);

            if ($res) {
                echo "Event added successfully.";
            } else {
                echo "Error adding event.";
            }
        }

        // Fetch and display calendar data
        $selectQuery = "SELECT * FROM calendar";
        $selectRes = mysqli_query($conn, $selectQuery);
    ?>

    <h1>Calendar Events</h1>

    <?php
        // Display calendar data in a table
        if ($selectRes && mysqli_num_rows($selectRes) > 0) {
            echo "<table>
                    <tr>
                        <th>Match Date</th>
                        <th>Team Name 1</th>
                        <th>Team Name 2</th>
                        <th>Game</th>
                    </tr>";

            while ($row = mysqli_fetch_assoc($selectRes)) {
                echo "<tr>
                        <td>" . $row['Match_date'] . "</td>
                        <td>" . $row['Team_name1'] . "</td>
                        <td>" . $row['Team_name2'] . "</td>
                        <td>" . $row['game'] . "</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No calendar events available.";
        }
    ?>

    <form action="" method="POST">
        <label for="matchDate">Match Date:</label>
        <input type="text" id="matchDate" name="matchDate" required>

        <label for="teamName1">Team Name 1:</label>
        <input type="text" id="teamName1" name="teamName1" required>

        <label for="teamName2">Team Name 2:</label>
        <input type="text" id="teamName2" name="teamName2" required>

        <label for="game">Game:</label>
        <input type="text" id="game" name="game" required>

        <input type="submit" id="add" name="add_cont" value="Add"/>
    </form>
    <a href="adminhome.php" class="button">Home</a>
</body>
</html>
