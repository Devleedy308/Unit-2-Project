<?php
function add_user($username, $password) {
    global $db;

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = 'INSERT INTO users (user_name, password)
              VALUES (:username, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hash);
    $statement->execute();
    $statement->closeCursor();
}

function validate_user($username, $password) {
    global $db;

    $query = 'SELECT * FROM users WHERE user_name = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}

