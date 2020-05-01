<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <?php 
        include "navbar.php"; 
    ?>
        <form  action="login_act.php" method="post" class="box">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username" autocomplete="off">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Sign In">
    </form>
</body>
</html>