<?php
session_start();
?>


<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>
      Criuckerz
    </title>
    <meta name="author" content="Frutin" />
    <meta
      name="description"
      content="Frutin - Organic and Healthy Food HTML Template"
    />
    <meta
      name="keywords"
      content="Frutin - Organic and Healthy Food HTML Template"
    />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,shrink-to-fit=no"
    />
    <link
  rel="apple-touch-icon"
  sizes="57x57"
  href="criuckerz.png"
/>
<link
  rel="apple-touch-icon"
  sizes="60x60"
  href="criuckerz.png"
/>
<link
  rel="apple-touch-icon"
  sizes="72x72"
  href="criuckerz.png"
/>
<link
  rel="apple-touch-icon"
  sizes="76x76"
  href="criuckerz.png"
/>
<link
  rel="apple-touch-icon"
  sizes="114x114"
  href="criuckerz.png"
/>
<link
  rel="apple-touch-icon"
  sizes="120x120"
  href="criuckerz.png"
/>
<link
  rel="apple-touch-icon"
  sizes="144x144"
  href="criuckerz.png"
/>
<link
  rel="apple-touch-icon"
  sizes="152x152"
  href="criuckerz.png"
/>
<link
  rel="apple-touch-icon"
  sizes="180x180"
  href="criuckerz.png"
/>
<link
  rel="icon"
  type="image/png"
  sizes="192x192"
  href="criuckerz.png"
/>
<link
  rel="icon"
  type="image/png"
  sizes="32x32"
  href="criuckerz.png"
/>
<link
  rel="icon"
  type="image/png"
  sizes="96x96"
  href="criuckerz.png"
/>
<link
  rel="icon"
  type="image/png"
  sizes="16x16"
  href="criuckerz.png"
/>
    <link rel="manifest" href="assets/img/favicons/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta
      name="msapplication-TileImage"
      content="assets/img/favicons/ms-icon-144x144.png"
    />
    <meta name="theme-color" content="#ffffff" />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,100;9..40,200;9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&amp;family=Lexend:wght@300;400;500;600;700;800;900&amp;family=Lobster&amp;display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/app.min.css" />
    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
  <div class="preloader">
      <button class="th-btn preloaderCls">Cancel Preloader</button>
      <div class="preloader-inner">
        <div class="loader">
          <span></span> <span></span> <span></span> <span></span> <span></span>
          <span></span>
        </div>
      </div>
    </div>
   
  <div id="QuickView" class="white-popup mfp-hide">
    <div class="container bg-white rounded-10">
        <div class="row gx-60">
            <div class="col-lg-6">
                <div class="product-big-img">
                    <div class="img">
                        <img src="" alt="Product Image" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="product-about">
                    <p class="price">Rp. 0</del></p>
                    <h2 class="product-title">Product Title</h2>
                    <div class="product-rating">
                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                            <span style="width: 100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> Penilaian kustomer</span>
                        </div>
                    </div>
                    <p class="text">Product description...</p>
                    <div class="mt-2 link-inherit">
                        <p>
                            <strong class="text-title me-3">Ketersediaan:</strong>
                            <span class="stock in-stock">
                                <i class="far fa-check-square me-2 ms-1"></i> Dalam stock
                            </span>
                        </p>
                    </div>
                    <div class="actions">
                        <div class="quantity">
                            <input type="number" class="qty-input" step="1" min="1" max="100" name="quantity" value="1" title="Qty" />
                            <button class="quantity-plus qty-btn"><i class="far fa-chevron-up"></i></button>
                            <button class="quantity-minus qty-btn"><i class="far fa-chevron-down"></i></button>
                        </div>
                        <a href="add_to_cart.php?id_produk=<?php echo $id_produk; ?>" class="th-btn">Tambahkan</a>                       
                    </div>
                    <div class="product_meta">
                        <span class="sku_wrapper">Nama: <span class="sku">Kripik tempe original</span></span>
                        <span class="posted_in">Kategori: <a href="shop.php"></a></span>
                        <span>Tanda: <a href="shop.php">200g</a> <a href="shop.php">pedas</a></span>
                    </div>
                </div>
            </div>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
    </div>
