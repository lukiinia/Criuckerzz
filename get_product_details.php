<?php
// Menghubungkan ke database
include '../adminfinish/db.php';

// Mendapatkan ID produk dari query parameter
$id_produk = $_GET['id_produk'];

// Query untuk mendapatkan detail produk
$sql = "SELECT id_produk, foto, nama_produk, harga, kategori, deskripsi, stok FROM produk WHERE id_produk = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_produk);
$stmt->execute();
$result = $stmt->get_result();

// Memeriksa apakah produk ditemukan
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Mengirim data produk dalam format JSON
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Produk tidak ditemukan.']);
}

// Menutup koneksi database
$conn->close();
?>
