<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <?php if (!empty($error)) : ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="../controller/user_controller.php" method="post">
        <input type="hidden" name="action" value="register_user">

        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Register">
    </form>

    <p>Already have an account? <a href="?action=show_login_form">Login here</a></p>
</body>
</html>
