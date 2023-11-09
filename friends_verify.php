<?php
    session_start();
    require('db/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพื่อนของคุณ | PUANJ Community</title>
</head>
<body>
    <?php
        if(isset($_SESSION['username'])){
            include('menu/user_menu.php');
        }else {
            include('menu/menu.php');
        }
    ?>
      <form class="d-flex m-2" role="search">
        <input class="form-control m-1" style="width:200px;" type="search" placeholder="ค้นหาเพื่อนของคุณ" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
    <br>
    <div class="container">
        <?php
            if(isset($_SESSION['error'])){
                echo "<div class='alert alert-danger'>";
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                echo "</div>";
            }else if(isset($_SESSION['success'])){
                echo "<div class='alert alert-success'>";
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                echo "</div>";
            }
        ?>
        <?php 
            require('db/db.php');
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM friends WHERE username='$username' AND verify='รอรับคำขอ'";
            $query = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($query);
            $nums = 1;
            if($num>0){
        ?>
        <div>มีคนส่งคำขอเป็นเพื่อนคุณ <span style="color: orange;">[<?php echo $num?>]</span> คน</div>
        <?php 
        while($rows=mysqli_fetch_assoc($query)){?>
            <div></div>
            <div><?php echo $nums."."?><?php echo $rows['addname']?> <a href="db/friends_verify_db.php?idverify=<?php echo $rows['id']?>" style="color: green;">รับเพื่อน</a > <a href="" style="color: red;">ยกเลิก</a ></div>
        <?php } ?>
        <?php }else{
            echo "<div class='alert alert-danger'>คุณยังไม่มีคำขอเป็นเพื่อน</div>";
        } ?>
    </div>
</body>
</html>