<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['error'] = 'เข้าสู่ระบบก่อน!!';
        header('location: login.php');
    }
    
    if(isset($_POST['Likes'])){
        require('db.php');
        $postid = $_POST['postid'];
        if(isset($_POST['Likes'])){
            $likes = 1;
        }
        $username=$_SESSION['username'];

        $sql = "INSERT INTO emojis(likes,idpost,username) VALUES($likes,$postid,'$username')";
        mysqli_query($conn, $sql);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }else if(isset($_POST['UNLikes'])){
        require('db.php');
        $postid = $_POST['postid'];
        $username=$_SESSION['username'];

        $sql = "DELETE FROM emojis WHERE idpost = $postid AND username='$username'";
        mysqli_query($conn, $sql);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }else{
        $_SESSION['error'] = 'เกิดข้อผิดพลาด!!';
        header('location: ../index.php');
    }
?>