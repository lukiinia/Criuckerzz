<?php
session_start();
include '../adminfinish/db.php'; // Koneksi database

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Cek status pembayaran
$id_user = $_SESSION['user_id'];
$sql = "SELECT * FROM pembayaran WHERE id_pelanggan = ? AND status = 'Menunggu Konfirmasi'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Tampilkan status pembayaran
    echo "Pembayaran sedang menunggu konfirmasi.";
} else {
    echo "Tidak ada pembayaran yang menunggu konfirmasi.";
}
$stmt->close();
?>
