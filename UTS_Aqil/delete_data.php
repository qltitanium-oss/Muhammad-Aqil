<?php
// Koneksi database dbweb
require_once __DIR__ . "/connect_dbweb.php";

// Mengambil NIM dari form
$nim = $_POST['nim'];

// Deteksi nama tabel: nilai_mhsw atau nilaimhsw
$check_table = mysqli_query($conn, "SHOW TABLES LIKE 'nilai_mhsw'");
$table_name = ($check_table && mysqli_num_rows($check_table) > 0) ? "nilai_mhsw" : "nilaimhsw";

// Query hapus data pada tabel
$sql = "DELETE FROM `$table_name` WHERE `NIM` = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $nim);

if (mysqli_stmt_execute($stmt)) {
    header("Location: users.php");
    exit;
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
