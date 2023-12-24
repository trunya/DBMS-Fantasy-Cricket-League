<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
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
            margin: 30px;
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

    </style>
    <script>
        function checkAge() {
            var dobInput = document.getElementById("dob");
            var dobValue = dobInput.value;
            
            if (dobValue) {
                var dobDate = new Date(dobValue);
                var currentDate = new Date();
                var age = currentDate.getFullYear() - dobDate.getFullYear();
                
                if (currentDate.getMonth() < dobDate.getMonth() || (currentDate.getMonth() === dobDate.getMonth() && currentDate.getDate() < dobDate.getDate())) {
                    age--;
                }
                
                if (age < 18) {
                    alert("You must be at least 18 years old to proceed.");
                    dobInput.value = "";
                }
            }
        }
    </script>
</head>
<body>
    <center>
    <h1>Sign Up</h1>
    <form action="signup_connect.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Name" required/><br><br>
        You will be able to login with your unique id being your name. <br><br>

        <label for="phone">Phone Number:</label>
        <input type="phone" id="phone" name="phone" placeholder="Enter Phone number" required/><br><br>

        <label for="password">Please enter your password:</label>
        <input type="password" id="pw" name="pw" placeholder="Enter Password" required/><br><br>

        <label for="passwordCheck">Re-enter your password:</label>
        <input type="password" id="pw2" name="pw2" placeholder="Enter Password again" required/><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" placeholder="Enter Birthdate" required onchange="checkAge()"/><br><br>

        <label for="agree">I understand and agree that this company is not responsible for any sort of addiction/gambling:</label>
        <input type="checkbox" id="c" name="c" required/><br><br>
        
        <input type="submit" id="signup_sub" name="signup_sub" value="Sign UP"/>
    </form>
    <p>Already have an account? <a href="login.php">Log in here</a></p>
</center>
</body>
</html>