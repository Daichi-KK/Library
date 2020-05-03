<?php
    include "conn.php";
    echo $_POST["bname"];
    session_start();
    $sql2 = "SELECT * FROM `student` WHERE '".$_POST["sname"]."' = stu_name";
    $query2 = $conn -> query($sql2);
    $show2 = $query2 -> fetch_array();
    $sql = "INSERT INTO `borrow`(`br_date_bf`, `br_date_send`, `b_id`, `t_id`, `stu_id`,br_status) VALUES ('".$_POST["borrow_bf"]."','".$_POST["borrow_send"]."','".$_POST["b_id"]."','".$_SESSION["t_id"]."','".$show2["stu_id"]."', 'b')";
    $sql3 = "UPDATE `book` SET `b_status`= 'b' WHERE '".$_POST["bname"]."' = b_name";
    if($conn -> query($sql) && $conn -> query($sql3)){
?>
<script>
    alert("ยืมสำเร็จ");
    window.location="index.php";
</script>
<?php
    }else{
?>
<script>
    alert("กรุณาลองใหม่อีกครั้ง");
    window.location="index.php";
</script>
<?php
    }
?>