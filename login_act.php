<?php
    session_start();
    include "conn.php";
    $sql = "SELECT * FROM `teacher` WHERE '".$_POST["username"]."' = user AND '".$_POST["password"]."' = pass";

    $query = $conn -> query($sql);
    if($query -> num_rows > 0){
        $show = $query -> fetch_array();
        $_SESSION["t_id"] = $show["t_id"];
?>
<script>
        alert("ยินดีต้อนรับ");
        window.location="index.php";
</script>
<?php
    }else{
?>
<script>
        alert("ผิดพลาดกรุณาใส่อีกครั้ง");
        window.location="index.php?re=1";
</script>
<?php
    }
?>