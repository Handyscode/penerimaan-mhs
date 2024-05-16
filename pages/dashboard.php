<?php include('../functions/dashboard_func.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Penerimaan Mahasiswa Baru</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

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
        <?php if($_SESSION['tipe'] == 'pendaftar') { ?>
          <li>
            <a href="data-pendaftar.php">Data Pendaftar</a>
          </li>
        <?php } ?>
      </ul>
    </nav>
    <div class="action-btn">
      <a href="../logout.php" class="logout-btn primary-btn fwidth">Logout</a>
    </div>
  </header>

  <div class="dashboard-container">
    <div class="content-parent">
      <div class="title">
        <h1>DASHBOARD</h1>
      </div>

      <?php if ($_SESSION['tipe'] == 'pendaftar') {
        include('../template/pendaftar_dash.php');
      }else{
        include('../template/admin_dash.php');
      } ?>
    </div>
  </div>

  <footer class="dashboard-footer">
    <p class="copyright">Copyright &copy; 2024 - Penerimaan Mahasiswa Baru</p>
  </footer>

  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#table_pendaftar').DataTable();
  </script>
</body>
</html>