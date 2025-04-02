<!DOCTYPE html>
<html>
<head>
    <title>Student Name Sorting</title>
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
            max-width: 800px;
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
            background-color:rgb(21, 2, 82);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        pre {
            background: #eee;
            padding: 10px;
            border-radius: 5px;
            text-align: left;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Enter Student Names</h2>
    <form method="post">
        <input type="text" name="students" placeholder="E.g., Rahul, Aditi, Vikram" required>
        <br>
        <input type="submit" name="submit" value="Sort Names">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Get input and convert into an array
        $studentInput = $_POST['students'];
        $students = explode(',', str_replace(' ', '', $studentInput)); // Remove spaces and split by comma

        // Display Original Array
        echo "<h3>Original List:</h3><pre>";
        print_r($students);
        echo "</pre>";

        // Sort in Ascending Order
        asort($students);
        echo "<h3>Ascending Order:</h3><pre>";
        print_r($students);
        echo "</pre>";

        // Sort in Descending Order
        arsort($students);
        echo "<h3>Descending Order:</h3><pre>";
        print_r($students);
        echo "</pre>";
    }
    ?>
</div>

</body>
</html>
