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
    <div>
        <h1>Admin Login</h1>
        <form action="admin_login_connect.php" method="POST">
            <label for="ID">ID:</label>
            <input type="text" id="id" name="id" placeholder="Enter Admin ID" required/><br>

            <label for="password">Password:</label>
            <input type="password" id="pw" name="pw" placeholder="Enter Password" required/><br>

            <input type="submit" id="admin_login_sub" name="admin_login_sub" value="Login"/>
        </form>
    </div>
</body>
</html>
