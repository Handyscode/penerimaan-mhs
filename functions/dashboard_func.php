<?php
session_start();
include '../connection.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
setlocale(LC_ALL, 'ID');

$userAuth = $_SESSION['email'];
$userType = $_SESSION['tipe'];
if ($userType === 'pendaftar') {
    $sql = "SELECT * FROM pendaftar where email = '$userAuth'";
    $result = $conn->query($sql)->fetch_assoc();

    $date = new DateTime($result['tglahir']);
    $tglahir = strftime('%d %B %Y', $date->getTimestamp());
}else{
    $sql = "SELECT * FROM pendaftar ORDER BY pendaftar_id DESC";
    $result = $conn->query($sql);
}