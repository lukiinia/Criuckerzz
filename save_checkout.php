<?php
session_start();
include '../adminfinish/db.php';

// Pastikan user_id ada dalam session
if (!isset($_SESSION['user_id'])) {
    die("User ID tidak ditemukan. Pastikan Anda sudah login.");
}

// Cek apakah data form dikirim dengan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dengan validasi
    $provinsi = mysqli_real_escape_string($conn, $_POST['provinsi']);
    $kabupaten_kota = mysqli_real_escape_string($conn, $_POST['kabupaten_kota']);
    $kecamatan = mysqli_real_escape_string($conn, $_POST['kecamatan']);
    $alamat_lengkap = mysqli_real_escape_string($conn, $_POST['alamat_lengkap']);
    $nomor_hp = mysqli_real_escape_string($conn, $_POST['nomor_hp']);
    $nama_penerima = mysqli_real_escape_string($conn, $_POST['nama_penerima']);
    $metode_pembayaran = mysqli_real_escape_string($conn, $_POST['metode_pembayaran']);
    $nomor_rekening = mysqli_real_escape_string($conn, $_POST['nomor_rekening']);
    $nama_pemilik = mysqli_real_escape_string($conn, $_POST['nama_pemilik']);
    $bukti_pembayaran = $_FILES['bukti_pembayaran'];

    // Validasi apakah semua data sudah diisi
    if (empty($provinsi) || empty($kabupaten_kota) || empty($kecamatan) || empty($alamat_lengkap) || empty($nomor_hp) || empty($nama_penerima)) {
        die("Semua data harus diisi!");
    }

    // Tangani upload bukti pembayaran (jika ada)
    $bukti_pembayaran_path = null;
    if (isset($bukti_pembayaran) && $bukti_pembayaran['error'] === UPLOAD_ERR_OK) {
        // Periksa tipe file
        $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
        $fileTmpPath = $bukti_pembayaran['tmp_name'];
        $fileName = time() . '_' . $bukti_pembayaran['name'];
        $uploadFileDir = '../adminfinish/uploads/';
        $dest_path = $uploadFileDir . $fileName;

        // Periksa apakah tipe file valid
        if (in_array($bukti_pembayaran['type'], $allowed_types)) {
            // Pindahkan file ke folder tujuan
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $bukti_pembayaran_path = $fileName;
            } else {
                die("Gagal mengupload bukti pembayaran.");
            }
        } else {
            die("Tipe file tidak valid. Hanya gambar dan PDF yang diperbolehkan.");
        }
    }

    // Simpan data pelanggan ke tabel `pelanggan`
    $id_user = $_SESSION['user_id'];
    $sql_pelanggan = "INSERT INTO pelanggan (id_user, provinsi, kabupaten_kota, kecamatan, alamat_lengkap, nomor_hp, nama_penerima) 
                      VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_pelanggan);
    mysqli_stmt_bind_param($stmt, 'issssss', $id_user, $provinsi, $kabupaten_kota, $kecamatan, $alamat_lengkap, $nomor_hp, $nama_penerima);
    if (!mysqli_stmt_execute($stmt)) {
        die("Error: " . mysqli_error($conn));
    }

    // Ambil ID pelanggan yang baru ditambahkan
    $id_pelanggan = mysqli_insert_id($conn);

    // Simpan data pesanan ke tabel `pesanan`
    $subtotal = isset($_SESSION['subtotal']) ? $_SESSION['subtotal'] : 0;  // Cek jika variabel session ada
    $shipping_cost = isset($_SESSION['shipping_cost']) ? $_SESSION['shipping_cost'] : 0;  // Cek jika variabel session ada
    $total = $subtotal + $shipping_cost;

    $sql_pesanan = "INSERT INTO pesanan (id_user, id_pelanggan, subtotal, shipping_cost, total, status) 
                    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_pesanan = mysqli_prepare($conn, $sql_pesanan);
    $status = 'Pending';  // Tentukan nilai status terlebih dahulu
    mysqli_stmt_bind_param($stmt_pesanan, 'iiidds', $id_user, $id_pelanggan, $subtotal, $shipping_cost, $total, $status);
    if (!mysqli_stmt_execute($stmt_pesanan)) {
        die("Error: " . mysqli_error($conn));
    }

    // Ambil ID pesanan yang baru ditambahkan
    $id_pesanan = mysqli_insert_id($conn);

    // Simpan detail pesanan ke tabel `detail_pesanan`
    foreach ($_SESSION['cart'] as $item) {
        $id_product = $item['id'];  // Menggunakan 'id_product' sesuai kolom di database
        $quantity = $item['quantity'];
        $total_harga = $item['harga'] * $quantity;

        $sql_detail = "INSERT INTO detail_pesanan (id_pesanan, id_product, quantity, total_harga) 
                       VALUES (?, ?, ?, ?)";
        $stmt_detail = mysqli_prepare($conn, $sql_detail);
        mysqli_stmt_bind_param($stmt_detail, 'iiid', $id_pesanan, $id_product, $quantity, $total_harga);
        if (!mysqli_stmt_execute($stmt_detail)) {
            die("Error: " . mysqli_error($conn));
        }

        // Update stok produk di tabel `produk`
        $sql_update_stok = "UPDATE produk SET stok = stok - ? WHERE id_produk = ?";
        $stmt_update_stok = mysqli_prepare($conn, $sql_update_stok);
        mysqli_stmt_bind_param($stmt_update_stok, 'ii', $quantity, $id_product);
        if (!mysqli_stmt_execute($stmt_update_stok)) {
            die("Error: " . mysqli_error($conn));
        }
    }

    // Simpan metode pembayaran ke tabel `pembayaran`
    $sql_pembayaran = "INSERT INTO pembayaran (id_pesanan, metode_pembayaran, nomor_rekening, nama_pemilik, bukti_pembayaran, status_pembayaran) 
                       VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_pembayaran = mysqli_prepare($conn, $sql_pembayaran);
    $status = 'Pending';  // Tentukan nilai status terlebih dahulu
    mysqli_stmt_bind_param($stmt_pembayaran, 'isssss', $id_pesanan, $metode_pembayaran, $nomor_rekening, $nama_pemilik, $bukti_pembayaran_path, $status);
    if (!mysqli_stmt_execute($stmt_pembayaran)) {
        die("Error: " . mysqli_error($conn));
    }

    // Set ID pesanan ke session untuk digunakan di halaman lain
    $_SESSION['id_pesanan'] = $id_pesanan;

    // Redirect ke halaman sukses pesanan
    header("Location: order_success.php");
    exit;
}
?>
