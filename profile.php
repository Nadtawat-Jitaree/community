<?php
    session_start();
    require('db/db.php');
    if(!isset($_SESSION['username'])){
        $_SESSION['error'] = 'เข้าสู่ระบบก่อน!!';
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์ของคุณ | PUANJ Community</title>
</head>
<body>
    <?php
        if(isset($_SESSION['username'])){
            include('menu/user_menu.php');
        }else {
            include('menu/menu.php');
        }
    ?>
    <br>
    <div class="container" style="background-color: #ffff;">
        <div class="container my-2" style="background-color: #ffff;">
        <br>
        <?php 
            require('db/db.php');
            $username=$_SESSION['username'];
            $sql = "SELECT * FROM friends INNER JOIN profile ON friends.username=profile.username WHERE friends.username='$username' AND verify='ยืนยันคำขอแล้ว'";
            $query = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($query);
            $numrows=1;
            if($num>0){
        ?>
        <h5>เพื่อนของคุณมี <span><?php echo $num?></span> คน</h5>
        <?php 
        while($rows=mysqli_fetch_assoc($query)){?>
            <div><img class="text-center" style="border: solid white 2px;border-radius: 40px;" src="image/<?php echo $rows['profile_image']?>" width="80px" height="80px" alt=""> <?php echo $numrows++." . ".$rows['addname']?> <a href="" style="color: red;">ลบเพื่อน</a></div>
        <?php } ?>
        <?php }else{
            echo "<div class='alert alert-danger'>คุณยังไม่มีเพื่อน</div>";
        } ?>
        <br>
    </div>
</body>
</html>