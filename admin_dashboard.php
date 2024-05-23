<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Food Chain</title>
    <link rel="stylesheet" href="index.css">
     <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <a href="#">Fast Food Chain</a>
        </div>
        <ul class="nav-list">
            <li><a href="#">Dashboard</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Restaurants</a>
                <div class="dropdown-content">
                    <a href="#">Jollibee</a>
                    <a href="#">Yoshinoya</a>
                    <a href="#">McDonald's</a>
                    <a href="#">Lotteria</a>
                    <a href="#">The Pizza Company</a>
                </div>
            </li>
            <li><a href="#">Locations</a></li>
            
        </ul>
       <div class="dropdown">
            <button class="dbtn">
               <i class='bx bxs-user'></i>
            </button>
            <div class="dbtnc">
                <a href="<?php echo htmlspecialchars($_SESSION["username"]); ?>">User</a>
                <a href="login.php">Login</a>
            </div>
        </div>
        </div>
    </nav>
</body>
</html>
