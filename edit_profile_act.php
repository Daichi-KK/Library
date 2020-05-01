<?php
    session_start();
    include "conn.php";
    $sql = "UPDATE `teacher` SET`t_name`='".$_POST["name"]."',`t_phone`='".$_POST["phone"]."' WHERE '".$_SESSION["t_id"]."' = t_id";
    echo $sql;
    if($conn -> query($sql)){
?>
<script>
    alert("แก้ไขสำเร็จ");
    window.location="index.php";
</script>
<?php
    }else{
?>
<script>
    alert("กรุณาลองใหม่อีกครั้ง");
    window.location="edit_profile.php?re=1";
</script>
<?php
    }
?>