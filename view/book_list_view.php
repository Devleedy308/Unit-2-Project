<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
</head>
<body>
    <h1>Books in My Library</h1>

    <ul>
        <?php foreach ($books as $book) : ?>
            <li>
                <?php echo htmlspecialchars($book['title']); ?> 
                by <?php echo htmlspecialchars($book['author']); ?>
                <form action="../controller/book_controller.php?action=delete_book" method="post" style="display:inline;">
                    <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                    
                    <button>Delete</button>
                </form>
                <br>
                <?php echo htmlspecialchars($book['review']); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="../controller/book_controller.php?action=show_add_form">Add Book</a>
</body>
</html>
