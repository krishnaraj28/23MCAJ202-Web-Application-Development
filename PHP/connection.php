<?php
$host = "localhost";       // Host name
$username = "root";        // Database username
$password = "";            // Database password
$database = "mca_lab";     // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
