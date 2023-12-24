

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
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h2>USER INFO</h2>
    <?php
    include("connection.php");
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM user WHERE user_id=$user_id"; 
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>phone</th><th>Date of Birth</th><th>User Name</th>";
        
        while ($row = mysqli_fetch_assoc($result)) {
           echo "<tr><td>" . $row["phone"] . "</td><td> " . $row["dob"] . "</td><td> " . $row["name"] . "</td></tr>";
        }        
        echo "</table>";
    } else {
        echo "No data found.";
    }
    echo '<a href="home.php" class="button">Home</a>';
?>

        
</body>
</html>