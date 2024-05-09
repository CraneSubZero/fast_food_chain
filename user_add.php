<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social_media_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Validate and sanitize input
    $username = mysqli_real_escape_string($conn, $username);
    // Password hashing for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $role);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to user list module
        header("Location: user_list.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Player-List Management System</title>
<link rel="stylesheet" href="index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>


<div class="row">
    <div class="col-md-3"> </div>
    <div class="col-md-4">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="mb-3">
                <label for="input-group text" class="form-label">Role:</label>
                <select class="form-select" name="role">
                    <option selected disabled>Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Save User</button>
            </div>
        </form>
    </div>
</div>
