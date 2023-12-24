<!DOCTYPE html>
<html>
<head>
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

        h1 {
            margin-bottom: 20px;
        }

        form {
            width: 100%;
            max-width: 300px;
        }

        label, input {
            display: block;
            margin-bottom: 10px;
            color: rgb(7, 5, 5); /* Set text color to white */
        }

        input[type="submit"] {
            font-family:  Courier;
            background-color: #2b7f80;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border: 2px solid #0a0b0b;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
        include("connection.php");
        session_start();    
        echo "<h1>CONTEST SUCCESFULLY ADDED. UPDATE THE DATABASE</h1>";
        echo "<a href='http://localhost/phpmyadmin/index.php?route=/database/structure&db=project'>DB</a>";
        // Insert data into the table
        $conquery = "INSERT INTO contest (ID, Live) VALUES (3, 0)";
        $res = mysqli_query($conn, $conquery);

        // Check if the insertion was successful
        if ($res) {
            // Select and print the contents of the table
            $selectQuery = "SELECT * FROM contest";
            $selectRes = mysqli_query($conn, $selectQuery);

            if ($selectRes && mysqli_num_rows($selectRes) > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Live</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($selectRes)) {
                    echo "<tr>
                            <td>" . $row['ID'] . "</td>
                            <td>" . $row['Live'] . "</td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "No data in the table.";
            }
        } else {
            echo "Error inserting data into the table.";
        }
    ?>
    <a href="adminhome.php" class="button">Home</a>
</body>
</html>
