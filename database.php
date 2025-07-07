<?php
$dsn = 'mysql:host=localhost;dbname=book_app';
$username = 'root';
//$password = 'Neverwinter214'; // Adjust if you changed WAMP's default
$password = ''; // Adjust if you changed WAMP's default

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>Database Error: $error_message</p>";
    exit();
}
?>
