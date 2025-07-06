<?php
require('../database.php');
require('../model/user_database.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login_form';
    }
}

if ($action == 'show_login_form') {
    // Show the login view
    include('../view/login_view.php');

} else if ($action == 'login_user') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    if ($username && $password) {
        $user = validate_user($username, $password);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            // Redirect to the book list page
            header("Location: ../controller/book_controller.php?action=list_books");
            exit();
        } else {
            $error = "Invalid login. Try again.";
            include('../view/login_view.php');
        }
    } else {
        $error = "Username and password are required.";
        include('../view/login_view.php');
    }
} else if ($action == 'show_register_form') {
    // Show the register view
    include('../view/register_view.php');

} else if ($action == 'register_user') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if ($username == NULL || $password == NULL) {
        $error = "Username and password are required.";
        include('../view/register_view.php');
    } else {
        add_user($username, $password);

        session_start();
        $_SESSION['user'] = ['user_name' => $username];

        header("Location: ../controller/book_controller.php?action=list_books");
        exit();
    }
}

?>
