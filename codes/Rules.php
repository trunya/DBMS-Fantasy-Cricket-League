<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy Cricket Rules</title>
    <style>
        body {
            font-family: 'Courier';
            margin: 0;
            padding: 0;
            background-color:rgb(2, 17, 104);
            color:rgb(163, 63, 63);
            background: rgb(1, 11, 64);
            border-radius: 40px;
            padding: 20px;
            margin: 30px;
            border: 10px solid rgb(155, 37, 37);

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


        h1 {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        h2 {
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        div {
            display: none;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        a.button {
            text-decoration: none;
            color: rgb(16, 15, 15);
            background-color:rgb(216, 88, 19) ;
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border: 2px solid rgb(3, 3, 3);
            border-radius: 5px;
            margin: 10px;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    <h1>Fantasy Cricket Rules</h1>

    <h2 onclick="toggleContent('rule1')">1. Team Formation</h2>
    <div id="rule1">
        <p>Each player creates a fantasy team by selecting a specific number of players, usually 11, from the pool of real cricket players participating in a particular match or series.</p>
    </div>

    <h2 onclick="toggleContent('rule2')">2. Player Selection</h2>
    <div id="rule2">
        <p>Users can choose players based on their performance, skills, and availability for a particular match or series.</p>
    </div>

    <h2 onclick="toggleContent('rule3')">3. Captain and Vice-Captain</h2>
    <div id="rule3">
        <p>Users can select a captain and vice-captain from their fantasy team. The captain usually earns double points, while the vice-captain earns 1.5 times the points scored.</p>
    </div>

    <h2 onclick="toggleContent('rule4')">4. Player Categories</h2>
    <div id="rule4">
        <p>Players are categorized into groups such as batsmen, bowlers, all-rounders, and wicket-keepers. Users must select a balanced team with a limited number of players from each category.</p>
    </div>

    <h2 onclick="toggleContent('rule5')">5. Points System</h2>
    <div id="rule5">
        <p><b>Batting Points:</b></p>
        <ul>
            <li>Run Scored: +1 point</li>
            <li>Boundary Bonus (4s): +1 point</li>
            <li>Six Bonus (6s): +2 points</li>
            <li>Half Century (50 runs): +8 points</li>
            <li>Century (100 runs): +16 points</li>
        </ul>
    </div>

    <!-- Repeat the structure for other rules -->

    <h2 onclick="toggleContent('rule6')">6. Deadline</h2>
    <div id="rule6">
        <p>Contest closes 10 minutes prior to the start of the match.</p>
    </div>

    <a href="home.php" class="button">Come back Home</a>

    <script>
        function toggleContent(ruleNumber) {
            var content = document.getElementById(ruleNumber);
            if (content.style.display === "none" || content.style.display === "") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>

</body>
</html>
