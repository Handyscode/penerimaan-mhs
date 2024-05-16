<?php
session_start();
require '../vendor/autoload.php';
include '../connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if (isset($_SESSION['loggedin'])) {
  header( "Location: dashboard.php" );
}

if (!isset($_SESSION['emailData'])) {
  header('Location: index.php');
}

$emailData = base64_decode($_SESSION['emailData']);
$splittedData = explode('-', $emailData);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $splittedData[0];
  $nama = $splittedData[1];

  try {
    // Server Settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'farhansabil22@gmail.com';
    $mail->Password = 'wflbxormwapoocwx';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Recipient
    $mail->setFrom('info@penerimaan-mahasiswa.site', 'Info PMB');
    $mail->addAddress($email, $nama);
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Penerimaan Mahasiswa Baru';
    $mail->Body = '<html>
    <head>
      <title>Verifikasi Email Untuk Mengakses Akun</title>
      <style>
        .email-body {
          font-family: Arial, sans-serif;
          color: #333;
          background-color: #f9f9f9;
          padding: 20px;
          border: 1px solid #ddd;
        }
        .header {
          background-color: #2b2d42;
          color: white;
          padding: 10px;
          text-align: center;
        }
        .content {
          margin: 20px 0;
        }
        .footer {
          font-size: 12px;
          color: #666;
          text-align: center;
          margin-top: 20px;
        }
        .primary-btn {
          color: #fff;
          font-family: "Nunito Sans", sans-serif;
          background: #ef233c;
          border: 1px solid #ef233c;
          text-decoration: none;
          width: 100%;
          padding: 10px 30px;
          border-radius: 3px;
          transition: ease 0.2s;
        }
        
        .primary-btn:hover {
          background: #d11026;
          border: 1px solid #d11026;
          transition: ease 0.2s;
          border-radius: 0;
        }
      </style>
    </head>
    <body>
      <div class="email-body">
        <div class="header">
          <h1>Verifikasi Email Untuk Mengakses Akun</h1>
        </div>
        <div class="content">
          <p>Tekan Tombol dibawah untuk melakukan verifikasi:</p>
          <p><a href="https://penerimaan-mahasiswa.site/verify.php?token='.$_SESSION['emailData'].'" class="primary-btn" style="color: #fff;">Verifikasi Email</a></p>
        </div>
      </div>
    </body>
    </html>';
    
    $mail->send();
    $_SESSION['successMsg'] = 'Berhasil mengirim email, silahkan cek inbox pada email-mu';
  } catch (\Exception $e) {
    $_SESSION['errMsg'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}