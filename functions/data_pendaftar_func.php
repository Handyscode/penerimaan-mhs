<?php
session_start();
include '../connection.php';
include 'daftar_validation_func.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: login.php");
  exit;
}

setlocale(LC_ALL, 'ID');

$userAuth = $_SESSION['email'];

$sql = "SELECT * FROM pendaftar where email = '$userAuth'";
$result = $conn->query($sql)->fetch_assoc();

$date = new DateTime($result['tglahir']);
$tglahir = strftime('%d %B %Y', $date->getTimestamp());


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $pendaftarId = $_POST['pendaftar_id'];
  $foto = $_FILES['foto'];
  $sertifikat_lomba = $_FILES['sertifikat_lomba']['size'] > 0 ? $_FILES['sertifikat_lomba'] : null;
  $transkrip_nilai = $_FILES['transkrip_nilai'];
  $surat_rekomendasi = $_FILES['surat_rekomendasi']['size'] > 0 ? $_FILES['surat_rekomendasi'] : null;

  $dirFoto = '../assets/uploads/foto/';
  $dirNilai = '../assets/uploads/nilai/';
  $dirRekomen = '../assets/uploads/rekomen/';
  $dirSertifikat = '../assets/uploads/sertifikat/';

  $namaFoto = 'foto-'.rand(100000, 999999).'.'.pathinfo($foto['name'], PATHINFO_EXTENSION);
  $namaNilai = 'nilai-'.rand(100000, 999999).'.'.pathinfo($transkrip_nilai['name'], PATHINFO_EXTENSION);
  $namaRekomen = $_FILES['surat_rekomendasi']['size'] > 0 ? 'rekomen-'.rand(100000, 999999).'.'.pathinfo($surat_rekomendasi['name'], PATHINFO_EXTENSION) : null;
  $namaSertifikat = $_FILES['sertifikat_lomba']['size'] > 0 ? 'sertifikat-'.rand(100000, 999999).'.'.pathinfo($sertifikat_lomba['name'], PATHINFO_EXTENSION) : null;

  $targetFoto = $dirFoto . $namaFoto;
  $targetNilai = $dirNilai . $namaNilai;
  $targetRekomen = $_FILES['surat_rekomendasi']['size'] > 0 ? $dirRekomen . $namaRekomen : null;
  $targetSertifikat = $_FILES['sertifikat_lomba']['size'] > 0 ? $dirSertifikat . $namaSertifikat : null;

  // Validation
  list($errors, $validatedData) = validate_form($conn, $_POST);
  // Validate file upload
  if (isset($foto) && $foto['error'] == 0) {
      $allowed_types = ['image/jpeg', 'image/png'];
      $file_type = mime_content_type($foto['tmp_name']);

      if (!in_array($file_type, $allowed_types)) {
          $_SESSION['errValidation']['foto'] = "Invalid file type. Only JPG & PNG are allowed.";
      }
  } else {
      $_SESSION['errValidation']['foto'] = "File upload is required.";
  }
  
  // Validate file upload
  if (isset($transkrip_nilai) && $transkrip_nilai['error'] == 0) {
      $allowed_types = ['image/jpeg', 'image/png'];
      $file_type = mime_content_type($transkrip_nilai['tmp_name']);

      if (!in_array($file_type, $allowed_types)) {
          $_SESSION['errValidation']['transkrip_nilai'] = "Invalid file type. Only JPG & PNG are allowed.";
      }
  } else {
      $_SESSION['errValidation']['transkrip_nilai'] = "File upload is required.";
  }

  // Validate file upload
  if (isset($surat_rekomendasi) && $surat_rekomendasi['error'] == 0) {
      $allowed_types = ['image/jpeg', 'image/png'];
      $file_type = mime_content_type($surat_rekomendasi['tmp_name']);

      if (!in_array($file_type, $allowed_types)) {
          $_SESSION['errValidation']['surat_rekomendasi'] = "Invalid file type. Only JPG & PNG are allowed.";
      }
  }

  // Validate file upload
  if (isset($sertifikat_lomba) && $sertifikat_lomba['error'] == 0) {
      $allowed_types = ['image/jpeg', 'image/png'];
      $file_type = mime_content_type($sertifikat_lomba['tmp_name']);

      if (!in_array($file_type, $allowed_types)) {
          $_SESSION['errValidation']['sertifikat_lomba'] = "Invalid file type. Only JPG & PNG are allowed.";
      }
  }

  if (isset($foto) && $foto['size'] > 5000000) {
    $_SESSION['errValidation']['foto'] = 'Ukuran maksimal file adalah 5MB';
  }
  if (isset($transkrip_nilai) && $transkrip_nilai['size'] > 5000000) {
    $_SESSION['errValidation']['transkrip_nilai'] = 'Ukuran maksimal file adalah 5MB';
  }
  if (isset($sertifikat_lomba) && $sertifikat_lomba['size'] > 5000000) {
    $_SESSION['errValidation']['sertifikat_lomba'] = 'Ukuran maksimal file adalah 5MB';
  }
  if (isset($surat_rekomendasi) && $surat_rekomendasi['size'] > 5000000) {
    $_SESSION['errValidation']['surat_rekomendasi'] = 'Ukuran maksimal file adalah 5MB';
  }

  if (!array_filter($errors) && !$_SESSION['errValidation']) {
    $nama = $validatedData['nama'];
    $jenis_kelamin = $validatedData['jenis_kelamin'];
    $email = $validatedData['email'];
    $notelp = $validatedData['notelp'];
    $tglahir = $validatedData['tglahir'];
    $alamat = $validatedData['alamat'];

    try {
      move_uploaded_file($foto['tmp_name'], $targetFoto);
      move_uploaded_file($transkrip_nilai['tmp_name'], $targetNilai);

      if ($sertifikat_lomba) {
        move_uploaded_file($sertifikat_lomba['tmp_name'], $targetSertifikat);
      }
      
      if ($surat_rekomendasi) {
        move_uploaded_file($surat_rekomendasi['tmp_name'], $targetRekomen);
      }
    } catch (\Exception $e) {
      $_SESSION['errMsg'] = $e;
      return;
    }

    $sql = "UPDATE pendaftar SET nmlengkap='$nama', jenis_kelamin='$jenis_kelamin', notelp='$notelp', tglahir='$tglahir', alamat='$alamat', foto='$namaFoto', transkrip_nilai='$namaNilai', surat_rekomendasi='$namaRekomen', sertifikat_lomba='$namaSertifikat', status='proses' WHERE pendaftar_id = '$pendaftarId'";
    $result = $conn->query($sql);

    if ($result) {
      $_SESSION['successMsg'] = 'Berhasil menyimpan data';
    }else{
      $_SESSION['errMsg'] = 'Data gagal disimpan';
    }
    header('Location: dashboard.php');
  }
}