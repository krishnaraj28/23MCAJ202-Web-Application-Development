<?php
include 'connection.php';

$message = "";
$searchResults = "";

// Add book section
if (isset($_POST['add'])) {
    $accession_number = $_POST['accession_number'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $authors = mysqli_real_escape_string($conn, $_POST['authors']);
    $edition = mysqli_real_escape_string($conn, $_POST['edition']);
    $publisher = mysqli_real_escape_string($conn, $_POST['publisher']);

    $sql = "INSERT INTO books (accession_number, title, authors, edition, publisher)
            VALUES ('$accession_number', '$title', '$authors', '$edition', '$publisher')";

    if (mysqli_query($conn, $sql)) {
        $message = "<div class='success'>Book added successfully.</div>";
    } else {
        $message = "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
    }
}

// Search book section
if (isset($_POST['search'])) {
    $search_title = mysqli_real_escape_string($conn, $_POST['search_title']);
    $sql = "SELECT * FROM books WHERE title LIKE '%$search_title%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $searchResults = "<h2>Search Results for '$search_title'</h2>
        <table>
            <tr>
                <th>Accession No</th>
                <th>Title</th>
                <th>Authors</th>
                <th>Edition</th>
                <th>Publisher</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResults .= "<tr>
                <td>{$row['accession_number']}</td>
                <td>{$row['title']}</td>
                <td>{$row['authors']}</td>
                <td>{$row['edition']}</td>
                <td>{$row['publisher']}</td>
            </tr>";
        }
        $searchResults .= "</table>";
    } else {
        $searchResults = "<div class='no-result'>No books found with the given title.</div>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Book Entry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            margin: 0 auto 30px;
            border-radius: 8px;
            width: 80%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"], input[type="number"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            background-color: #5c8df6;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3d6de0;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #5c8df6;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .no-result, .success, .error {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }

        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>

<h2>Add New Book</h2>
<form method="post">
    <label>Accession Number:</label><br>
    <input type="number" name="accession_number" min="1" required><br>

    <label>Title:</label><br>
    <input type="text" name="title" required><br>

    <label>Authors:</label><br>
    <input type="text" name="authors" required><br>

    <label>Edition:</label><br>
    <input type="text" name="edition" required><br>

    <label>Publisher:</label><br>
    <input type="text" name="publisher" required><br>

    <input type="submit" name="add" value="Add Book">
</form>

<?php echo $message; ?>

<h2>Search Book by Title</h2>
<form method="post">
    <input type="text" name="search_title" placeholder="Enter book title" required>
    <input type="submit" name="search" value="Search">
</form>

<br>
<?php echo $searchResults; ?>

</body>
</html>

