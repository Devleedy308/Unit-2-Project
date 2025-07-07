<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>Book List</title>
</head>
<body>
    <h1>Books in My Library</h1>

    <table>
    
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Review</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book) : ?>
    <tr>
        <td><?php echo htmlspecialchars($book['title']); ?></td>
        <td><?php echo htmlspecialchars($book['author']); ?></td>
        <td><?php echo nl2br(htmlspecialchars($book['review'])); ?></td>
        <td>
            <form action="." method="post" style="display:inline;">
                <input type="hidden" name="action" value="delete_book">
                <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                <input type="hidden" name="genre_id" value="<?php echo $genre_id; ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


    <a href="../controller/book_controller.php?action=show_add_form">Add Book</a>
</body>
</html>
