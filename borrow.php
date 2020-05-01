<?php
    session_start();
    include "conn.php";
    date_default_timezone_set("Asia/Bangkok");
    $sql = "SELECT * FROM `book` WHERE '".$_GET["id"]."' = b_id";
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
    <form class="borrow" action="borrow_act.php" method="post">
        <h4>ชื่อหนังสือ</h4>
        <input type="text" name="bname" value="<?php echo $show["b_name"]; ?>">
        <input type="hidden" name="b_id" value="<?php echo $_GET["id"]; ?>">
        <h4>ผู้แต่ง</h4>
        <input type="text" name="author" value="<?php echo $show["b_au"]; ?>">
        <h4>ประเภท</h4>
        <input type="text" name="cate" value="<?php 
                    if($show["b_cate"] == "1"){
                        echo "Science";
                    }else if($show["b_cate"] == "2"){
                        echo "Arts and recreation";
                    }
         ?>">
        <h4>วันที่ยืม</h4>
        <input type="text" name="borrow_bf" value="<?php echo date("Y-m-d"); ?>">
        <h4>วันกำหนดคืน</h4>
        <input type="text" name="borrow_send" value="<?php echo date("Y-m-d", strtotime("+5 day")); ?>">
        <h4>ครูผู้ให้ยืม</h4>
        <input type="text" name="tname" value="<?php echo $show2["t_name"]; ?>">
        <h4>นักเรียนที่ยืม</h4>
        <input type="text" name="sname" value="">
        <input type="submit" value="ยืม">
    </form>
</body>
</html>