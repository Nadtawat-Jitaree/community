<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['error'] = 'เข้าสู่ระบบก่อน!!';
        header('location: login.php');
    }
    require('db.php');

    if(isset($_POST['submit'])){
        $comment = $_POST['comment'];
        $username = $_SESSION['username'];
        $postid = $_POST['postid'];

        if(empty($comment)){
            $_SESSION['error']='เขียนข้อความก่อน!!';
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
        if($_SESSION['error']==0){
            $sql = "INSERT INTO comments(username,postid,comment) VALUES('$username',$postid,'$comment')";
            mysqli_query($conn,$sql);
            $_SESSION['success']='Comments สำเร็จ!!';
    
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }

    }else{
        $_SESSION['error']='เกิดข้อผิดพลาด!!';
        header('location: ../index.php');
    }
?>