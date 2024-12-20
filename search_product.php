<?php
// File: search_product.php

include '../adminfinish/db.php'; // Sambungkan ke database

if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($conn, $_GET['query']);
    $sql = "SELECT * FROM produk WHERE nama_produk LIKE '%$query%' LIMIT 1"; // Cari produk dengan nama yang sesuai
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Jika produk ditemukan, kembalikan id_produk
        echo json_encode(['found' => true, 'id_produk' => $row['id_produk']]);
    } else {
        // Jika produk tidak ditemukan
        echo json_encode(['found' => false]);
    }
}
?>
