<?php
    session_start();
    include "conn.php";
    date_default_timezone_set("Asia/Bangkok");
    $sql = "SELECT b_name, b_id, b.b_cate, c.b_cate, c_name FROM `book` b, category c WHERE '".$_GET["id"]."' = b_id AND b.b_cate = c.b_cate";
    $query = $conn -> query($sql);
    $show = $query -> fetch_array();
    $sql2 = "SELECT * FROM `teacher` WHERE '".$_SESSION["t_id"]."' = t_id";
    $query2 = $conn -> query($sql2);
    $show2 = $query2 -> fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css.css">
    <title>Library</title>
    <meta charset="utf-8">
</head>
<body>
    <?php include "navbar.php" ?>
    <form class="box-set" action="borrow_act.php" method="post">
        <h4>ชื่อหนังสือ</h4>
        <input type="text" name="bname" value="<?php echo $show["b_name"]; ?>" readonly/>
        <input type="hidden" name="b_id" value="<?php echo $_GET["id"]; ?>" readonly/>
        <h4>ประเภท</h4>
        <input type="text" name="c_name" value="<?php echo $show["c_name"]; ?>" readonly/>
        <h4>วันที่ยืม</h4>
        <input type="text" name="borrow_bf" value="<?php echo date("Y-m-d"); ?>" readonly/>
        <h4>วันกำหนดคืน</h4>
        <input type="text" name="borrow_send" value="<?php echo date("Y-m-d", strtotime("+5 day")); ?>" readonly/>
        <h4>ครูผู้ให้ยืม</h4>
        <input type="text" name="tname" value="<?php echo $show2["t_name"]; ?>" readonly/>
        <h4>นักเรียนที่ยืม</h4>
        <input type="text" name="sname" value="" autocomplete="off">
        <input type="submit" value="ยืม">
    </form>
</body>
</html>