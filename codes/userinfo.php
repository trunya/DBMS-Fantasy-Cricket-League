
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

    <h2>USER INFO</h2>
    <?php
    include("connection.php");
    session_start();
    $sql = "SELECT * FROM user WHERE role='user'"; 
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Phone</th><th>Date of Birth</th><th>User Name</th>";
        
        while ($row = mysqli_fetch_assoc($result)) {
           echo "<tr><td>" . $row["phone"] . "</td><td> " . $row["dob"] . "</td><td> " . $row["name"] . "</td></tr>";
        }        
        echo "</table>";
    } else {
        echo "No data found.";
    }
    echo '<a href="adminhome.php" class="button">Home</a>';
?>

        
</body>
</html>