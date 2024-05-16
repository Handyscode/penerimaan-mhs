<?php
function validate_form($conn, $data) {
    $errors = [
        "nama" => "",
        "email" => "",
        "jenis_kelamin" => "",
        "notelp" => "",
        "tglahir" => "",
        "alamat" => "",
    ];

    // Sanitize inputs
    $nama = $conn->real_escape_string(trim($data['nama']));
    $email = $conn->real_escape_string(trim($data['email']));
    $jenis_kelamin = $conn->real_escape_string(trim($data['jenis_kelamin']));
    $notelp = $conn->real_escape_string(trim($data['notelp']));
    $tglahir = $conn->real_escape_string(trim($data['tglahir']));
    $alamat = $conn->real_escape_string(trim($data['alamat']));

    // Validate nama
    if (empty($nama)) {
        $errors['nama'] = "Nama is required.";
    }

    // Validate email
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Validate jenis_kelamin
    if (empty($jenis_kelamin)) {
        $errors['jenis_kelamin'] = "Jenis Kelamin is required.";
    }

    // Validate notelp
    if (empty($notelp)) {
        $errors['notelp'] = "No Telp is required.";
    } elseif (!preg_match('/^[0-9]{10,15}$/', $notelp)) {
        $errors['notelp'] = "Invalid phone number format. It should contain only digits and be between 10 to 15 characters.";
    }

    // Validate tglahir
    if (empty($tglahir)) {
        $errors['tglahir'] = "Tanggal Lahir is required.";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tglahir)) {
        $errors['tglahir'] = "Invalid date format. Use YYYY-MM-DD.";
    }

    // Validate alamat
    if (empty($alamat)) {
        $errors['alamat'] = "Alamat is required.";
    }

    return [$errors, compact('nama', 'email', 'jenis_kelamin', 'notelp', 'tglahir', 'alamat')];
}