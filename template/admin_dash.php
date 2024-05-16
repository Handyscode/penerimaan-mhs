<div class="card-wrapper">
  <div class="card text-left fwidth" style="width: 64rem;">
  <?php
    if (isset($_SESSION['errMsg'])) {
      echo "<div class='alert danger' style='font-size: 18px;'>
        <p>".$_SESSION['errMsg']."</p>
      </div>";
      unset($_SESSION['errMsg']);
    }
    ?>
    <?php
    if (isset($_SESSION['successMsg'])) {
      echo "<div class='alert success' style='font-size: 18px;'>
        <p>".$_SESSION['successMsg']."</p>
      </div>";
      unset($_SESSION['successMsg']);
    }
  ?>
    <div class="card-title">
      <h2>Data Pendaftar</h2>
    </div>
    <div class="card-content">
      <div class="parent" style="overflow-x: auto;">
        <table class="table" style="width: 100%; overflow-x: auto;" cellpadding="0" cellspacing="0" id="table_pendaftar">
          <thead class="table-head">
            <tr>
              <th style="min-width: 150px; background: #2b2d42;">ID Pendaftar</th>
              <th style="min-width: 150px; background: #2b2d42;">Foto</th>
              <th style="min-width: 150px; background: #2b2d42;">Nama Lengkap</th>
              <th style="min-width: 150px; background: #2b2d42;">Email</th>
              <th style="min-width: 150px; background: #2b2d42;">Nomor Telepon</th>
              <th style="min-width: 150px; background: #2b2d42;">Jenis Kelamin</th>
              <th style="min-width: 150px; background: #2b2d42;">Tanggal Lahir</th>
              <th style="min-width: 150px; background: #2b2d42;">Alamat</th>
              <th style="min-width: 150px; background: #2b2d42;">Transkrip Nilai</th>
              <th style="min-width: 150px; background: #2b2d42;">Surat Rekomendasi</th>
              <th style="min-width: 150px; background: #2b2d42;">Sertifikat Lomba</th>
              <th style="min-width: 150px; background: #2b2d42;">Status</th>
              <th style="min-width: 150px; background: #2b2d42;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>
              <?php 
                $date = new DateTime($row['tglahir']);
                $tglahir = strftime('%d %B %Y', $date->getTimestamp());
              ?>
              <tr>
                <td> <?= $row['pendaftar_id'] ?> </td>
                <td> <img src="<?= !empty($row['foto']) ? '../assets/uploads/foto/' . $row['foto'] : '../assets/img/default.jpg' ?>" alt="foto" style="width: 75px;"> </td>
                <td> <?= $row['nmlengkap'] ?> </td>
                <td> <?= $row['email'] ?> </td>
                <td> <?= $row['notelp'] ?> </td>
                <td> <?= $row['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?> </td>
                <td> <?= $tglahir ?> </td>
                <td> <?= $row['alamat'] ?> </td>
                <td> <img src="<?= !empty($row['transkrip_nilai']) ? '../assets/uploads/nilai/' . $row['transkrip_nilai'] : '../assets/img/default.jpg' ?>" alt="transkrip-nilai" style="width: 75px;"> </td>
                <td> <img src="<?= !empty($row['surat_rekomendasi']) ? '../assets/uploads/rekomen/' . $row['surat_rekomendasi'] : '../assets/img/default.jpg' ?>" alt="surat-rekomendasi" style="width: 75px;"> </td>
                <td> <img src="<?= !empty($row['sertifikat_lomba']) ? '../assets/uploads/sertifikat/' . $row['sertifikat_lomba'] : '../assets/img/default.jpg' ?>" alt="sertifikat-lomba" style="width: 75px;"> </td>
                <td> 
                <?php if(!isset($row['status'])) { ?>
                  <p style="font-weight: 400;" class="chip secondary"><?= 'Belum Diproses'  ?></p>
                <?php } elseif($row['status'] == 'proses') {?>
                  <p style="font-weight: 400; width: 100%;" class="chip primary"><?= ucfirst($row['status']) ?></p>
                <?php } elseif($row['status'] == 'diterima') { ?>
                  <p style="font-weight: 400; width: 100%;" class="chip success"><?= ucfirst($row['status']) ?></p>
                <?php } else { ?>
                  <p style="font-weight: 400; width: 100%;" class="chip danger"><?= ucfirst($row['status']) ?></p>
                <?php } ?>  
                </td>
                <td>
                  <?php if($row['status'] == 'proses') { ?>
                    <a href="../pages/terima.php?id=<?= $row['pendaftar_id'] ?>" class="success-btn" style="display: block;" onclick="return confirm('Anda yakin ingin menerima calon mahasiswa ini?')">Terima</a> / <a href="../pages/tolak.php?id=<?= $row['pendaftar_id'] ?>" class="primary-btn" style="display: block;" onclick="return confirm('Anda yakin ingin menolak calon mahasiswa ini?')">Tolak</a>
                  <?php } ?>
                </td>
              </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>