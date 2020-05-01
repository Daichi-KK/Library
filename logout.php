<?php
    session_start();
    session_destroy();
?>
<script>
    alert("ออกจากระบบ");
    window.location="index.php";
</script>