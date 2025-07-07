
<!DOCTYPE html>
<html>
<head>
    
    <title>Genres</title>
</head>
<body>
    <h1>Genres</h1>

    <ul>
        <?php foreach ($genres as $genre) : ?>
            <li>
                <?php echo htmlspecialchars($genre['name']); ?>
                <form action="." method="post" style="display:inline;">
                    <input type="hidden" name="action" value="delete_genre">
                    <input type="hidden" name="genre_id" value="<?php echo $genre['genre_id']; ?>">
                    <button>Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Add Genre</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_genre">

        <label>Genre Name:</label>
        <input type="text" name="name" required>
        <input type="submit" value="Add">
    </form>
</body>
</html>
