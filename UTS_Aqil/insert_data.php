<?php
// Set zona waktu agar jam sesuai WIB
date_default_timezone_set('Asia/Jakarta');

// Koneksi database dbweb
require_once __DIR__ . "/connect_dbweb.php";

// Mengambil data dari form dengan keamanan tambahan
$nim   = mysqli_real_escape_string($conn, $_POST['nim']);
$nama  = mysqli_real_escape_string($conn, $_POST['nama']);
$nilai = $_POST['nilai'];

// Validasi nilai
if (!is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
    echo "Nilai tidak valid! Masukkan nilai 0 - 100";
    exit;
}

// Menentukan nilai huruf dan predikat
if ($nilai >= 80.51) {
    $nilai_huruf = "A";
    $predikat    = "Sangat Memuaskan";
} elseif ($nilai >= 65.51) {
    $nilai_huruf = "B";
    $predikat    = "Memuaskan";
} elseif ($nilai >= 50.51) {
    $nilai_huruf = "C";
    $predikat    = "Cukup";
} elseif ($nilai >= 34.51) {
    $nilai_huruf = "D";
    $predikat    = "Kurang";
} else {
    $nilai_huruf = "E";
    $predikat    = "Tidak Lulus";
}

// Proses Upload Foto Profil (Jika ada file yang diupload)
$nama_file_foto = "";
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $folder_upload = __DIR__ . "/uploads/";

    // Buat folder uploads otomatis jika belum ada
    if (!is_dir($folder_upload)) {
        mkdir($folder_upload, 0777, true);
    }

    $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    // Validasi ekstensi dan ukuran maksimal 2MB (2097152 bytes)
    if (in_array($ext, $allowed) && $_FILES['foto']['size'] <= 2097152) {
        // Beri nama unik (NIM + timestamp) agar tidak bentrok
        $nama_file_foto = $nim . "_" . time() . "." . $ext;
        $tujuan = $folder_upload . $nama_file_foto;

        move_uploaded_file($_FILES['foto']['tmp_name'], $tujuan);
    } else {
        echo "Format foto harus JPG, PNG, atau WEBP dan ukuran maksimal 2MB!";
        exit;
    }
}

// Deteksi nama tabel: nilai_mhsw atau nilaimhsw
$check_table = mysqli_query($conn, "SHOW TABLES LIKE 'nilai_mhsw'");
$table_name = ($check_table && mysqli_num_rows($check_table) > 0) ? "nilai_mhsw" : "nilaimhsw";

// Deteksi nama kolom foto: apakah file_path atau foto
$check_cols = mysqli_query($conn, "SHOW COLUMNS FROM `$table_name`");
$cols = [];
if ($check_cols) {
    while ($c = mysqli_fetch_assoc($check_cols)) {
        $cols[] = $c['Field'];
    }
}
$col_foto = in_array('file_path', $cols) ? 'file_path' : (in_array('foto', $cols) ? 'foto' : '');
$foto_field = !empty($col_foto) ? ", `$col_foto`" : "";
$foto_val = !empty($col_foto) ? ", '$nama_file_foto'" : "";

$sql = "INSERT INTO `$table_name` (`NIM`, `nama mahasiswa`$foto_field, `nilai akhir`, `nilai huruf`, `predikat`, `Tanggal DIbuat`)
        VALUES ('$nim', '$nama'$foto_val, '$nilai', '$nilai_huruf', '$predikat', NOW())";

if (mysqli_query($conn, $sql)) {
    header("Location: users.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
