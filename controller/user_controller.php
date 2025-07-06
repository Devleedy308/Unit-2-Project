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
    // Handle login
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if ($username == NULL || $password == NULL) {
        $error = "Username and password are required.";
        echo $error;
    } else {
        $user = validate_user($username, $password);
        if ($user) {
            // maybe set session variables here
            header("Location: ../index.php");
        } else {
            $error = "Invalid login. Please try again.";
            include('../view/login_view.php');
        }
    }

} else if ($action == 'show_register_form') {
    // Show the register view
    include('../view/register_view.php');

} else if ($action == 'register_user') {
    // Handle registration
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if ($username == NULL || $password == NULL) {
        $error = "Username and password are required.";
        include('../view/register_view.php');
    } else {
        add_user($username, $password);
        header("Location: .?action=show_login_form");
    }
}
?>
