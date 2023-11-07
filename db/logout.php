<?php
    session_start();
    session_destroy();
    $_SESSION['success'] = 'ออกจากระบบสำเร็จ!!';
    header('location: ../login.php');
?>