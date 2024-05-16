<?php include('../functions/register_func.php');?>
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
        <h1 class="title">Registrasi</h1>
        <p class="subtitle">Registrasi akun calon mahasiswa</p>
      </div>
      <div class="card-content">
        <form action="" method="post">
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control">
            <?php
              if (isset($_SESSION['errValidation']['nama'])) {
                echo "<div class='alert danger' style='text-align: left;'>
                  <p>".$_SESSION['errValidation']['nama']."</p>
                </div>";
                unset($_SESSION['errValidation']['nama']);
              }
            ?>
          </div>
          <div class="form-group-radio">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <div class="wrapper">
              <div class="radio-parent">
                <input type="radio" name="jenis_kelamin" id="laki" value="L" checked>
                <label for="laki">Laki - Laki</label>
              </div>
              <div class="radio-parent">
                <input type="radio" name="jenis_kelamin" id="perempuan" value="P">
                <label for="perempuan">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="form-group-inline">
            <div class="wrapper">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control">
              <?php
                if (isset($_SESSION['errValidation']['email'])) {
                  echo "<div class='alert danger' style='text-align: left;'>
                    <p>".$_SESSION['errValidation']['email']."</p>
                  </div>";
                  unset($_SESSION['errValidation']['email']);
                }
              ?>
            </div>
            <div class="wrapper">
              <label for="notelp">Nomor Telepon</label>
              <input type="tel" name="notelp" id="notelp" class="form-control">
              <?php
                if (isset($_SESSION['errValidation']['notel['])) {
                  echo "<div class='alert danger' style='text-align: left;'>
                    <p>".$_SESSION['errValidation']['notel[']."</p>
                  </div>";
                  unset($_SESSION['errValidation']['notel[']);
                }
              ?>
            </div>
          </div>
          <div class="form-group">
            <label for="tglahir">Tanggal Lahir</label>
            <input type="date" name="tglahir" id="tglahir" class="form-control">
            <?php
              if (isset($_SESSION['errValidation']['tglahir'])) {
                echo "<div class='alert danger' style='text-align: left;'>
                  <p>".$_SESSION['errValidation']['tglahir']."</p>
                </div>";
                unset($_SESSION['errValidation']['tglahir']);
              }
            ?>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control textarea"></textarea>
            <?php
              if (isset($_SESSION['errValidation']['alamat'])) {
                echo "<div class='alert danger' style='text-align: left;'>
                  <p>".$_SESSION['errValidation']['alamat']."</p>
                </div>";
                unset($_SESSION['errValidation']['alamat']);
              }
            ?>
          </div>
          <div class="form-group-inline">
            <div class="wrapper">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control">
              <?php
                if (isset($_SESSION['errValidation']['password'])) {
                  echo "<div class='alert danger' style='text-align: left;'>
                    <p>".$_SESSION['errValidation']['password']."</p>
                  </div>";
                  unset($_SESSION['errValidation']['password']);
                }
              ?>
            </div>
            <div class="wrapper">
              <label for="passwordConfirm">Konfirmasi Password</label>
              <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control">
              <?php
                if (isset($_SESSION['errValidation']['passwordConfirm'])) {
                  echo "<div class='alert danger' style='text-align: left;'>
                    <p>".$_SESSION['errValidation']['passwordConfirm']."</p>
                  </div>";
                  unset($_SESSION['errValidation']['passwordConfirm']);
                }
              ?>
            </div>
          </div>
          <button type="submit" class="login-btn primary-btn fwidth">Registrasi</button>
        </form>
        <a href="login.php" class="register-btn primary-btn-outlined fwidth">Login</a>
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