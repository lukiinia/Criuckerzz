<?php
session_start(); // Mulai session

// Cek apakah pengguna sudah login (cek keberadaan session id_user)
if (!isset($_SESSION['user_id'])) {
    die("User ID tidak ditemukan. Pastikan Anda sudah login.");
}

include '../adminfinish/db.php'; // Pastikan file koneksi database di-include

// Cek apakah form dikirimkan melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil id_user dari session
    $id_user = $_SESSION['user_id'];
    $message = $_POST['message']; // Ambil pesan dari form

    // Validasi data: Pastikan id_user dan message tidak kosong
    if (!empty($id_user) && !empty($message)) {
        // Query untuk menyimpan pesan ke dalam database
        $query = "INSERT INTO faq_messages (id_user, message) VALUES (?, ?)";
        $stmt = $conn->prepare($query); // Persiapkan query
        $stmt->bind_param("is", $id_user, $message); // Bind parameter untuk query

        if ($stmt->execute()) {
            // Jika berhasil, menggunakan JavaScript untuk reload halaman
            echo "<script>
                    alert('Pesan berhasil dikirim!');
                    window.location.href = 'contact.php'; // Redirect ke halaman contact.php
                  </script>";
        } else {
            // Jika gagal
            echo "<script>
                    alert('Gagal mengirim pesan.');
                    window.location.href = 'contact.php'; // Redirect ke halaman contact.php
                  </script>";
        }
    } else {
        // Jika data kosong
        echo "<script>
                alert('Data tidak lengkap.');
                window.location.href = 'contact.php'; // Redirect ke halaman contact.php
              </script>";
    }
} else {
    // Jika bukan metode POST
    echo "<script>
            alert('Metode tidak valid.');
            window.location.href = 'contact.php'; // Redirect ke halaman contact.php
          </script>";
}
?>
