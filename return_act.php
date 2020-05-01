<?php
    include "conn.php";
    session_start();
    $sql = "UPDATE `borrow` SET `br_status`= 'a' , `br_date_af` = '".$_POST["dateaf"]."' WHERE '".$_GET["id"]."' = b_id AND 'b' = br_status";
    $sql2 = "UPDATE `book` SET b_status = 'a' WHERE '".$_GET["id"]."' = b_id";
    if($conn ->query($sql) && $conn -> query($sql2)){
?>
<script>
    alert("คืนสำเร็จ");
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
