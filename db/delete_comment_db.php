<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['error'] = 'เข้าสู่ระบบก่อน!!';
        header('location: login.php');
    }
    
    if(isset($_GET['idcomment'])){
        require('db.php');
        $comment_id = $_GET['idcomment'];
        $username=$_SESSION['username'];

        $sql = "DELETE FROM comments WHERE comment_id = $comment_id AND username='$username'";
        mysqli_query($conn, $sql);
        $_SESSION['success'] = 'ลบ Comment สำเร็จ!!';
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }else{
        $_SESSION['error'] = 'เกิดข้อผิดพลาด!!';
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
?>