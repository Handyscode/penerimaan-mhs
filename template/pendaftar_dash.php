<div class="card-wrapper">
  <div class="card text-left" style="width: 64rem;">
    <div class="card-title">
      <h2>Informasi Pendaftar</h2>
    </div>
    <div class="card-content">
      <div class="profile">
        <img src="<?= isset($result['foto']) ? '../assets/uploads/foto/'.$result['foto'] : '../assets/img/default.jpg' ?>" alt="profile-pict" width="200">
      </div>
      <div class="pendaftar-detail">
        <div class="info">
          <div class="info-item">
            <p>Nama Lengkap : <span style="font-weight: 400;"><?= $result['nmlengkap'] ?></span></p>
          </div>
          <div class="info-item">
            <p>Jenis Kelamin : <span style="font-weight: 400;"><?= $result['jenis_kelamin'] ?></span></p>
          </div>
          <div class="info-item">
            <p>Email : <span style="font-weight: 400;"><?= $result['email'] ?></span></p>
          </div>
          <div class="info-item">
            <p>Nomor Telepon : <span style="font-weight: 400;"><?= $result['notelp'] ?></span></p>
          </div>
          <div class="info-item">
            <p>Tanggal Lahir : <span style="font-weight: 400;"><?= $tglahir ?></span></p>
          </div>
          <div class="info-item">
            <p>Alamat Lengkap : <span style="font-weight: 400;"><?= $result['alamat'] ?></span></p>
          </div>
        </div>
        <div class="photo-detail">
          <label class="title">Foto</label>
          <div class="image-wrapper">
            <div class="transkrip-nilai" style="flex: 1;">
              <img src="<?= isset($result['transkrip_nilai']) ? '../assets/uploads/nilai/'.$result['transkrip_nilai'] : '../assets/img/default.jpg' ?>" alt="profile-pict" class="image">
            </div>
            <div class="surat-rekomendasi" style="flex: 1;">
              <img src="<?= !empty($result['surat_rekomendasi']) ? '../assets/uploads/rekomen/'.$result['surat_rekomendasi'] : '../assets/img/default.jpg' ?>" alt="profile-pict" class="image">
            </div>
            <div class="sertifikat-lomba" style="flex: 1;">
              <img src="<?= !empty($result['sertifikat_lomba']) ? '../assets/uploads/sertifikat/'.$result['sertifikat_lomba'] : '../assets/img/default.jpg' ?>" alt="profile-pict" class="image">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wrapper">
    <div class="card text-left" style="height:max-content;">
      <div class="card-title">
        <h2>Informasi Penerimaan Mahasiswa</h2>
      </div>
      <div class="card-content inline">
        <div class="profile">
          <img src="<?= isset($result['foto']) ? '../assets/uploads/foto/'.$result['foto'] : '../assets/img/default.jpg' ?>" alt="profile-pict" width="200">
        </div>
        <div class="info-parent">
          <div class="info-item inline">
            <label>Nama Lengkap</label>
            <p style="font-weight: 400;"><?= $result['nmlengkap'] ?></p>
          </div>
          <div class="info-item inline">
            <label>Jenis Kelamin</label>
            <p style="font-weight: 400;"><?= $result['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></p>
          </div>
          <div class="info-item inline">
            <label>Email</label>
            <p style="font-weight: 400;"><?= $result['email'] ?></p>
          </div>
          <div class="info-item inline">
            <label>Status</label>
            <?php if(!isset($result['status'])) { ?>
              <p style="font-weight: 400;" class="chip secondary"><?= 'Belum Diproses'  ?></p>
            <?php } elseif($result['status'] == 'proses') {?>
              <p style="font-weight: 400;" class="chip primary"><?= ucfirst($result['status']) ?></p>
            <?php } elseif($result['status'] == 'diterima') { ?>
              <p style="font-weight: 400;" class="chip success"><?= ucfirst($result['status']) ?></p>
            <?php } else { ?>
              <p style="font-weight: 400;" class="chip danger"><?= ucfirst($result['status']) ?></p>
            <?php } ?>
            </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="action-btn">
          <?php if(isset($result['status'])) {?>
            <a href="#" class="login-btn success-btn fwidth disabled">Data sudah lengkap</a>
          <?php }else{?>
            <a href="data-pendaftar.php" class="login-btn primary-btn fwidth">Lengkapi Data</a>
          <?php }?>
        </div>
      </div>
    </div>
    <?php if(!isset($result['status'])) { ?>
      <div class="note">
        <p><strong>NOTE:</strong> Lengkapi data terlebih dahulu untuk melanjutkan proses pendaftaran</p>
      </div>
    <?php } ?>
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