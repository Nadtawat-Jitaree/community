<?php
    session_start();
    require('db.php');

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $post=$_POST['post'];
        $namelink=$_POST['namelink'];
        $link=$_POST['link'];

         
        if($_FILES["uploadfile"]["type"]=="image/jpeg" || $_FILES["uploadfile"]["type"]=="image/gif" || $_FILES["uploadfile"]["type"]=="image/png"){
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $add = $username.'post';
            $folder = "../image/$add" . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            $sql="INSERT INTO post(username,post,namelink,link,image) VALUES('$username','$post','$namelink','$link','$add$filename')";
            mysqli_query($conn,$sql);
            $_SESSION['success'] = 'โพสต์ข้อความกับรูปภาพสำเร็จ!!';
            header('location: ../post.php');
        }
        }else{
            $sql="INSERT INTO post(username,post,namelink,link) VALUES('$username','$post','$namelink','$link')";
            mysqli_query($conn,$sql);
            $_SESSION['success'] = 'โพสต์สำเร็จ!!';
            header('location: ../post.php');
        }

    }else{
        $_SESSION['error']='เกิดข้อผิดพลาด!!';
        header('location: ../index.php');
    }
?>