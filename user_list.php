<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-FjV4P7p0Tq+79KbD5Ae7JYeGxhXttxJcQQzoaAZuLxh+3QqGz4HBgzhj4o5ICk2m" crossorigin="anonymous">
</head>

<body>

  <a href="?page=user_add" class="btn btn-sm btn-success">Add User</a>

  <?php
  // Create database connection
  $conn = new mysqli("localhost", "root", "", "social_media_db");

  // Construct SQL query
  $sql = 'SELECT * FROM users ORDER BY id DESC';

  $result = $conn->query($sql);
  ?>

  <div class="container">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['password']; ?></td>
              <td><?php echo $row['role']; ?></td>
              <td>
                <a href="#" class="btn btn-sm btn-info">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>

</body>

</html>