</div>

<script>
// Script untuk menangani penambahan produk ke keranjang
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.add-to-cart-btn').addEventListener('click', function () {
        const productId = this.getAttribute('data-id');
        const productName = this.getAttribute('data-name');
        const productPrice = this.getAttribute('data-price');
        const productPhoto = this.getAttribute('data-photo');
        const productQuantity = document.querySelector('.qty-input').value;

        // Tambahkan produk ke session keranjang melalui AJAX
        fetch('add-to-cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: productId,
                name: productName,
                price: productPrice,
                photo: productPhoto,
                quantity: productQuantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Produk berhasil ditambahkan ke keranjang');
                // Update tampilan keranjang di header jika diperlukan
            } else {
                alert('Gagal menambahkan produk ke keranjang');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>

</div>
<div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block">
    <div class="sidemenu-content">
    <button class="closeButton sideMenuCls">
        <i class="far fa-times"></i>
    </button>
    <div class="widget woocommerce widget_shopping_cart">
        <h3 class="widget_title">Keranjangmu</h3>
        <div class="widget_shopping_cart_content">
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <ul class="woocommerce-mini-cart cart_list product_list_widget">
                    <?php 
                    $total_price = 0;
                    foreach ($_SESSION['cart'] as $item): 
                        $total_price += $item['harga'] * $item['quantity'];
                    ?>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="remove_from_cart.php?id=<?php echo urlencode($item['id']); ?>" class="remove remove_from_cart_button">
                                <i class="far fa-times"></i>
                            </a>
                            <a href="#">
                                <img src="../adminfinish/uploads/<?php echo htmlspecialchars($item['foto']); ?>" alt="Cart Image" />
                                <?php echo htmlspecialchars($item['nama_produk']); ?>
                            </a>
                            <span class="quantity">
                                <?php echo htmlspecialchars($item['quantity']); ?> × 
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">Rp </span>
                                    <?php echo number_format($item['harga'], 0, ',', '.'); ?>
                                </span>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p class="woocommerce-mini-cart__total total">
                    <strong>Total:</strong>
                    <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">Rp </span>
                        <?php echo number_format($total_price, 0, ',', '.'); ?>
                    </span>
                </p>
                <p class="woocommerce-mini-cart__buttons buttons">
                    <a href="cartku.php" class="th-btn wc-forward">Lihat Keranjang</a>
                    <a href="cartku.php" class="th-btn checkout wc-forward">Beli</a>
                </p>
            <?php else: ?>
                <p>Keranjang Anda kosong!</p>
            <?php endif; ?>
        </div>
    </div>
</div>
    </div>
    <div class="popup-search-box d-none d-lg-block">
      <button class="searchClose"><i class="fal fa-times"></i></button>
      <form action="#" onsubmit="searchFunction(event)">
  <input type="text" id="searchInput" placeholder="Masukkan kata kunci anda" />
  <button type="submit"><i class="fal fa-search"></i></button>
</form>

<script>
  function searchFunction(event) {
    event.preventDefault(); // Mencegah form submit
    const searchQuery = document.getElementById('searchInput').value.toLowerCase(); // Mengambil kata kunci pencarian

    // Mencari produk berdasarkan nama terlebih dahulu
    fetch('search_product.php?query=' + searchQuery) // Kirim request ke server untuk mencari produk
        .then(response => response.json())
        .then(data => {
            if (data.found) {
                // Arahkan ke halaman detail produk
                window.location.href = 'shop-details.php?id_produk=' + data.id_produk;
            } else {
                // Jika tidak ditemukan, periksa kategori pencarian lainnya
                if (searchQuery.includes('tempe') || searchQuery.includes('kripik')) {
                    window.location.href = 'shop.php'; // Mengarahkan ke halaman shop.php
                } else if (searchQuery.includes('tiket') || searchQuery.includes('paket mala')) {
                    window.location.href = 'tiket.php'; // Mengarahkan ke halaman tiket.php
                } else if (searchQuery.includes('berita') || searchQuery.includes('artikel')) {
                    window.location.href = 'blog.php'; // Mengarahkan ke halaman blog.php
                } else if (searchQuery.includes('sandi')) {
                    window.location.href = 'profile.php'; // Mengarahkan ke halaman profile.php
                } else if (searchQuery.includes('hubungi') || searchQuery.includes('lokasi')) {
                    window.location.href = 'contact.php'; // Mengarahkan ke halaman contact.php
                } else {
                    alert("Kata kunci tidak ditemukan"); // Tampilkan alert jika tidak ada yang sesuai
                }
            }
        })
        .catch(error => {
            alert("Terjadi kesalahan, coba lagi.");
        });
}

  </script>

    </div>
    <div class="th-menu-wrapper">
  <div class="th-menu-area text-center">
    <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
    <div class="mobile-logo">
      <a href="index.php">
        <img src="criuckerz.png" alt="Logo" />
      </a>
    </div>
    <div class="th-mobile-menu">
      <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="about.php">Tentang Kami</a></li>
        <li class="menu-item-has-children">
          <a href="#">Halaman</a>
          <ul class="sub-menu">
            <li class="menu-item-has-children">
              <a href="#">Toko</a>
              <ul class="sub-menu">
                <li><a href="shop.php">Toko</a></li>
                <li><a href="order_history.php">Pesananmu</a></li>
                <li><a href="cartku.php">Keranjang</a></li>
              </ul>
            </li>
            <li><a href="tiket.php">Paket tiket</a></li>
            <li><a href="profile.php">Akun saya</a></li>
            <li><a href="../logout.php">Keluar</a></li>
          </ul>
        </li>
        <li class="menu-item-has-children">
          <a href="#">Blog</a>
          <ul class="sub-menu">
            <li><a href="blog.php">Blog</a></li>
          </ul>
        </li>
        <li><a href="contact.php">Kontak</a></li>
      </ul>
    </div>
  </div>
</div>

    <header class="th-header header-layout1">
      <div class="header-top">
        <div class="container">
          <div
            class="row justify-content-center justify-content-lg-between align-items-center gy-2"
          >
          </div>
        </div>
      </div>
      <div class="sticky-wrapper">
        <div class="menu-area">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-auto">
                <div class="header-logo">
                  <a href="index.php"
                    ><img src="criuckerz.png"
                  /></a>
                </div>
              </div>
              <div class="col-auto">
                <nav class="main-menu d-none d-lg-inline-block">
                  <ul>
                    <li>
                      <a href="index.php">Beranda</a>
                    </li>
                    <li><a href="about.php">Tentang Kami</a></li>
                    <li class="menu-item-has-children">
                      <a href="#">Halaman</a>
                      <ul class="sub-menu">
                        <li class="menu-item-has-children">
                          <a href="#">Toko</a>
                          <ul class="sub-menu">
                            <li><a href="shop.php">Toko</a></li>
                            <li><a href="order_history.php">Pesananmu</a></li>
                            
                            
                            <li><a href="cartku.php">Keranjang</a></li>
                          </ul>
                        </li>
                        <li><a href="tiket.php">Paket tiket</a></li>
                        <li>
                          <a href="profile.php">Akun saya</a>
                        </li>
                        <li>
    <a href="../logout.php">Keluar</a>
</li>

                      </ul>
                    </li>
                    <li class="menu-item-has-children">
                      <a href="#">Blog</a>
                      <ul class="sub-menu">
                        <li><a href="blog.php">Blog</a></li>
                      </ul>
                    </li>
                    <li><a href="contact.php">Kontak</a></li>
                  </ul>
                </nav>
                
                <button type="button" class="th-menu-toggle d-block d-lg-none">
                  <i class="far fa-bars"></i>
                </button>
              </div>
              <div class="col-auto d-none d-xl-block">
                <div class="header-button">
                  <button type="button" class="simple-icon searchBoxToggler">
                    <i class="far fa-search"></i>
                  </button>
                  <button type="button" class="simple-icon sideMenuToggler">
                    <span class="badge">5</span>
                    <i class="fa-regular fa-cart-shopping"></i>
                  </button>
                  <a href="shop.php" class="th-btn style4"
                    >Belanja<i class="fas fa-chevrons-right ms-2"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="breadcumb-wrapper" data-bg-src="">
      <div class="container">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Detail produk</h1>
          <ul class="breadcumb-menu">
            <li>Detail Produk</li>
          </ul>
        </div>
      </div>
    </div>
    <section class="product-details space-top space-extra-bottom">
      <div class="container">
      <?php
// Cek apakah ada ID produk yang dikirim dari halaman shop.php
if (isset($_GET['id_produk'])) {
    include '../adminfinish/db.php'; // Import koneksi ke database

    $id_produk = $_GET['id_produk'];

    // Query untuk mendapatkan data produk berdasarkan ID
    $sql = "SELECT foto, nama_produk, harga, kategori, stok, deskripsi FROM produk WHERE id_produk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // Jika produk ditemukan
    if ($product) {
        ?>
        <div class="row gx-60">
          <div class="col-lg-6">
            <div class="product-big-img">
              <div class="img">
                <!-- Tampilkan gambar produk -->
                <img
                  src="../adminfinish/uploads/<?php echo htmlspecialchars($product['foto']); ?>"
                  alt="<?php echo htmlspecialchars($product['nama_produk']); ?>"
                />
              </div>
            </div>
          </div>
          <div class="col-lg-6 align-self-center">
            <div class="product-about">
              <!-- Tampilkan harga produk -->
              <p class="price">Rp.<?php echo number_format($product['harga'], 0, ',', '.'); ?></p>
              <!-- Tampilkan nama produk -->
              <h2 class="product-title"><?php echo htmlspecialchars($product['nama_produk']); ?></h2>
              <div class="product-rating">
                <div
                  class="star-rating"
                  role="img"
                  aria-label="Rated 5.00 out of 5"
                >
                  <span style="width: 100%"
                    >Rated <strong class="rating">5.00</strong> out of 5 based
                    on <span class="rating">1</span> Penilaian kustomer</span
                  >
                </div>
                <a href="shop-details.php?id_produk=<?php echo $id_produk; ?>" class="woocommerce-review-link"
                  >(<span class="count">4</span> Penilaian kustomer)</a
                >
              </div>
              <div class="mt-2 link-inherit">
                <p>
                  <strong class="text-title me-3">Ketersediaan:</strong>
                  <!-- Tampilkan jumlah stok -->
                  <span class="stock in-stock"
                    ><i class="far fa-check-square me-2 ms-1"></i>
                    <?php echo $product['stok'] > 0 ? $product['stok'] . ' tersedia' : 'Stok habis'; ?></span
                  >
                </p>
              </div>
              <div class="actions">
                <div class="quantity">
                <input
                    type="number"
                    class="qty-input"
                    step="1"
                    min="1"
                    max="100"
                    name="quantity"
                    value="1"
                    title="Qty"
                  />
                  <button class="quantity-plus qty-btn">
                    <i class="far fa-chevron-up"></i>
                  </button>
                  <button class="quantity-minus qty-btn">
                    <i class="far fa-chevron-down"></i>
                  </button>
                </div>
                <a href="add_to_cart.php?id_produk=<?php echo $id_produk; ?>" class="th-btn">Tambahkan</a>                
                
              </div>
              <div class="product_meta">
                <!-- Tampilkan kategori produk -->
                <span class="posted_in"
                  >Kategori: <a href="shop.php"><?php echo htmlspecialchars($product['kategori']); ?></a></span
                >
              </div>
            </div>
          </div>
        </div>
        <?php
    } else {
        // Jika ID produk tidak ditemukan
        echo "<p>Produk tidak ditemukan.</p>";
    }
} else {
    // Jika ID produk tidak valid
    echo "<p>ID produk tidak valid.</p>";
}
?>

        <ul class="nav product-tab-style1" id="productTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a
              class="nav-link th-btn"
              id="description-tab"
              data-bs-toggle="tab"
              href="#description"
              role="tab"
              aria-controls="description"
              aria-selected="false"
              >Deskripsi produk</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link th-btn active"
              id="reviews-tab"
              data-bs-toggle="tab"
              href="#reviews"
              role="tab"
              aria-controls="reviews"
              aria-selected="true"
              >Penilaian Kustomer</a
            >
          </li>
        </ul>
        <div class="tab-content" id="productTabContent">
        <div
  class="tab-pane fade"
  id="description"
  role="tabpanel"
  aria-labelledby="description-tab"
>
  <p>
    <?php echo nl2br(htmlspecialchars($product['deskripsi'])); ?>
  </p>
</div>

<div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
    <div class="woocommerce-Reviews">
        <div class="th-comments-wrap">
            <ul class="comment-list">
                <?php
                // Koneksi ke database
                $conn = new mysqli("localhost", "root", "", "db_therivv");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Ambil id_produk dari URL
                $id_produk = $_GET['id_produk']; // Ambil ID produk dari URL

                // Query untuk menampilkan komentar yang aktif
                $sql = "SELECT customer_name, comment, rating, comment_date FROM comments WHERE id_produk = ? AND status = 'Aktif' ORDER BY comment_date DESC";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id_produk); // Gunakan id_produk untuk query
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Menampilkan setiap komentar
                    while ($row = $result->fetch_assoc()) {
                        $name = htmlspecialchars($row['customer_name']);
                        $comment = nl2br(htmlspecialchars($row['comment']));
                        $rating = $row['rating'];
                        $date = date("d F, Y", strtotime($row['comment_date']));

                        // Daftar nama avatar yang tersedia
                        $avatars = ['avatar1.svg', 'avatar2.svg', 'avatar3.svg', 'avatar4.svg'];

                        // Pilih avatar secara acak
                        $randomAvatar = $avatars[array_rand($avatars)];

                        // Menghitung lebar bintang berdasarkan rating
                        $starWidth = ($rating / 5) * 100;

                        echo "
                        <li class='review th-comment-item'>
                            <div class='th-post-comment'>
                                <div class='comment-avater'>
                                    <img src='avatar/$randomAvatar' alt='Comment Author' />
                                </div>
                                <div class='comment-content'>
                                    <h4 class='name'>$name</h4>
                                    <span class='commented-on'><i class='far fa-calendar'></i>$date</span>
                                    <div class='star-rating' role='img' aria-label='Rated $rating out of 5'>
                                        <span style='width: $starWidth%'>Rated <strong class='rating'>$rating</strong> out of 5</span>
                                    </div>
                                    <p class='text'>$comment</p>
                                </div>
                            </div>
                        </li>";
                    }
                } else {
                    echo "<p>Tidak ada komentar untuk ditampilkan.</p>";
                }

                $conn->close();
                ?>
            </ul>
        </div>

        
        <div class="th-comment-form">
            <div class="form-title">
                <h3 class="blog-inner-title">Tambahkan ulasan</h3>
            </div>
            <form id="commentForm" action="submit_comment.php" method="POST">
                <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>"> <!-- Kirim id_produk -->
                <input type="hidden" name="id_user" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>"> <!-- Kirim id_user -->
                <div class="row">
                    <div class="form-group rating-select d-flex align-items-center">
                        <label>Rating Anda</label>
                        <p class="stars">
                            <span>
                                <a class="star-1" href="#" onclick="document.getElementById('rating-input').value = 1; return false;">1</a>
                                <a class="star-2" href="#" onclick="document.getElementById('rating-input').value = 2; return false;">2</a>
                                <a class="star-3" href="#" onclick="document.getElementById('rating-input').value = 3; return false;">3</a>
                                <a class="star-4" href="#" onclick="document.getElementById('rating-input').value = 4; return false;">4</a>
                                <a class="star-5" href="#" onclick="document.getElementById('rating-input').value = 5; return false;">5</a>
                            </span>
                        </p>
                        <input type="hidden" id="rating-input" name="rating" value="5">
                    </div>
                    <div class="col-12 form-group">
                        <textarea placeholder="Tulis pesan" class="form-control" name="comment" required></textarea>
                        <i class="text-title far fa-pencil-alt"></i>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" placeholder="Nama Anda" class="form-control" name="customer_name" required />
                        <i class="text-title far fa-user"></i>
                    </div>
                    <div class="col-12 form-group mb-0">
                        <button id="submitButton" class="th-btn" type="submit">Kirim Ulasan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



        </div>
        <div class="space-extra-top mb-30">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-auto">
              <h2 class="sec-title text-center">Produk yang sesuai</h2>
            </div>
            <div class="col-md d-none d-sm-block">
              <hr class="title-line" />
            </div>
            <div class="col-md-auto d-none d-md-block">
              <div class="sec-btn">
                <div class="icon-box">
                  <button
                    data-slider-prev="#productSlider1"
                    class="slider-arrow default"
                  >
                    <i class="far fa-arrow-left"></i>
                  </button>
                  <button
                    data-slider-next="#productSlider1"
                    class="slider-arrow default"
                  >
                    <i class="far fa-arrow-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper th-slider has-shadow" id="productSlider2"
     data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
  <div class="swiper-wrapper">
    <?php
    // Menghubungkan ke database
    include '../adminfinish/db.php';

    // Query untuk mengambil produk (misal, limit 6 produk)
    $sql = "SELECT id_produk, foto, nama_produk, harga, kategori, deskripsi FROM produk LIMIT 6";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $id_produk = $row['id_produk'];

        // Query untuk menghitung jumlah komentar aktif
        $sql_comments = "SELECT COUNT(*) AS total_comments FROM comments WHERE id_produk = ? AND status = 'Aktif'";
        $stmt_comments = $conn->prepare($sql_comments);
        $stmt_comments->bind_param("i", $id_produk);  // Bind parameter untuk id_produk
        $stmt_comments->execute();
        $result_comments = $stmt_comments->get_result();
        $comments_row = $result_comments->fetch_assoc();
        $total_comments = $comments_row ? $comments_row['total_comments'] : 0;

        // Query untuk menghitung rata-rata rating produk
        $sql_rating = "SELECT AVG(rating) AS average_rating FROM comments WHERE id_produk = ? AND status = 'Aktif'";
        $stmt_rating = $conn->prepare($sql_rating);
        $stmt_rating->bind_param("i", $id_produk);  // Bind parameter untuk id_produk
        $stmt_rating->execute();
        $result_rating = $stmt_rating->get_result();
        $rating_row = $result_rating->fetch_assoc();
        $average_rating = $rating_row['average_rating'] ? $rating_row['average_rating'] : 0;

        // Pembulatan rating ke angka terdekat (misalnya 4.7 jadi 5)
        $rounded_rating = round($average_rating); 

        // Menampilkan bintang berdasarkan rating
        echo '<div class="swiper-slide">';
        echo '  <div class="th-product product-grid">';
        echo '    <div class="product-img">';
        echo '      <img src="../adminfinish/uploads/' . htmlspecialchars($row['foto']) . '" alt="Product Image" />';
        echo '      <span class="product-tag">Hot</span>';
        echo '      <div class="actions">';
        echo '        <a href="#QuickView" class="icon-btn popup-content" 
        data-id="' . $row['id_produk'] . '" 
        data-nama="' . htmlspecialchars($row['nama_produk']) . '" 
        data-harga="' . $row['harga'] . '" 
        data-deskripsi="' . htmlspecialchars($row['deskripsi']) . '" 
        data-foto="' . $row['foto'] . '">
        <i class="far fa-eye"></i> </a>';
        echo '      <a href="add_to_cart.php?id_produk=' . $row['id_produk'] . '" class="icon-btn"><i class="fas fa-cart-plus"></i></a>';
        echo '      </div>';
        echo '    </div>';
        
        echo '    <div class="product-content">';
        echo '      <a href="shop-details.php?id_produk=' . $row['id_produk'] . '" class="product-category">' . htmlspecialchars($row['kategori']) . '</a>';
        echo '      <h3 class="product-title"><a href="shop-details.php?id_produk=' . $row['id_produk'] . '">' . htmlspecialchars($row['nama_produk']) . '</a></h3>';
        echo '      <span class="price">Rp ' . number_format($row['harga'], 0, ',', '.') . '</span>';
        echo '    </div>';

        echo ' <div class="woocommerce-product-rating">';
        echo '    <span class="count">(' . $total_comments . ' komentar)</span>';
        echo '    <div class="star-rating" role="img" aria-label="Rated ' . $average_rating . ' out of 5">';

        // Menampilkan rating dengan bintang berdasarkan rounded rating
        echo '<span>Rated ';
        for ($i = 1; $i <= 5; $i++) {
          if ($i <= floor($average_rating)) {
            echo '<i class="fas fa-star"></i>'; // Bintang penuh
          } elseif ($i == ceil($average_rating) && $average_rating - floor($average_rating) >= 0.5) {
            echo '<i class="fas fa-star-half-alt"></i>'; // Setengah bintang
          } else {
            echo '<i class="far fa-star"></i>'; // Bintang kosong
          }
        }
        echo '</span>';
        echo '    </div>';
        echo '  </div>';
        echo '  </div>';
        echo '</div>';
      }
    } else {
      echo "<p>Produk tidak ditemukan.</p>";
    }
    $conn->close();
    ?>
  </div>
