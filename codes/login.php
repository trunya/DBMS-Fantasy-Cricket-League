<!DOCTYPE html>
<html>
<head>
<title>Login</title>
    <style>
        body {
            font-family: 'Courier';
            margin: 0;
            padding: 0;
            background-color:rgb(2, 17, 104);
            color:rgb(174, 42, 42);
            background: rgb(1, 11, 64);
            border-radius: 40px;
            padding: 20px;
            margin: 50px;
            border: 10px solid rgb(148, 12, 12);
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

        header {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        header h1 {
            margin: 0;
        }

        header img {
            max-height: 50px; /* Adjust the value as needed */
            margin-right: 10px;
        }

        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        form {
            width: 100%;
            max-width: 300px;
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: rgb(208, 47, 7);
            color: rgb(20, 5, 5);
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border: 2px solid #012d3c;
            border-radius: 5px;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .warning {
            color: red;
        }
    </style>
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo" >
        <h1>Login</h1>
    </header>

    <div class="login-container">
        <form action="login_connect.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter username" required/><br><br>

            <label for="password">Please enter your password:</label>
            <input type="password" id="pw" name="pw" placeholder="Enter Password" required/><br><br>

            <?php
            if (isset($_GET['warning'])) {
                echo '<p class="warning">Incorrect password. Please try again.</p>';
            }
            ?>

            <input type="submit" id="login_sub" name="login_sub" value="Login"/>
        </form>

        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        <p>Admin Login <a href="admin.php">Click here</a></p>
    </div>
</body>
</html>