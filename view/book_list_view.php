<!DOCTYPE html>
<html>
<head>
    <style>
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color:rgb(175, 76, 139);
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e9e9e9;
    }

    caption {
        caption-side: top;
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .center {
        text-align: center;
    }

    button {
        background-color: #ff4d4d;
        color: white;
        border: none;
        padding: 6px 12px;
        cursor: pointer;
    }

    button:hover {
        background-color: #cc0000;
    }
</style>
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
            <form action="../controller/book_controller.php" method="post" style="display:inline;">
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