</div>




          <div class="d-block d-md-none mt-40 text-center">
            <div class="icon-box">
              <button
                data-slider-prev="#productSlider1"
                class="slider-arrow default"
              >
                <i class="far fa-arrow-left"></i>
              </button>
              <button
                data-slider-next="#productSlider1"
                class="slider-arrow default"
              >
                <i class="far fa-arrow-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="">
    </div>
    <footer class="footer-wrapper footer-layout2">
      <div class="shape-mockup" data-top="0" data-left="0">
        <img src="assets/img/shape/footer_shape_1.png" alt="shape" />
      </div>
      <div class="shape-mockup" data-bottom="0" data-right="0">
        <img src="assets/img/shape/footer_shape_2.png" alt="shape" />
      </div>
      <div class="container z-index-common">
      
      </div>
      <div class="widget-area">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-md-6 col-xl-auto">
              <div class="widget footer-widget">
                <div class="th-widget-about">
                  <div class="about-logo">
                    <a href="home-sanan.html"
                      ><img src="criuckerz.png"
                    /></a>
                  </div>
                  <p class="about-text">
                    Kami mendukung pengembangan usaha mikro, kecil, dan menengah (UMKM) di Desa Sanan, dengan fokus pada produk-produk tempe yang berkualitas dan ramah lingkungan.
                  </p>
                  <div class="th-social">
                    <a href="https://www.facebook.com/"
                      ><i class="fab fa-facebook-f"></i
                    ></a>
                    <a href="https://www.twitter.com/"
                      ><i class="fab fa-twitter"></i
                    ></a>                    </a>
                    <a href="https://www.whatsapp.com/"
                      ><i class="fab fa-whatsapp"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-auto">
              <div class="widget widget_nav_menu footer-widget">
                <h3 class="widget_title">
                  <img
                    src="assets/img/theme-img/title_icon.svg"
                    alt="Icon"
                  />Kategori Produk
                </h3>
                <div class="menu-all-pages-container">
                  <ul class="menu">
                    <li><a href="shop.php">Tempe Goreng</a></li>
                    <li><a href="shop.php">Keripik Tempe</a></li>
                    <li><a href="tiket.php">Paket tiket</a></li>
                    <li><a href="shop.php">Oleh-Oleh Khas Sanan</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-auto">
              <div class="widget widget_nav_menu footer-widget">
                <h3 class="widget_title">
                  <img
                    src="assets/img/theme-img/title_icon.svg"
                    alt="Icon"
                  />Tautan Cepat
                </h3>
                <div class="menu-all-pages-container">
                  <ul class="menu">
                    <li><a href="about.php">Tentang Kami</a></li>
                    <li><a href="shop.php">Galeri Produk</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.php">Hubungi Kami</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-auto">
              <div class="widget footer-widget">
                <h3 class="widget_title">
                  <img
                    src="assets/img/theme-img/title_icon.svg"
                    alt="Icon"
                  />Hubungi Kami
                </h3>
                <div class="th-widget-contact">
                  <div class="info-box">
                    <div class="info-box_icon">
                      <i class="fas fa-location-dot"></i>
                    </div>
                    <p class="info-box_text">
                      Jl. Tempe No. 12, Sanan, Malang, Jawa Timur
                    </p>
                  </div>
                  <div class="info-box">
                    <div class="info-box_icon">
                      <i class="fas fa-phone"></i>
                    </div>
                    <p class="info-box_text">
                      <a href="tel:+6283125661007" class="info-box_link"
                        >+6283125661007</a
                      >
            
                    </p>
                  </div>
                  <div class="info-box">
                    <div class="info-box_icon">
                      <i class="fas fa-envelope"></i>
                    </div>
                    <p class="info-box_text">
                      <a href="mailto:criuckerzz@gmail.com" class="info-box_link"
                        >criuckerzz@gmail.com</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
        class="copyright-wrap"
        data-bg-src="assets/img/bg/copyright_bg_1.png"
      >
      </div>
    </footer>
    <div class="scroll-top">
      <svg
        class="progress-circle svg-content"
        width="100%"
        height="100%"
        viewBox="-1 -1 102 102"
      >
        <path
          d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
          style="
            transition: stroke-dashoffset 10ms linear 0s;
            stroke-dasharray: 307.919, 307.919;
            stroke-dashoffset: 307.919;
          "
        ></path>
      </svg>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  document.getElementById("submitButton").addEventListener("click", function() {
    // Reload halaman setelah klik
    window.location.reload();
});

</script>
<script>
      document.addEventListener('DOMContentLoaded', function() {
    const quickViewLinks = document.querySelectorAll('.popup-content');

    quickViewLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-nama');
            const productPrice = this.getAttribute('data-harga');
            const productDescription = this.getAttribute('data-deskripsi');
            const productImage = this.getAttribute('data-foto');

            // Cek apakah data diterima dengan benar
            console.log(productId, productName, productPrice, productDescription, productImage);

            // Menampilkan data produk dalam modal
            document.querySelector('#QuickView .product-title').innerText = productName;
            document.querySelector('#QuickView .price').innerText = 'Rp ' + parseFloat(productPrice).toLocaleString();
            document.querySelector('#QuickView .product-big-img img').src = '../adminfinish/uploads/' + productImage;
            document.querySelector('#QuickView .text').innerText = productDescription;
            document.querySelector('#QuickView .sku').innerText = productName;
            document.querySelector('#QuickView .stock').innerText = 'Dalam stock';  // Update jika perlu
        });
    });
});


    </script>

    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
 
</html>
