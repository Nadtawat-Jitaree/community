<?php 
    session_start();
    require('db.php');
    $idverify = $_GET['idverify'];
    $sql = "UPDATE friends SET verify='ยืนยันคำขอแล้ว' WHERE id=$idverify";
    mysqli_query($conn , $sql);
    $_SESSION['success'] = 'ยืนยันคำขอเสร็จสิ้น';
    header('location: ../index.php');
?>