<?php include('../functions/login_func.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Penerimaan Mahasiswa Baru</title>
  <link rel="stylesheet" href="../assets/css/style.css">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
  <header class="header">
    <div class="navbrand">
      <a href="">Penerimaan Mahasiswa</a>
    </div>
    <nav class="navbar">
      <ul>
        <li>
          <a href="../index.php">Beranda</a>
        </li>
        <li>
          <a href="form-daftar.php">Form Pendaftaran</a>
        </li>
      </ul>
    </nav>
    <div class="action-btn">
      <a href="login.php" class="nav-link primary-btn">Login</a>
      <a href="form-daftar.php" class="nav-link primary-btn-outlined">Daftar</a>
    </div>
  </header>
  <div class="container">
    <div class="card">
      <div class="login-headline">
        <h1 class="title">Login</h1>
        <p class="subtitle">Login admin / calon mahasiswa</p>
      </div>
      <div class="card-content">
        <form action="" method="post">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="form-group-radio">
            <label for="tipe_login" style="font-weight: 600;">Login Sebagai:</label>
            <div class="wrapper">
              <div class="radio-parent">
                <input type="radio" name="tipe_login" id="calon_mahasiswa" value="calon_mahasiswa" checked>
                <label for="calon_mahasiswa">Calon Mahasiswa</label>
              </div>
              <div class="radio-parent">
                <input type="radio" name="tipe_login" id="admin" value="admin">
                <label for="admin">Admin</label>
              </div>
            </div>
          </div>
          <button type="submit" class="login-btn primary-btn fwidth">Login</button>
        </form>
        <a href="form-daftar.php" class="register-btn primary-btn-outlined fwidth">Registrasi</a>
      </div>
      <?php
      if (isset($_SESSION['errMsg'])) {
        echo "<div class='alert danger'>
          <p>".$_SESSION['errMsg']."</p>
        </div>";
        unset($_SESSION['errMsg']);
      }
      ?>
      <?php
      if (isset($_SESSION['successMsg'])) {
        echo "<div class='alert success'>
          <p>".$_SESSION['successMsg']."</p>
        </div>";
        unset($_SESSION['successMsg']);
      }
      ?>
    </div>
  </div>
  <footer class="footer">
    <p class="copyright">Copyright &copy; 2024 - Penerimaan Mahasiswa Baru</p>
  </footer>
</body>
</html>