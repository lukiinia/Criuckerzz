<?php
// Pastikan pengguna sudah login
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect jika belum login
    exit();
}

include '../adminfinish/db.php'; // Koneksi ke database

// Ambil ID pengguna yang sedang login
$user_id = $_SESSION['user_id'];

// Query untuk mengambil riwayat pesanan pengguna dengan data alamat dan informasi pembayaran
$query = "SELECT p.*, pl.nama_penerima, pl.alamat_lengkap, pl.nomor_hp, pm.metode_pembayaran, pm.status_pembayaran 
          FROM pesanan p
          LEFT JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
          LEFT JOIN pembayaran pm ON p.id_pesanan = pm.id_pesanan
          WHERE p.id_user = ? ORDER BY p.created_at DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$pesanans = $result->fetch_all(MYSQLI_ASSOC);

// Jika tidak ada pesanan
if (empty($pesanans)) {
    echo '<script type="text/javascript">
            alert("Anda belum melakukan pesanan sebelumnya.");
            window.history.back(); // Kembali ke halaman sebelumnya
          </script>';
    exit();
}
?>



<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Criuckerz</title>
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
    <link rel="stylesheet" href="assets/css/order.css" />
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
      <h1 class="breadcumb-title">Riwayat pesanan</h1>
      <ul class="breadcumb-menu">
        <li>riwayat</li>
      </ul>
    </div>
  </div>
</div>

<div class="space">
    <div class="order-history-container">
        <?php foreach ($pesanans as $pesanan): ?>
            <div class="containerz">
                <h3>Order #<?= htmlspecialchars($pesanan['id_pesanan']) ?></h3>
                <div class="pesanan-containerz">
                    <?php
                    // Ambil detail pesanan untuk masing-masing pesanan
                    $detail_query = "SELECT dp.*, pr.nama_produk, pr.foto
                                     FROM detail_pesanan dp
                                     JOIN produk pr ON dp.id_product = pr.id_produk
                                     WHERE dp.id_pesanan = ?";
                    $detail_stmt = $conn->prepare($detail_query);
                    $detail_stmt->bind_param("i", $pesanan['id_pesanan']);
                    $detail_stmt->execute();
                    $details = $detail_stmt->get_result();
                    
                    // Loop untuk menampilkan setiap detail produk
                    while ($detail = $details->fetch_assoc()):
                    ?>
                        <div class="product-detailsz">
                            <div style="display: flex; align-items: center;">
                                <img src="../adminfinish/uploads/<?= htmlspecialchars($detail['foto']) ?>" alt="<?= htmlspecialchars($detail['nama_produk']) ?>" width="80">
                                <div class="product-infoz">
                                    <h4><?= htmlspecialchars($detail['nama_produk']) ?></h4>
                                    <p><span class="quantity"><?= htmlspecialchars($detail['quantity']) ?> ×</span> Rp<?= number_format($detail['total_harga'], 0, ',', '.') ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    
                    <div class="progress-barz">
                        <div class="active"></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                        <span><?= htmlspecialchars($pesanan['status']) ?></span>
                        <span>Dikonfirmasi</span>
                        <span>Dikirim</span>
                        <span>Selesai</span>
                    </div>
                </div>

                <div class="details-sectionz">
                    <div>
                        <h4>Delivery Address</h4>
                        <p><?= !empty($pesanan['alamat_lengkap']) ? htmlspecialchars($pesanan['alamat_lengkap']) : 'Alamat tidak tersedia' ?></p>
                        <p><?= !empty($pesanan['nama_penerima']) ? htmlspecialchars($pesanan['nama_penerima']) : 'Nama penerima tidak tersedia' ?> - <?= !empty($pesanan['nomor_hp']) ? htmlspecialchars($pesanan['nomor_hp']) : 'Nomor HP tidak tersedia' ?></p>
                    </div>

                    <div>
                        <h4>Payment Information</h4>
                        <div class="payment-infoz">
                            <span class="visa-icon"><?= !empty($pesanan['metode_pembayaran']) ? htmlspecialchars($pesanan['metode_pembayaran']) : 'Metode pembayaran tidak tersedia' ?></span>
                            <p><?= !empty($pesanan['status_pembayaran']) ? htmlspecialchars($pesanan['status_pembayaran']) : 'Status pembayaran tidak tersedia' ?></p>
                        </div>
                    </div>

                    <div>
                        <h4>Order Summary</h4>
                        <div class="summaryz">
                            <table>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>Rp<?= number_format($pesanan['subtotal'], 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>Rp<?= number_format($pesanan['shipping_cost'], 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="total-valuez">Rp<?= number_format($pesanan['total'], 0, ',', '.') ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</div>


    

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
                    <a href="index.php"
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
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>

</html>
