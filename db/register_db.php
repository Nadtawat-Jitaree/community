<?php
    session_start();
    require('db.php');

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $c_password=$_POST['c_password'];
        $role = 'user';

        if(empty($username)){
            $_SESSION['error']='กรุณากรอก Username!!';
            header('location: ../register.php');
        }else if(empty($email)){
            $_SESSION['error']='กรุณากรอก Email!!';
            header('location: ../register.php');
        }else if(empty($password)){
            $_SESSION['error']='กรุณากรอกรหัสผ่าน!!';
            header('location: ../register.php');
        }else if(empty($c_password)){
            $_SESSION['error']='กรุณากรอกยืนยันรหัสผ่าน!!';
            header('location: ../register.php');
        }else if($password != $c_password){
            $_SESSION['error']='รหัสผ่านไม่ตรงกัน!!';
            header('location: ../register.php');
        }else if(6 > $password){
            $_SESSION['error']='รหัสผ่านต้องมากกว่า 6 ตัวอักษร!!';
            header('location: ../register.php');
        }

        if(!isset($_SESSION['error'])){
            $check_data = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $query = mysqli_query($conn, $check_data);
            $check = mysqli_num_rows($query);

            if($check>=1){
                $_SESSION['error']='มี Username หรือ Email นี้อยู่แล้วในระบบ!!';
                header('location: ../register.php');
            }

            if($check==0){
                $sql = "INSERT INTO users(username,email,password,role) VALUES('$username','$email','$password','$role')";
                mysqli_query($conn,$sql);
                $profile = "INSERT INTO profile(username,email) VALUES('$username','$email')";
                mysqli_query($conn,$profile);
                $_SESSION['success'] = "สมัครสมาชิกสำเร็จ!! คลิ๊ก <a href='login.php'>เข้าสู่ระบบ</a>";
                header('location: ../register.php');
            }

        }
    }
?>