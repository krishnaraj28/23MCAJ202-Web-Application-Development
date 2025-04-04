<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>

<?php
$name = $username = $email = "";
$password = $confirmPassword = "";
$nameErr = $usernameErr = $emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Full Name Validation
    if (empty($_POST["name"])) {
        $nameErr = "Full Name is required";
    } else {
        $name = $_POST["name"];
    }

    // Username Validation
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = $_POST["username"];
    }

    // Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail.com$/", $_POST["email"])) {
        $emailErr = "Please enter a valid Gmail address";
    } else {
        $email = $_POST["email"];
    }

    // Password Validation
    if (empty($_POST["password"]) || empty($_POST["confirmPassword"])) {
        $passwordErr = "Both password fields are required";
    } elseif ($_POST["password"] !== $_POST["confirmPassword"]) {
        $passwordErr = "Passwords do not match";
    } else {
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
    }

    // If no errors, show success message
    if (empty($nameErr) && empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
        echo "<script>
            alert('Registration Successful!\\nName: $name\\nUsername: $username\\nEmail: $email');
        </script>";
    }
}
?>

<div class="body">
    <div class="form">
        <center>
            <h1>Register</h1><br>
            <p>Please fill in this form to create an account...</p>
        </center>
        <div class="post">
            <form method="POST">
                Full Name: <input type="text" name="name" value="<?php echo $name; ?>" required>
                <span style="color:red;"><?php echo $nameErr; ?></span><br><br>

                Username: <input type="text" name="username" value="<?php echo $username; ?>" required>
                <span style="color:red;"><?php echo $usernameErr; ?></span><br><br>

                Password: <input type="password" name="password" required><br><br>
                Confirm Password: <input type="password" name="confirmPassword" required>
                <span style="color:red;"><?php echo $passwordErr; ?></span><br><br>

                Email: <input type="email" name="email" value="<?php echo $email; ?>" required>
                <span style="color:red;"><?php echo $emailErr; ?></span><br><br>

                <input type="submit" name="register" value="Register">
                <input type="reset" name="reset" value="Clear">
            </form>
        </div>
    </div>
</div>

</body>
</html>
