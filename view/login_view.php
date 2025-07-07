<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (!empty($error)) : ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="../controller/user_controller.php" method="post">
        <input type="hidden" name="action" value="login_user">

        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="text" name="password" required><br>

        <input type="submit" value="Login">
    </form>

    <p style="text-align: center; font-style: italic">Don't have an account? <a href="?action=show_register_form" style="font-style: normal; font-size: em;">Register here</a></p>
</body>
</html>
