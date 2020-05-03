<?php
    include "conn.php";
    session_start();
    $sql = "SELECT b_name, b.b_cate, c.b_cate, b_img, br_status, stu_name, br_date_bf, b.b_id, c_name, br_date_send, br_date_af, br_id, t_name FROM `borrow` br, book b, student s, teacher t, category c WHERE br.b_id = b.b_id AND br.stu_id = s.stu_id AND br.t_id = t.t_id AND b.b_cate = c.b_cate";
    $query = $conn -> query($sql);
    $row = $query -> num_rows;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css.css">
</head>
<body>
    
    <?php include "navbar.php";?>
    <div align="center"><h1>Results : <?php echo $row; ?></h1></div>
    <div align="center">
    <table>
            <tr>
                <th>ลำดับ</th>
                <th>รูป</th>
                <th>ชื่อหนังสือ</th>
                <th>ประเภทหนังสือ</th>
                <th>ชื่อนักเรียน</th>
                <th>ชื่อครู</th>
                <th>วันที่ยืม</th>
                <th>กำหนดคืน</th>
                <th>วันที่คืน</th>
                <th>สถานะ</th>
                <th></th>
                <th></th>
            </tr>
        <?php
            $i = 1;
            while($show = $query -> fetch_array()){
        ?>    
            <tr class="tr" style="padding:200px;">
                <td align="center"><?php echo $show["br_id"]; ?></td>
                <td style="margin:20px;">
                    <img src='img/<?php echo $show["b_img"]; ?>' width="100" height="100">
                </td>
                <td align="center"><?php echo $show["b_name"]; ?></td>
                <td align="center"><?php echo $show["c_name"]; ?></td>
                <td align="center"><?php echo $show["stu_name"]; ?></td>
                <td align="center"><?php echo $show["t_name"]; ?></td>
                <td align="center"><?php echo $show["br_date_bf"]; ?></td>
                <td align="center"><?php echo $show["br_date_send"]; ?></td>
                <?php
                    if($show["br_date_af"] == "0000-00-00"){?>
                        <td></td>
                        <td style='color:red;' align="center">**ยืม**<td>
                        <td><input type='button' name='submit' value="คืน" onclick='window.location="return.php?id=<?php echo $show["b_id"]; ?>"'></td>
                <?php }else{ ?>
                            <td align="center"><?php echo $show["br_date_af"]; ?></td>
                            <td align="center">คืนแล้ว</td>
                            <td></td>
                            <td></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>