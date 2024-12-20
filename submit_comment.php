<?php
// Koneksi ke database
include('../adminfinish/db.php'); // Pastikan file koneksi sudah benar

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_produk = $_POST['id_produk']; // Gunakan id_produk yang dikirimkan dari form
    $id_user = $_POST['id_user']; // Ambil id_user dari form
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $rating = $_POST['rating'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Validasi input
    if (empty($customer_name) || empty($rating) || empty($comment) || empty($id_produk) || empty($id_user)) {
        echo "Semua kolom harus diisi!";
        exit;
    }

    // Masukkan data ke database
    $query = "INSERT INTO comments (id_produk, id_user, customer_name, rating, comment, comment_date, status) 
              VALUES ('$id_produk', '$id_user', '$customer_name', '$rating', '$comment', NOW(), 'Aktif')";
    if (mysqli_query($conn, $query)) {
        // Komentar berhasil dimasukkan
        echo "Komentar berhasil dikirim!";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);

    // Redirect kembali ke halaman produk (halaman akan direload)
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
