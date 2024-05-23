<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
      <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>Login Form</h2>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
<?php
// Database connection details
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "fast_food_chain";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password, $role);
        $stmt->fetch();
        
        // Verify password
        if (password_verify($input_password, $hashed_password)) {
           // Check if the user is admin
    if ($username === "admin") {
        // Redirect to index2.php for admin
        header("Location: index2.php");
    } else {
        // Redirect to index.php for non-admin users
        header("Location: index.php");
    }
    exit();
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('No user found with that username.');</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

