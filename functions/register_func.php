<?php
session_start();
include '../connection.php';
include 'register_validation_func.php';

if (isset($_SESSION['loggedin'])) {
  header( "Location: dashboard.php" );
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validation
  list($errors, $validatedData) = validate_form($conn, $_POST);

  if (!array_filter($errors)) {
    $hashed_password = password_hash($validatedData['password'], PASSWORD_DEFAULT);
    $nama = $validatedData['nama'];
    $jenis_kelamin = $validatedData['jenis_kelamin'];
    $email = $validatedData['email'];
    $notelp = $validatedData['notelp'];
    $tglahir = $validatedData['tglahir'];
    $alamat = $validatedData['alamat'];
    $verified = 'N';

    $verification_token = base64_encode($email.'-'.$nama);

    $sql = "INSERT INTO pendaftar (nmlengkap, jenis_kelamin, email, notelp, tglahir, alamat, verified, password) VALUES (? , ? , ? , ? , ? , ? , ? , ?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param("ssssssss", $nama, $jenis_kelamin, $email, $notelp, $tglahir, $alamat, $verified, $hashed_password);

    if ($statement->execute()) {
      $_SESSION['emailData'] = $verification_token;
    }else{
      $_SESSION['errMsg'] = "Error: " . $sql . "<br>" . $statement->error;
      header("Location: register.php");
    }
    
    header("Location: verifikasi-email.php");
  }else{
    $_SESSION['errValidation'] = $errors;
    header("Location: form-daftar.php");
  }

  $conn->close();
  exit();
}