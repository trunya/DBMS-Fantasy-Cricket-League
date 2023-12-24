<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
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

        h1, p, a {
            position: relative;
            z-index: 1;
        }

        p {
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: rgb(19, 14, 14);
            background-color: rgb(206, 41, 4);
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border: 2px solid rgb(22, 19, 19);
            border-radius: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>
        <h1>Home Page</h1>
        <p>View Leaderboard <a href="leaderboard.php">View</a></p>
        <p>Join a contest now! <a href="contest.php">Contests</a></p>
        <p>View Calendar <a href="calendar.php">Calendar</a></p>
        <p>Confused about the rules? <a href="Rules.php">Check it out</a></p>
        <p>My User <a href="user.php">GO</a></p>
    </body>
</html>
