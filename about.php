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
    </title>    <meta name="author" content="Frutin" />
    <meta
      name="description"
      content="Frutin - Organic and Healthy Food mHTML Template"
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
          <h1 class="breadcumb-title">Tentang kami</h1>
          <ul class="breadcumb-menu">
            <li>Tentang kami</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="overflow-hidden overflow-hidden space" id="about-sec">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-6 mb-30 mb-xl-0">
            <div class="img-box1">
              <div class="img1">
                <img src="assets/img/normal/aboutfirst.png" alt="About" />
              </div>
              <div class="shape1 movingX">
                <img src="assets/img/normal/about_1_3.png" alt="Image" />
              </div>
              <div class="year-counter">
                <div class="year-counter_number">
                  <span class="counter-number">10</span>+
                </div>
                <p class="year-counter_text">Years Experience</p>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="ps-xxl-5 ps-xl-2 ms-xl-1 text-center text-xl-start">
              <div class="title-area mb-32">
                <span class="sub-title"
                  >
                <h2 class="sec-title">Mengapa tempe sanan sangat terkenal?</h2>
                <p class="sec-text">
                  Sanan adalah sebuah platform web yang berfokus pada menyediakan layanan atau informasi tertentu, 
                  seperti berita, e-commerce, pendidikan, atau layanan lainnya, tergantung pada konteks spesifiknya. 
                  Website ini biasanya dirancang untuk memberikan pengalaman pengguna yang mudah dan intuitif, 
                  memungkinkan pengguna untuk menemukan informasi, produk, atau layanan yang mereka cari dengan cepat dan efisien. 
                  Sanan mungkin juga memiliki fitur interaktif seperti formulir pendaftaran, pencarian, atau opsi pembayaran online, 
                  tergantung pada tujuan dan fungsionalitas situs tersebut.
                </p>
              </div>
              <div class="about-feature-wrap">
                <div class="about-feature">
                  <div class="box-icon">
                    <img src="assets/img/icon/about_feature_1.svg" alt="Icon" />
                  </div>
                  <h3 class="box-title">Perawatan Intensif</h3>
                </div>
                <div class="about-feature">
                  <div class="box-icon">
                    <img src="assets/img/icon/about_feature_2.svg" alt="Icon" />
                  </div>
                  <h3 class="box-title">Smart Organic Solutions</h3>
                </div>
              </div>
              <div>
                <a href="about.php" class="th-btn"
                  >Tampilkan lebih<i class="fas fa-chevrons-right ms-2"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="space bg-smoke2" id="process-sec">
      <div class="shape-mockup" data-top="0" data-left="0">
        <img src="assets/img/shape/vector_shape_7.png" alt="shape" />
      </div>
      <div class="shape-mockup" data-bottom="0" data-right="0">
        <img src="assets/img/shape/vector_shape_6.png" alt="shape" />
      </div>
      <div class="container">
        <div class="title-area text-center">
          <span class="sub-title"
            ><img src="assets/img/theme-img/title_icon.svg" alt="Icon" />
            Bagaimana membuat produk berkualitas?</span
          >
          <h2 class="sec-title">Bagaimana cara membuatnya</h2>
        </div>
        <div class="row gy-4 justify-content-center">
          <div class="col-xl-3 col-md-6 process-box-wrap">
            <div class="process-box">
              <div class="box-icon">
                <img src="assets/img/icon/process_box_1.svg" alt="icon" />
              </div>
              <div
                class="box-img"
                data-mask-src="assets/img/bg/process_bg_shape.png"
              >
                <img src="assets/img/normal/proses1.jpg" alt="image" />
              </div>
              <p class="box-number">Step - 01</p>
              <h3 class="box-title">Persiapan Kedelai</h3>
              <p class="box-text">
                Rendam Kedelai: Rendam kedelai dalam air selama 8-12 jam atau semalaman. 
                Ini membantu melunakkan kedelai dan memudahkan proses pengupasan kulit.
              </p>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 process-box-wrap">
            <div class="process-box">
              <div class="box-icon">
                <img src="assets/img/icon/process_box_2.svg" alt="icon" />
              </div>
              <div
                class="box-img"
                data-mask-src="assets/img/bg/process_bg_shape.png"
              >
                <img src="assets/img/normal/process_box_2.jpg" alt="image" />
              </div>
              <p class="box-number">Step - 02</p>
              <h3 class="box-title">Perebusan dan Pengupasan</h3>
              <p class="box-text">
                Rebus Kedelai: Rebus kedelai yang sudah direndam hingga mendidih selama sekitar 30 menit. 
                Ini membantu mematikan enzim yang dapat menyebabkan bau tidak sedap.
              </p>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 process-box-wrap">
            <div class="process-box">
              <div class="box-icon">
                <img src="assets/img/icon/process_box_3.svg" alt="icon" />
              </div>
              <div
                class="box-img"
                data-mask-src="assets/img/bg/process_bg_shape.png"
              >
                <img src="assets/img/normal/proses3.jpg" alt="image" />
              </div>
              <p class="box-number">Step - 03</p>
              <h3 class="box-title">Fermentasi</h3>
              <p class="box-text">
                Tambahkan Ragi Tempe: Setelah kedelai bersih dan kering, taburkan ragi 
                tempe secara merata dan aduk hingga tercampur rata.
              </p>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 process-box-wrap">
            <div class="process-box">
              <div class="box-icon">
                <img src="assets/img/icon/process_box_4.svg" alt="icon" />
              </div>
              <div
                class="box-img"
                data-mask-src="assets/img/bg/process_bg_shape.png"
              >
                <img src="assets/img/normal/proses4.jpg" alt="image" />
              </div>
              <p class="box-number">Step - 04</p>
              <h3 class="box-title">Pengolahan kedelai:</h3>
              <p class="box-text">
                Fermentasi: Simpan kedelai yang sudah dibungkus di tempat yang hangat dan tidak lembab selama 24-48 jam. 
                Proses ini memungkinkan jamur tempe tumbuh dan mengikat kedelai menjadi satu kesatuan.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="counter-sec11" data-bg-src="assets/img/bg/counter_bg_1_1.jpg">
      <div class="container">
        <div class="counter-card-wrap">
          <div class="counter-card">
            <div class="box-icon">
              <img src="assets/img/icon/counter_card_1.svg" alt="Icon" />
            </div>
            <div class="media-body">
              <h2 class="box-number">
                <span class="counter-number">10</span>+
              </h2>
              <p class="box-text"> Bangkit UMKM</p>
            </div>
          </div>
          <div class="divider"></div>
          <div class="counter-card">
            <div class="box-icon">
              <img src="assets/img/icon/counter_card_2.svg" alt="Icon" />
            </div>
            <div class="media-body">
              <h2 class="box-number">
                <span class="counter-number">1000</span>+
              </h2>
              <p class="box-text">Total Pengunjung </p>
            </div>
          </div>
          <div class="divider"></div>
          <div class="counter-card">
            <div class="box-icon">
              <img src="assets/img/icon/counter_card_3.svg" alt="Icon" />
            </div>
            <div class="media-body">
              <h2 class="box-number">
                <span class="counter-number">5</span>+
              </h2>
              <p class="box-text">Penilaian produk dan tempat</p>
            </div>
          </div>
          <div class="divider"></div>
          <div class="counter-card">
            <div class="box-icon">
              <img src="assets/img/icon/counter_card_4.svg" alt="Icon" />
            </div>
            <div class="media-body">
              <h2 class="box-number">
                <span class="counter-number">10</span>+
              </h2>
              <p class="box-text">TOP UMKM MALANG</p>
            </div>
          </div>
          <div class="divider"></div>
        </div>
      </div>
    </div>
    
    
    <section class="space">
      <div class="container z-index-common">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-7 col-md-8">
            <div class="title-area text-center">
              <span class="sub-title"
                ><img
                  src="assets/img/theme-img/title_icon.svg"
                  alt="Icon"
                />Team Members</span
              >
              <h2 class="sec-title">Kami Memiliki Tim Hebat yang Siap Membantu Anda!</h2>
</div>
</div>
</div>

</section>

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
