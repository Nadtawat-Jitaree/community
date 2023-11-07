<?php
    session_start();
    require('db.php');

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        if(empty($username)){
            $_SESSION['error']='กรุณากรอก Username';
            header('location: ../login.php');
        }else if(empty($password)){
            $_SESSION['error']='กรุณากรอก รหัสผ่าน!!';
            header('location: ../login.php');
        }

            $check_data = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $query = mysqli_query($conn, $check_data);
            $check = mysqli_num_rows($query);

            if($check==1){
                $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ!!";
                $_SESSION['username'] = $username;
                header('location: ../index.php');
            }else{
                $_SESSION['error']='รหัสผ่าน หรือ Username ไม่ถูกต้อง!!';
                header('location: ../login.php');
            }

    }else{
        $_SESSION['error']='เกิดข้อผิดพลาด!!';
        header('location: ../login.php');
    }
?>