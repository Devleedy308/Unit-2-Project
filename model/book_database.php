<?php
function get_books_by_genre($genre_id) {
    global $db;
    $query = 'SELECT * FROM books WHERE genre_id = :genre_id ORDER BY book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->execute();
    $books = $statement->fetchAll();
    $statement->closeCursor();
    return $books;
}

function delete_book($book_id) {
    global $db;
    $query = 'DELETE FROM books WHERE book_id = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_book($user_id, $genre_id, $title, $author, $review) {
    global $db;
    $query = 'INSERT INTO books (user_id, genre_id, title, author, review)
              VALUES (:user_id, :genre_id, :title, :author, :review)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':author', $author);
    $statement->bindValue(':review', $review);
    $statement->execute();
    $statement->closeCursor();
}
?>
