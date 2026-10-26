<?php
// Koneksi ke database dbweb
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbweb";

if (!isset($conn) || !($conn instanceof mysqli) || !@mysqli_ping($conn)) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
?>