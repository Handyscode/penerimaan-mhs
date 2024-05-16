<?php
session_start();
include '../connection.php';

if (isset($_SESSION['loggedin'])) {
  header( "Location: dashboard.php" );
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $conn->real_escape_string($_POST['email']);
  $password = $_POST['password'];  // Get the password directly without real_escape_string for checking
  $tipe_login = $_POST['tipe_login'];

  if ($tipe_login === 'calon_mahasiswa') {
    $sql = "SELECT * FROM pendaftar WHERE email = '$email'";
    $result = $conn->query($sql);
  }else{
    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = $conn->query($sql);
  }

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      if (password_verify($password, $row['password'])) {
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
          $_SESSION['tipe'] = $tipe_login === 'calon_mahasiswa' ? 'pendaftar' : 'admin';
          header("Location: dashboard.php");
      } else {
          // Additional debug info
          $_SESSION['errMsg'] = "Email / Password Invalid";
      }
  } else {
      $_SESSION['errMsg'] = "Email / Password Invalid";
  }

  $conn->close();
  header("Location: login.php");
  exit();
}