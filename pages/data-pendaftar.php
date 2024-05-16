<?php include('../functions/data_pendaftar_func.php') ?>
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
  <header class="header-sidebar">
    <div class="navbrand-sidebar">
      <a href="">Penerimaan Mahasiswa</a>
    </div>
    <nav class="navbar-sidebar">
      <ul>
        <li>
          <a href="dashboard.php">Beranda</a>
        </li>
        <li>
          <a href="form-daftar.php">Data Pendaftar</a>
        </li>
      </ul>
    </nav>
    <div class="action-btn">
      <a href="login.php" class="logout-btn primary-btn fwidth">Logout</a>
    </div>
  </header>

  <div class="dashboard-container">
    <div class="content-parent">
      <div class="title">
        <h1>DASHBOARD</h1>
      </div>
      <div class="card text-left">
        <div class="card-title">
          <h2>Edit Informasi Pendaftar</h2>
        </div>
      <div class="card-content">
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="pendaftar_id" value="<?= $result['pendaftar_id'] ?>">
          <div class="form-group">
            <label for="foto">Foto Profil</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
            <?php
              if (isset($_SESSION['errValidation']['foto'])) {
                echo "<div class='alert danger' style='text-align: left;'>
                  <p>".$_SESSION['errValidation']['foto']."</p>
                </div>";
                unset($_SESSION['errValidation']['foto']);
              }
            ?>
          </div>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $result['nmlengkap'] ?>">
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
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $result['email'] ?>">
            <?php
              if (isset($_SESSION['errValidation']['email'])) {
                echo "<div class='alert danger' style='text-align: left;'>
                  <p>".$_SESSION['errValidation']['email']."</p>
                </div>";
                unset($_SESSION['errValidation']['email']);
              }
            ?>
          </div>
          <div class="form-group">
            <label for="notelp">Nomor Telepon</label>
            <input type="tel" name="notelp" id="notelp" class="form-control" value="<?= $result['notelp'] ?>">
            <?php
              if (isset($_SESSION['errValidation']['notelp'])) {
                echo "<div class='alert danger' style='text-align: left;'>
                  <p>".$_SESSION['errValidation']['notelp']."</p>
                </div>";
                unset($_SESSION['errValidation']['notelp']);
              }
            ?>
          </div>
          <div class="form-group">
            <label for="tglahir">Tanggal Lahir</label>
            <input type="date" name="tglahir" id="tglahir" class="form-control" value="<?= $result['tglahir'] ?>">
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
            <textarea name="alamat" id="alamat" class="form-control textarea"><?= $result['alamat'] ?></textarea>
            <?php
              if (isset($_SESSION['errValidation']['alamat'])) {
                echo "<div class='alert danger' style='text-align: left;'>
                  <p>".$_SESSION['errValidation']['alamat']."</p>
                </div>";
                unset($_SESSION['errValidation']['alamat']);
              }
            ?>
          </div>
          <div class="form-group">
            <label for="transkrip_nilai">Transkrip Nilai</label>
            <input type="file" name="transkrip_nilai" id="transkrip_nilai" class="form-control" accept="image/*" required>
            <?php
              if (isset($_SESSION['errValidation']['transkrip_nilai'])) {
                echo "<div class='alert danger' style='text-align: left;'>
                  <p>".$_SESSION['errValidation']['transkrip_nilai']."</p>
                </div>";
                unset($_SESSION['errValidation']['transkrip_nilai']);
              }
            ?>
          </div>
          <div class="form-group">
            <label for="surat_rekomendasi">Surat Rekomendasi</label>
            <input type="file" name="surat_rekomendasi" id="surat_rekomendasi" class="form-control" accept="image/*">
            <?php
              if (isset($_SESSION['errValidation']['surat_rekomendasi'])) {
                echo "<div class='alert danger' style='text-align: left;'>
                  <p>".$_SESSION['errValidation']['surat_rekomendasi']."</p>
                </div>";
                unset($_SESSION['errValidation']['surat_rekomendasi']);
              }
            ?>
          </div>
          <div class="form-group">
            <label for="sertifikat_lomba">Sertifikat Lomba</label>
            <input type="file" name="sertifikat_lomba" id="sertifikat_lomba" class="form-control" accept="image/*">
            <?php
              if (isset($_SESSION['errValidation']['sertifikat_lomba'])) {
                echo "<div class='alert danger' style='text-align: left;'>
                  <p>".$_SESSION['errValidation']['sertifikat_lomba']."</p>
                </div>";
                unset($_SESSION['errValidation']['sertifikat_lomba']);
              }
            ?>
          </div>
          <button type="submit" class="login-btn primary-btn fwidth">Simpan Perubahan</button>
        </form>
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
  </div>

  <footer class="dashboard-footer">
    <p class="copyright">Copyright &copy; 2024 - Penerimaan Mahasiswa Baru</p>
  </footer>
</body>
</html>