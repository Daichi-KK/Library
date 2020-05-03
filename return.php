<?php
    session_start();
    include "conn.php";
    date_default_timezone_set("Asia/Bangkok");
    $sql = "SELECT b_name, b_cate, br_date_bf, br_date_send FROM `borrow` br, book b WHERE '".$_GET["id"]."'=b.b_id AND '".$_GET["id"]."' = br.b_id";
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
    <form class="box-set" action="return_act.php?id=<?php echo $_GET["id"]; ?>" method="post">
        <h4>ชื่อหนังสือ</h4>
        <input type="text" name="bname" value="<?php echo $show["b_name"]; ?>" readonly/>
        <h4>วันที่ยืม</h4>
        <input type="text" name="date" value="<?php echo $show["br_date_bf"]; ?>" readonly/>
        <h4>วันกำหนดคืน</h4>
        <input type="text" name="date" value="<?php echo $show["br_date_send"]; ?>" readonly/>
        <h4>วันที่คืน</h4>
        <input type="text" name="dateaf" value="<?php echo date("Y-m-d"); ?>" readonly/>
        <?php 
            $tip = (strtotime(date("Y-m-d")) - strtotime($show["br_date_send"])) / (60 * 60 * 24);
            if($tip > 0){
                echo "<h4> คืนหนังสือเกินกำหนด " . $tip . " วัน | เสียค่าปรับ " . $tip * 5 . " บาท";
            }
                
                
            
        ?>
        <input type="submit" value="คืน">
    </form>
</body>
</html>