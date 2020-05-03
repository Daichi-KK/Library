<?php
    session_start();
    include "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css.css">
    <title>Library</title>
    <meta charset="utf-8">
</head>
<body>
    
    <?php
        include "navbar.php";
        $sql = "SELECT b_id, b_name, b_au, b.b_cate, b_status, b_img, c.b_cate, c_name  FROM `book` b, category c WHERE c.b_cate = b.b_cate";
        $query = $conn -> query($sql);
        $row = $query -> num_rows;
    ?>
            <div align="center" ><h1>Results : <?php echo $row; ?></h1></div>
    <?php
        $num = 1;
        while($show = $query -> fetch_array()){
           if($num%3 == 1){
    ?>
                <div class="row">
    <?php
            }    
    ?>
            <div class="col">
                <div class="border">
                <div style="text-align:center; margin-top:10px;">
                    <img src="img/<?php echo $show['b_img']; ?>" width="300" height="300">
                </div>
                <div class="detail" style="text-align:center;">
                    <h2><?php echo $num++ . ". " . $show["b_name"]; ?></h2>
                    <p>ผู้แต่ง : <?php echo $show["b_au"]; ?></p>
                    <p>หมวดหมู่ : <?php echo $show["c_name"]; ?></p>
                    <p>สถานะ : <?php if($show["b_status"] == "a"){
                        echo "<font color='green'>ว่าง</font>";
                    }else{
                        echo "<font color='red'>ถูกยืม</font>";
                    } ?></p>
                    <?php
                        if($_SESSION["t_id"] != null && $show["b_status"] == "a"){
                    ?>
                            <form class="submit" action="borrow.php?id=<?php echo $show['b_id']; ?>" method="post">
                                <input type="submit"  value="ยืม">
                            </form>
                    <?php
                        }
                    ?>
                </div>
                </div>
            </div>
            <?php
                if($num % 3 == 1){
            ?>
            </div>
    <?php
                }
        }
    ?>
</body>
</html>