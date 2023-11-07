<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['error'] = 'เข้าสู่ระบบก่อน!!';
        header('location: login.php');
    }
    
    if(isset($_GET['idpost'])){
        require('db.php');
        $postid = $_GET['idpost'];
        $username=$_SESSION['username'];
        $sqldelete = "SELECT * FROM post WHERE postid = $postid";
        $querydelete = mysqli_query($conn, $sqldelete);
        $rowdelete = mysqli_fetch_assoc($querydelete);
        if(!empty($rowdelete['image'])){
            $filename = $rowdelete['image'];
            unlink("../image/$filename");
        }

        $sql = "DELETE FROM post WHERE postid = $postid AND username='$username'";
        mysqli_query($conn, $sql);

        $sqlcomment = "DELETE FROM comments WHERE postid = $postid AND username='$username'";
        mysqli_query($conn, $sqlcomment);
        $_SESSION['success'] = 'ลบโพสต์สำเร็จ!!';
        header('location: ../post.php');
    }else{
        $_SESSION['error'] = 'เกิดข้อผิดพลาด!!';
        header('location: ../index.php');
    }
?>