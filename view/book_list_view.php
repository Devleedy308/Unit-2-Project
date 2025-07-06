<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
</head>
<body>
    <h1>Books in <?php echo htmlspecialchars($genre_name); ?></h1>

    <ul>
        <?php foreach ($books as $book) : ?>
            <li>
                <?php echo htmlspecialchars($book['title']); ?> 
                by <?php echo htmlspecialchars($book['author']); ?> 
                <form action="." method="post" style="display:inline;">
                    <input type="hidden" name="action" value="delete_book">
                    <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                    <input type="hidden" name="genre_id" value="<?php echo $genre_id; ?>">
                    <button>Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><a href=".?action=show_add_form">Add Book</a></p>
</body>
</html>
