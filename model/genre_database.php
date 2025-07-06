<?php
function get_genres() {
    global $db;

    $query = 'SELECT * FROM genres ORDER BY genre_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $genres = $statement->fetchAll();
    $statement->closeCursor();

    return $genres;
}

function get_genre_name($genre_id) {
    global $db;

    $query = 'SELECT name FROM genres WHERE genre_id = :genre_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->execute();
    $genre = $statement->fetch();
    $statement->closeCursor();

    return $genre ? $genre['name'] : null;
}

function add_genre($name) {
    global $db;

    $query = 'INSERT INTO genres (name) VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_genre($genre_id) {
    global $db;

    $query = 'DELETE FROM genres WHERE genre_id = :genre_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
