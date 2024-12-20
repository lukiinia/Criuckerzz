<?php
session_start();

// Inisialisasi keranjang jika belum ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Fungsi untuk menambah produk ke keranjang
function addToCart($id_product, $name, $price, $quantity, $image) {
    // Cek apakah produk sudah ada di keranjang
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id_product'] == $id_product) {
            $item['quantity'] += $quantity; // Tambah kuantitas jika produk sudah ada
            $found = true;
            break;
        }
    }

    // Jika produk belum ada, tambahkan produk baru
    if (!$found) {
        $_SESSION['cart'][] = [
            'id_product' => $id_product,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $image
        ];
    }
}

// Tangani permintaan AJAX untuk menambah produk ke keranjang
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_product = $_POST['id_product'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];

    addToCart($id_product, $name, $price, $quantity, $image);
    echo json_encode(['status' => 'success', 'message' => 'Produk berhasil ditambahkan ke keranjang']);
}
?>
