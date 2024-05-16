<?php
session_start();
include '../connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    
    $sql = "UPDATE pendaftar SET status='diterima' WHERE pendaftar_id='$id'";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['successMsg'] = 'Berhasil mengupdate data';
    } else{
        $_SESSION['errMsg'] = 'Data gagal diupdate';
    }
    
    header('Location: dashboard.php');
    exit();
}