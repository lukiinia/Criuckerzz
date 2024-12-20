<?php
session_start();
include '../adminfinish/db.php';

// Pastikan ada `id_produk` di URL
if (isset($_GET['id_produk']) && !empty($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Query untuk mengambil data produk berdasarkan ID
    $sql = "SELECT id_produk, foto, nama_produk, harga FROM produk WHERE id_produk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        // Default kuantitas produk
        $quantity = 1;

        // Cek apakah produk sudah ada di keranjang
        if (isset($_SESSION['cart'][$id_produk])) {
            // Jika ada, tambahkan kuantitas
            $_SESSION['cart'][$id_produk]['quantity'] += $quantity;
        } else {
            // Jika tidak, tambahkan produk baru ke keranjang
            $_SESSION['cart'][$id_produk] = [
                'id' => $product['id_produk'],
                'foto' => $product['foto'],
                'nama_produk' => $product['nama_produk'],
                'harga' => $product['harga'],
                'quantity' => $quantity
            ];
        }

        // Redirect kembali ke halaman sebelumnya
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "ID produk tidak valid.";
}

// Tutup koneksi
$conn->close();
?>
