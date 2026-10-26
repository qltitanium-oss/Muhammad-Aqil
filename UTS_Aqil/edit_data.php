<?php
// Set zona waktu agar jam sesuai WIB
date_default_timezone_set('Asia/Jakarta');

// Koneksi database dbweb
require_once __DIR__ . "/connect_dbweb.php";

// Mengambil data dari form
$nim_lama = mysqli_real_escape_string($conn, $_POST['nim_lama']);
$nim      = mysqli_real_escape_string($conn, $_POST['nim']);
$nama     = mysqli_real_escape_string($conn, $_POST['nama']);
$nilai    = $_POST['nilai'];

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

// Cek apakah user mengupload foto baru saat edit
$nama_file_foto = "";
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $folder_upload = __DIR__ . "/uploads/";

    if (!is_dir($folder_upload)) {
        mkdir($folder_upload, 0777, true);
    }

    $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    if (in_array($ext, $allowed) && $_FILES['foto']['size'] <= 2097152) {
        $nama_file_foto = $nim . "_" . time() . "." . $ext;
        $tujuan = $folder_upload . $nama_file_foto;

        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $tujuan)) {
            $nama_file_foto = "";
        }
    } else {
        echo "Format foto harus JPG, PNG, atau WEBP dan ukuran maksimal 2MB!";
        exit;
    }
}

$waktu_sekarang = date("Y-m-d H:i:s");

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

$query_foto = "";
if (!empty($nama_file_foto) && !empty($col_foto)) {
    $query_foto = "`$col_foto` = '$nama_file_foto', ";
}

// Query update data pada tabel nilai_mhsw / nilaimhsw
$sql = "UPDATE `$table_name` SET 
        `NIM` = '$nim', 
        `nama mahasiswa` = '$nama', 
        $query_foto
        `nilai akhir` = '$nilai', 
        `nilai huruf` = '$nilai_huruf', 
        `predikat` = '$predikat', 
        `Tanggal Diubah` = '$waktu_sekarang' 
        WHERE `NIM` = '$nim_lama'";

if (mysqli_query($conn, $sql)) {
    header("Location: users.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
