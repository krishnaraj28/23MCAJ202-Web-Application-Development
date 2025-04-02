<!DOCTYPE html>
<html>
<head>
    <title>Indian Cricket Players</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h2 {
            color: #333;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color:rgb(19, 75, 7);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color:rgb(72, 3, 70);
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Enter Indian Cricket Players</h2>
    <form method="post">
        <input type="text" name="players" placeholder="E.g., Virat Kohli, Rohit Sharma, MS Dhoni" required>
        <br>
        <input type="submit" name="submit" value="Display Players">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Get input and convert into an array
        $playerInput = $_POST['players'];
        $players = array_map('trim', explode(',', $playerInput)); // Trim spaces and split by comma

        if (!empty($players)) {
            echo "<h2>List of Indian Cricket Players</h2>";
            echo "<table>
                    <tr>
                        <th>Sl. No</th>
                        <th>Player Name</th>
                    </tr>";

            foreach ($players as $index => $player) {
                echo "<tr>
                        <td>" . ($index + 1) . "</td>
                        <td>$player</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color:red;'>Please enter at least one player name.</p>";
        }
    }
    ?>
</div>

</body>
</html>
