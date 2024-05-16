<?php
session_start();
include 'connection.php';

if (!isset($_GET['token'])) {
    header('Location: index.php');
}else{
    $splitToken = explode('-',base64_decode($_GET['token']));
    $email = $splitToken[0];

    // Verify
    $sql = "UPDATE pendaftar SET verified = 'Y' WHERE email = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s',$email);

    if ($statement->execute() && $stmt->affected_rows > 0) {
        $_SESSION['successMsg'] = 'Berhasil verifikasi email, silahkan login';
    }else{
        $_SESSION['errMsg'] = 'Email sudah terverifikasi atau token invalid';
    }

    header('Location: pages/login.php');
    $stmt->close();
}