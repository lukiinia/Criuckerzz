<?php
session_start();
include '../adminfinish/db.php';

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Fetch product data
    $sql = "SELECT nama_produk, harga, foto FROM produk WHERE id_product = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        // Initialize cart session if not set
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add or update the product in the cart session
        $_SESSION['cart'][$productId] = [
            'id' => $productId,
            'name' => $product['nama_produk'],
            'price' => $product['harga'],
            'quantity' => $quantity,
            'image' => $product['foto']
        ];

        // Render the updated cart HTML
        include 'cart_template.php';
    }
}
?>
