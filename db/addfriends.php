<?php 
    session_start();
    require('db.php');
    $addfriends = $_GET['id'];
    echo $addfriends;
    if(isset($_SESSION['username'])){
        $addname = $_SESSION['username'];
    }
    if($addfriends==$addname){
        $_SESSION['error'] = "คุณไม่สามารถเพิ่มเพื่อนเป็นตัวเองได้";
        header('location: ../index.php');
        
    }else{
    $verify = "รอรับคำขอ";
    $sql = "INSERT INTO friends(username,name,addname,verify) VALUES('$addfriends','$addfriends','$addname','$verify')";
    mysqli_query($conn, $sql);
    $_SESSION['success'] = "ส่งคำขอไปหา ".$addfriends." แล้ว";
    header('location: ../friends_verify.php');
    }
?>