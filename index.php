<?php
// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
// $lifetime = 0;                      // per-session cookie
session_set_cookie_params($lifetime, '/');
session_start();


if (!isset($_SESSION['user'])) {
    // User not logged in → redirect to login
    header("Location: controller/user_controller.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Welcome to Book It!</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['user_name']); ?>!</h1>

    <nav>
        <ul>
            <li><a href="controller/book_controller.php">My Book List</a></li>
            
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <p>Select an option from the menu above to get started.</p>
</body>
</html>
