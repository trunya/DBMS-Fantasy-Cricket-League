<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <style>
        body {
            font-family: 'Courier';
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 87vh;
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
       

        th, td {
            border: 1px solid red;
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
            cursor: pointer; /* Add cursor style for better user experience */
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h2>CALENDAR</h2>
    <?php
    //calender DB will contain list of all matches
    include("connection.php");
    session_start();  
    $sql1 = "SELECT formatted_date, Team_name1, Team_name2
    FROM (
        SELECT DATE_FORMAT(Match_date, '%d/%m') AS formatted_date, Team_name1, Team_name2
        FROM Calendar
    ) AS nested_query;
    ";
    $result = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result) > 0) {
        echo "<Calendar>";
        echo "<table>";
        //echo "<table style='width: 30%; height:5%; margin-top: 20px; background-color: rgb(10, 17, 84); border-collapse: collapse; border: 2px solid red;'>";
        echo "<tr><th>Match date </th><th> Team 1 </th><th> Team 2</th></tr><br><br>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td> " . $row["formatted_date"] . " </td><td> " . $row["Team_name1"] . " </td><td> " . $row["Team_name2"] . " </td></tr>";
        }
        echo "</Calendar>";
        echo "</table>";
    }
    else{
        echo "No data found";
    }
    //echo 'Come back <a href="home.php">Home</a>';
    echo '<a href="home.php" class="button">Home</a>';
    mysqli_close($conn);
?>
</body>
</html>