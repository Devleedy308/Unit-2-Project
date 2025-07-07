<?php
session_start(); 
require('../database.php');
require('../model/book_database.php');
require('../model/genre_database.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_books';
    }
}

if ($action == 'list_books') {
    $genre_id = filter_input(INPUT_GET, 'genre_id', FILTER_VALIDATE_INT);
    if ($genre_id == NULL || $genre_id == FALSE) {
        $genre_id = 1;
    }
    $genre_name = get_genre_name($genre_id);
    $genres = get_genres();
    $books = get_books_by_genre($genre_id);
    include('../view/book_list_view.php');
} else if ($action == 'delete_book') {
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
    $genre_id = filter_input(INPUT_POST, 'genre_id', FILTER_VALIDATE_INT);
      delete_book($book_id);
       header("Location: book_controller.php?action=list_books&genre_id=$genre_id");
        exit();
    
} else if ($action == 'show_add_form') {
    $genres = get_genres();
    include('../view/add_book_view.php');
} else if ($action == 'add_book') {
    session_start();
    $user_id = $_SESSION['user']['user_id'];
    $genre_id = filter_input(INPUT_POST, 'genre_id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title');
    $author = filter_input(INPUT_POST, 'author');
    $review = filter_input(INPUT_POST, 'review');
    if ($user_id == NULL || $user_id == FALSE || $genre_id == NULL || $genre_id == FALSE || 
            $title == NULL || $author == NULL) {
        $error = "Invalid entry. Check inputs and try again.";
        echo $error;
    } else {
        add_book($user_id, $genre_id, $title, $author, $review);
        header("Location: ../controller/book_controller.php?action=list_books");
        exit();
    }
} else if ($action == 'list_genres') {
    $genres = get_genres();
    include ('../view/genre_list_view.php');
} else if ($action == 'delete_genre') {
    $genre_id = filter_input(INPUT_POST, 'genre_id', FILTER_VALIDATE_INT);

    if ($genre_id == NULL) {
        echo "Missing or incorrect genre id.";
    } else {
        delete_genre($genre_id);
        header("Location: book_controller.php?action=list_genres");
        exit();
    }
}
?>
