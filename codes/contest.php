<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Courier';
            margin: 0;
            padding: 0;
            background-color: rgb(2, 17, 104);
            color: rgb(177, 63, 63);
            background: rgb(1, 11, 64);
            border-radius: 40px;
            padding: 20px;
            margin: 10px;
            border: 10px solid rgb(148, 12, 12);
            text-align: center; /* Center-align text */

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

        h1, p {
            margin-bottom: 100px;
        }

        a {
            text-decoration: none;
            color: rgb(244, 237, 237);
            background-color: rgb(206, 65, 65);
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border: 2px solid rgb(1, 1, 1);
            border-radius: 5px;
            margin: 5px;
        }

        .join-buttons {
            display: flex;
            justify-content: space-around;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Available Contests</h1>
    <div class="join-buttons">
        <p>Contest 1<br><a href="contest1.php">Join</a></p>
        <p>Contest 2<br><a href="contest2.php">Join</a></p>
    </div>
    Come back <a href="home.php" class='button'>Home</a>
</body>
</html>
