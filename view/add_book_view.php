<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>Add Book</title>
</head>
<body>
    <h1>Add Book</h1>

    <form action="../controller/book_controller.php" method="post">
        <input type="hidden" name="action" value="add_book">

        <label>Genre:</label>
        <select name="genre_id">
            <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre['genre_id']; ?>">
                    <?php echo htmlspecialchars($genre['name']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Title:</label>
        <input type="text" name="title" required><br>

        <label>Author:</label>
        <input type="text" name="author" required><br>

        <label>Review:</label>
        <textarea name="review"></textarea><br>

        <input type="submit" value="Add Book">
    </form>
</body>
</html>
