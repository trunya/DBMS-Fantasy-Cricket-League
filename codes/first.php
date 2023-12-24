<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy Cricket Game</title>
    <style>
        body {
            font-family:  Courier;
            margin: 0;
            padding: 0;
            background-color: rgb(139, 26, 26);            
            color: #333;
        }

        header {
            background-color: rgb(1, 1, 1);
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header img {
            max-width: 100%;
            height: auto;
        }

        section {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background: linear-gradient(rgb(183, 187, 210), rgb(183, 187, 210));
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
        }

        h1, h2, p {
            text-align: center;
        }

        .teams {
            display: flex;
            justify-content: space-around;
        }

        .team {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .team:hover {
            background-color: #f2f2f2;
        }

        .btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #0d344b;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>     
  
        <img src="logo.png" alt="Cricket Logo" width="400" height="300">
        <h1>Fantasy Cricket League</h1>
    </header>

    <section>
        <h2>Welcome to Fantasy Cricket!</h2>
        <p>Select your teams and create your dream lineup.</p>
        <a href="signup.php" class="btn">Sign Up / Log In</a>
    </section>
</body>
</html>
