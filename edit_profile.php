<?php
    session_start();
    include "conn.php";
    $sql = "SELECT * FROM `teacher` WHERE '".$_SESSION["t_id"]."' = t_id";
    $query = $conn -> query($sql);
    $show = $query -> fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css.css">
    <title>Library</title>
    <meta charset="utf-8">
</head>
<body>
    <?php include "navbar.php"; ?>
    <form action="edit_profile_act.php" method="POST" class="box">
        <h1>Edit Profile</h1>
        <h5>Name</h5>
        <input type="text" name="name" value="<?php echo $show["t_name"]; ?>" autocomplete="off">
        <h5>Phone</h5>
        <input type="text" name="phone" value="<?php echo $show["t_phone"]; ?>">
        <input type="submit" value="Edit">
    </form>
</body>
</html>