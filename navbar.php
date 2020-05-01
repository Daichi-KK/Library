<script>
            function Exit(){
                if(confirm("คุณต้องการออกจากระบบใช่หรือไม่")){
                    window.location="logout.php";
                }
            }
</script>
<div class="navbar">
    <ul>
        <?php
            include "conn.php";
            session_start();
            if($_SESSION["t_id"] == null){
                echo "<li><a href='login.php'>เข้าสู่ระบบ</a></li>";
            }else{
                include "conn.php";
                $navbar = "SELECT * FROM `teacher` WHERE '".$_SESSION["t_id"]."' = t_id";
                $navbar_query = $conn -> query($navbar);
                $show_navbar = $navbar_query-> fetch_array();
                echo "<li><a href='javascript:Exit();'>ออกจากระบบ</a></li>";
                echo "<li><a href='edit_profile.php'>". $show_navbar["t_name"] ."</a></li>";
                echo "<li><a href='check.php'>ข้อมูลการยืม</a></li>";
            }
        ?>
        <li><a href="index.php">หน้าหลัก</a></li>
    </ul>
</div>