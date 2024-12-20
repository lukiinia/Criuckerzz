<?php
session_start();

if (isset($_GET['id_product'])) { // Ubah dari 'id' ke 'id_product'
    $product_id = $_GET['id_product'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    // Atur ulang indeks array
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

// Redirect kembali ke halaman keranjang
header("Location: cartku.php");
exit();
?>
