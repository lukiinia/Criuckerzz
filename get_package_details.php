<?php
require '../adminfinish/db.php'; // Koneksi ke database

header('Content-Type: application/json'); // Mengatur header JSON

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ambil parameter ID dari URL

    // Pastikan koneksi database tersedia
    if (!$conn) {
        echo json_encode(['error' => 'Database connection failed']);
        exit;
    }

    // Query data dari database
    $stmt = $conn->prepare("SELECT * FROM tb_paket_wisata WHERE id_paket = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            echo json_encode($row); // Mengembalikan data dalam format JSON
        } else {
            echo json_encode(['error' => 'Paket tidak ditemukan']);
        }

        $stmt->close();
    } else {
        echo json_encode(['error' => 'Failed to prepare statement']);
    }
} else {
    echo json_encode(['error' => 'ID paket tidak ditemukan']);
}

$conn->close(); // Tutup koneksi database
?>
