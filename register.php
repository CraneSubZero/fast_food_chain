<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fast_food_chain";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
    <div class="container">
    <div class="table">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">role</th>
          </tr>
          
        </thead>
        <tbody>

          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo $row['Id'];  ?></td>
              <td><?php echo $row['Username'];  ?></td>
              <td><?php echo $row['Email'];  ?></td>
              <td><?php echo $row['Password'];  ?></td>
              <td><?php echo $row['role'];  ?></td>
              <td>
                 <a href="edit-user.php?id=<?php echo $row['Id']; ?>" class="btn btn-sm btn-info btn-edit">Edit</a>
                 <a onclick="delete_user(<?php echo $row['Id']; ?>)" class="btn btn-sm btn-danger btn-delete">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  