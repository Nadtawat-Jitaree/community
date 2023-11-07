<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['error'] = 'เข้าสู่ระบบก่อน!!';
        header('location: login.php');
    }
    require('db.php');

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $nickname=$_POST['nickname'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $gender=$_POST['gender'];
        $instagram=$_POST['instagram'];
        $threads=$_POST['threads'];
        $facebook=$_POST['facebook'];

        $lnickname= strlen($nickname);
        $lfname= strlen($fname);
        $llname= strlen($lname);

        if($lnickname>15){
            $_SESSION['error']='กรุณาตั้งค่าชื่อเล่นไม่เกิน 15 ตัวอักษร!!'." คุณกรอกมา ".$lnickname." ตัวอักษร!!";
            header('location: ../setting.php');
        }else if($lfname>25){
            $_SESSION['error']='กรุณาตั้งชื่อจริงไม่เกิน 25 ตัวอักษร!!';
            header('location: ../setting.php');
        }else if($llname>25){
            $_SESSION['error']='กรุณาตั้งนามสกุลไม่เกิน 25 ตัวอักษร!!';
            header('location: ../setting.php');
        }

        if($_SESSION['error']==0){
            $sql="UPDATE profile SET fname='$fname',lname='$lname',gender='$gender',nickname='$nickname',instagram='$instagram',threads='$threads',facebook='$facebook' WHERE username='$username'";
            mysqli_query($conn,$sql);
    
            $username=$_POST['username'];
             
            if($_FILES["uploadfile"]["type"]=="image/jpeg" || $_FILES["uploadfile"]["type"]=="image/gif" || $_FILES["uploadfile"]["type"]=="image/png"){
            if(empty($_FILES["uploadfile"])){
                $filename = $_FILES["olduploadfile"];
            }else{
                $sqldelete = "SELECT * FROM profile WHERE username = '$username'";
                $querydelete = mysqli_query($conn, $sqldelete);
                $rowdelete = mysqli_fetch_assoc($querydelete);
                $filename = $rowdelete['profile_image'];
                unlink("../image/$filename");
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $folder = "../image/$username" . $filename;
            }
    
            if (move_uploaded_file($tempname, $folder)) {
                $sql_update = "UPDATE profile set profile_image='$username$filename' WHERE username='$username'";
                mysqli_query($conn, $sql_update);
            }
            }
    
            $_SESSION['success'] = 'ตั้งค่าสำเร็จ!!';
            header('location: ../setting.php');
        }

    }else{
        $_SESSION['error']='เกิดข้อผิดพลาด!!';
        header('location: ../setting.php');
    }
?>