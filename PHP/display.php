<?php
include 'connection.php'; // Include connection

$sql = "SELECT id, Name, roll_no FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h2>Student Details</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll No</th>
            </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["Name"]) . "</td>
                <td>" . htmlspecialchars($row["roll_no"]) . "</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "No data found.";
}

$conn->close();
?>

</body>
</html>
