<?php
// Menyambungkan ke database
include '../adminfinish/db.php'; // pastikan koneksi database sudah benar

if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($conn, $_GET['query']); // Menghindari SQL injection
    $sql = "SELECT * FROM produk WHERE nama_produk LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Menampilkan hasil pencarian
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>Nama Produk: " . $row['nama_produk'] . "</p>";
        }
    } else {
        echo "Produk tidak ditemukan.";
    }
}
?>
