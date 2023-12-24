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

        div {
            padding: 20px;
        }

        p {
            margin: 20px;
        }

        a {
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
    <div>
        <h1>ADMIN HOME PAGE</h1>
        <p>View Leaderboard <a href="admin_leaderboard.php">View</a></p>
        <p>Check User Info <a href="userinfo.php">Check</a></p>
        <p>Add contest <a href="admin_contest.php">Contests</a></p>
        <p>Schedule Match <a href="admin_calendar.php">Calendar</a></p>
        <p>View Database <!--a href="add your phpMyadmin link here">DB</a--></p>
        <p>Logout <a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
