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
      content=""
    />
    <meta
      name="keywords"
      content=""
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
                        <button class="th-btn">Tambahkan</button>
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
    <div
      class="th-hero-wrapper hero-2"
      data-bg-src="assets/img/hero/hero_bg_2_1.jpg"
    >
      <div
        class="swiper th-slider" 
        id="heroSlider2"
        data-slider-options='{"effect":"fade"}'
      >
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="hero-inner">
              <div class="container">
                <div class="hero-style2">
                  <span
                    class="sub-title"
                    data-ani="slideinup"
                    data-ani-delay="0.2s"
                    ><img
                      src="assets/img/theme-img/title_icon.svg"
                      alt="shape"
                    />Top Umkm Malang</span
                  >
                  <h1 class="hero-title">
                    <span
                      class="title1"
                      data-ani="slideinup"
                      data-ani-delay="0.4s"
                      >Coba Coba</span
                    >
                    <span
                      class="title2"
                      data-ani="slideinup"
                      data-ani-delay="0.5s"
                      >Di sini</span
                    >
                  </h1>
                  <div
                    class="btn-group"
                    data-ani="slideinup"
                    data-ani-delay="0.7s"
                  >
                    <a href="shop.php" class="th-btn"
                      >Kunjungi kami<i class="fas fa-chevrons-right ms-2"></i
                    ></a>
                    <div class="arrow">
                      <img src="assets/img/hero/hero_arrow.svg" alt="Icon" />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="hero-img"
                data-ani="slidebottomright"
                data-ani-delay="0.1s"
              >
                <img src="hero/tempelu.png" alt="Image" />
              </div>
              <div
                class="hero-shape1"
                data-ani="slideinup"
                data-ani-delay="0.7s"
              >
                <img src="assets/img/hero/hero_shape_1_1.png" alt="shape" />
              </div>
              <div
                class="hero-shape2"
                data-ani="slideinup"
                data-ani-delay="0.8s"
              >
                <img src="assets/img/hero/hero_shape_1_2.png" alt="shape" />
              </div>
              <div
                class="hero-shape3"
                data-ani="slideinup"
                data-ani-delay="0.9s"
              >
                <img src="assets/img/hero/hero_shape_1_3.png" alt="shape" />
              </div>
              <div
                class="hero-shape4"
                data-ani="slidebottomright"
                data-ani-delay="0.5s"
              >
                <img src="assets/img/hero/hero_shape_2_1.png" alt="shape" />
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="hero-inner">
              <div class="container">
                <div class="hero-style2">
                <span
                    class="sub-title"
                    data-ani="slideinup"
                    data-ani-delay="0.2s"
                    ><img
                      src="assets/img/theme-img/title_icon.svg"
                      alt="shape"
                    />Top Umkm Malang</span
                  >
                  <h1 class="hero-title">
                    <span
                      class="title1"
                      data-ani="slideinup"
                      data-ani-delay="0.4s"
                      >Banyak Pilihan</span
                    >
                    <span
                      class="title2"
                      data-ani="slideinup"
                      data-ani-delay="0.5s"
                      >Produk</span
                    >
                  </h1>
                  <div
                    class="btn-group"
                    data-ani="slideinup"
                    data-ani-delay="0.7s"
                  >
                    <a href="shop.php" class="th-btn"
                      >Kunjungi kami<i class="fas fa-chevrons-right ms-2"></i
                    ></a>
                    <div class="arrow">
                      <img src="assets/img/hero/hero_arrow.svg" alt="Icon" />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="hero-img"
                data-ani="slidebottomright"
                data-ani-delay="0.1s"
              >
                <img src="hero\initempe.png" alt="Image" />
              </div>
              <div
                class="hero-shape1"
                data-ani="slideinup"
                data-ani-delay="0.7s"
              >
                <img src="assets/img/hero/hero_shape_1_1.png" alt="shape" />
              </div>
              <div
                class="hero-shape2"
                data-ani="slideinup"
                data-ani-delay="0.8s"
              >
                <img src="assets/img/hero/hero_shape_1_2.png" alt="shape" />
              </div>
              <div
                class="hero-shape3"
                data-ani="slideinup"
                data-ani-delay="0.9s"
              >
                <img src="assets/img/hero/hero_shape_1_3.png" alt="shape" />
              </div>
              <div
                class="hero-shape4"
                data-ani="slidebottomright"
                data-ani-delay="0.5s"
              >
                <img src="assets/img/hero/hero_shape_2_1.png" alt="shape" />
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="hero-inner">
              <div class="container">
                <div class="hero-style2">
                <span
                    class="sub-title"
                    data-ani="slideinup"
                    data-ani-delay="0.2s"
                    ><img
                      src="assets/img/theme-img/title_icon.svg"
                      alt="shape"
                    />Top Umkm Malang</span
                  >
                  <h1 class="hero-title">
                    <span
                      class="title1"
                      data-ani="slideinup"
                      data-ani-delay="0.4s"
                      >Kripik</span
                    >
                    <span
                      class="title2"
                      data-ani="slideinup"
                      data-ani-delay="0.5s"
                      >atau ticket</span
                    >
                  </h1>
                  <div
                    class="btn-group"
                    data-ani="slideinup"
                    data-ani-delay="0.7s"
                  >
                    <a href="shop.php" class="th-btn"
                      >Kunjungi kami<i class="fas fa-chevrons-right ms-2"></i
                    ></a>
                    <div class="arrow">
                      <img src="assets/img/hero/hero_arrow.svg" alt="Icon" />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="hero-img"
                data-ani="slidebottomright"
                data-ani-delay="0.1s"
              >
                <img src="hero/wowtempe.png" alt="Image" />
              </div>
              <div
                class="hero-shape1"
                data-ani-delay="0.7s"
              >
                <img src="assets/img/hero/hero_shape_1_1.png" alt="shape" />
              </div>
              <div
                class="hero-shape1"
                data-ani="slideinup"
                data-ani-delay="0.7s"
              >
                <img src="assets/img/hero/hero_shape_1_2.png" alt="shape" />
              </div>
              <div
                class="hero-shape3"
                data-ani="slideinup"
                data-ani-delay="0.9s"
              >
                <img src="assets/img/hero/hero_shape_1_3.png" alt="shape" />
              </div>
              <div
                class="hero-shape4"
                data-ani="slidebottomright"
                data-ani-delay="0.5s"
              >
                <img src="assets/img/hero/hero_shape_2_1.png" alt="shape" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="icon-box">
        <button data-slider-prev="#heroSlider2" class="slider-arrow default">
          <i class="far fa-arrow-left"></i>
        </button>
        <button data-slider-next="#heroSlider2" class="slider-arrow default">
          <i class="far fa-arrow-right"></i>
        </button>
      </div>
    </div>
    <div class="overflow-hidden space" id="about-sec">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-6 mb-40 mb-xl-0">
            <div class="img-box5">
              <div class="shape1">
                <img src="assets/img/normal/about_3_2.png" alt="About" />
              </div>
              <div class="img1">
                <img src="hero/initempebu.png" alt="About" />
              </div>
            </div>
          </div>
          <div class="col-xl-6 text-center text-xl-start">
            <div class="title-area mb-32">
              <span class="sub-title">
                <img src="assets/img/theme-img/title_icon.svg" alt="shape" />Tentang Kami Desa Wisata
              </span>
              <h2 class="sec-title">
                Keaslian Organik, Dampak Berkelanjutan, Kisah Desa Wisata Tempe
              </h2>
              <p class="sec-text">
                Desa Wisata Tempe adalah pusat inovasi dan pelestarian kuliner tradisional Indonesia. Tempe yang diproduksi di desa ini merupakan produk lokal unggulan, 
                yang diolah secara organik tanpa bahan kimia sintetik, menjadikannya pilihan sehat dan ramah lingkungan. 
                Melalui praktik yang berkelanjutan, desa kami berkomitmen untuk menjaga keaslian budaya dan memberi dampak positif bagi masyarakat dan lingkungan.
              </p>
            </div>
            <div class="checklist list-two-column mb-40">
              <ul>
                <li>100% Produk Organik</li>
                <li>Tanpa Bahan Kimia Sintetis</li>
                <li>Selalu Segar & Alami</li>
                <li>Harga Terjangkau</li>
                <li>Manfaat Lingkungan Berkelanjutan</li>
              </ul>
            </div>
            <div>
              <a href="about.html" class="th-btn">
                Pelajari Lebih Lanjut<i class="fas fa-chevrons-right ms-2"></i>
              </a>
            </div>
          </div>          
        </div>
      </div>
    </div>
    <section
      class="overflow-hidden bg-smoke2 space"
      id="service-sec"
      data-bg-src="assets/img/bg/service_bg_1.png"
    >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 col-md-8">
            <div class="title-area text-center">
              <span class="sub-title"
                ><img src="assets/img/theme-img/title_icon.svg" alt="Icon" />Our
                Services</span
              >
              <h2 class="sec-title">Kunjungi tempat wisata kami sekarang juga</h2>
            </div>
          </div>
        </div>
        <div class="row gy-40 justify-content-center">
          <div class="col-xl-4 col-md-6">
            <div class="service-card">
              <div class="box-img">
                <img
                  src="hero\desawisata1.jpg"
                  alt="Service"
                />
              </div>
              <div class="box-icon">
                <img src="assets/img/icon/service_card_1.svg" alt="Icon" />
              </div>
              
              <a href="" class="icon-btn"
                ><i class="far fa-arrow-right"></i
              ></a>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="service-card">
              <div class="box-img">
                <img
                  src="hero/desawisata2.jpg"
                  alt="Service"
                />
              </div>
              <div class="box-icon">
                <img src="assets/img/icon/service_card_2.svg" alt="Icon" />
              </div>
              
              <a href="" class="icon-btn"
                ><i class="far fa-arrow-right"></i
              ></a>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="service-card">
              <div class="box-img">
                <img
                  src="hero\tempenew.jpeg"
                  alt="Service"
                />
              </div>
              <div class="box-icon">
                <img src="assets/img/icon/service_card_3.svg" alt="Icon" />
              </div>
              
              <a href="" class="icon-btn"
                ><i class="far fa-arrow-right"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="space">
  <div class="container">
    <div class="row justify-content-lg-between justify-content-center align-items-end">
      <div class="col-lg">
        <div class="title-area text-center text-lg-start">
          <span class="sub-title">
            <img src="assets/img/theme-img/title_icon.svg" alt="Icon" />
            Produk olahan kami
          </span>
          <h2 class="sec-title">Produk produk kami</h2>
        </div>
      </div>
      <div class="col-lg-auto d-none d-lg-block">
        <div class="sec-btn">
          <div class="icon-box">
            <button data-slider-prev="#productSlider2" class="slider-arrow default">
              <i class="far fa-arrow-left"></i>
            </button>
            <button data-slider-next="#productSlider2" class="slider-arrow default">
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

        // Query untuk menghitung jumlah komentar aktif
        $sql_comments = "SELECT COUNT(*) AS total_comments FROM comments WHERE id_produk = ? AND status = 'Aktif'";
        $stmt_comments = $conn->prepare($sql_comments);
        $stmt_comments->bind_param("i", $id_produk);  // Bind parameter untuk id_produk
        $stmt_comments->execute();
        $result_comments = $stmt_comments->get_result();
        $comments_row = $result_comments->fetch_assoc();
        $total_comments = $comments_row ? $comments_row['total_comments'] : 0;

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
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
        <i class="far fa-eye"></i>
    </a>';
    echo '        <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>';
        echo '      </div>';
        echo '    </div>';
        echo '    <div class="product-content">';
        echo '      <a href="shop-details.php?id_produk=' . $row['id_produk'] . '" class="product-category">' . htmlspecialchars($row['kategori']) . '</a>';
        echo '      <h3 class="product-title"><a href="shop-details.php?id_produk=' . $row['id_produk'] . '">' . htmlspecialchars($row['nama_produk']) . '</a></h3>';
        echo '      <span class="price">Rp ' . number_format($row['harga'], 0, ',', '.') . '</span>';
        echo '      <div class="woocommerce-product-rating">';
        echo '    <span class="count">(' . $total_comments . ' komentar)</span>';
        echo '        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">';
        echo '          <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>';
        echo '        </div>';
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
      }
    } else {
      echo "<p>Produk tidak ditemukan.</p>";
    }

    // Menutup koneksi database
    $conn->close();
    ?>
  </div>
</div>

  </div>
</section>

    <section class="why-sec3 space">
      
          
    </section>
    
    <div
      class="bg-smoke2 space overflow-hidden"
      id="faq-sec"
      data-bg-src="assets/img/bg/faq_bg_1.png"
    >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5">
            <div class="faq-img1">
              <div class="img1">
                <img src="hero\deswis2.webp" alt="faq" />
              </div>
              <div class="shape1">
                <img src="assets/img/bg/vector_shape_1.png" alt="shape" />
              </div>
            </div>
          </div>
          <div class="col-xl-7 text-center text-xl-start align-self-center">
            <div class="ps-xl-4">
              <div class="title-area text-center text-xl-start">
                <span class="sub-title"
                  ><img
                    src="assets/img/theme-img/title_icon.svg"
                    alt="Icon"
                  />Butuh jawabannya?</span
                >
                <h2 class="sec-title">
                  Mengapa harus mengunjungi UMKM Tempe kami?
                </h2>
              </div>
              <div class="accordion" id="faqAccordion">
                <div class="accordion-card">
                  <div class="accordion-header" id="collapse-item-1">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse-1"
                      aria-expanded="true"
                      aria-controls="collapse-1"
                    >
                      Apakah saya harus berada di lokasi saat produk diantar?
                    </button>
                  </div>
                  <div
                    id="collapse-1"
                    class="accordion-collapse collapse show"
                    aria-labelledby="collapse-item-1"
                    data-bs-parent="#faqAccordion"
                  >
                    <div class="accordion-body">
                      <p class="faq-text">
                        Tempe kami diproduksi dengan bahan-bahan alami yang diproses secara higienis. Kami menggunakan teknik ramah lingkungan yang memastikan kesegaran dan kualitas tempe yang optimal sampai ke tangan Anda.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="accordion-card">
                  <div class="accordion-header" id="collapse-item-2">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse-2"
                      aria-expanded="false"
                      aria-controls="collapse-2"
                    >
                      Apakah saya harus memesan tempe setiap minggu?
                    </button>
                  </div>
                  <div
                    id="collapse-2"
                    class="accordion-collapse collapse"
                    aria-labelledby="collapse-item-2"
                    data-bs-parent="#faqAccordion"
                  >
                    <div class="accordion-body">
                      <p class="faq-text">
                        Tidak perlu. Anda bisa memesan kapan saja sesuai kebutuhan Anda. Tempe kami diproduksi setiap hari untuk memastikan Anda selalu mendapatkan produk yang segar.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="accordion-card">
                  <div class="accordion-header" id="collapse-item-3">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse-3"
                      aria-expanded="false"
                      aria-controls="collapse-3"
                    >
                      Apakah proses produksi tempe ini ramah lingkungan?
                    </button>
                  </div>
                  <div
                    id="collapse-3"
                    class="accordion-collapse collapse"
                    aria-labelledby="collapse-item-3"
                    data-bs-parent="#faqAccordion"
                  >
                    <div class="accordion-body">
                      <p class="faq-text">
                        Ya, kami menggunakan metode pertanian organik dan bahan alami dalam setiap tahap produksi tempe, memastikan bahwa setiap langkahnya berkelanjutan dan ramah lingkungan.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="accordion-card">
                  <div class="accordion-header" id="collapse-item-4">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse-4"
                      aria-expanded="false"
                      aria-controls="collapse-4"
                    >
                      Bagaimana dengan struktur harga produk tempe ini?
                    </button>
                  </div>
                  <div
                    id="collapse-4"
                    class="accordion-collapse collapse"
                    aria-labelledby="collapse-item-4"
                    data-bs-parent="#faqAccordion"
                  >
                    <div class="accordion-body">
                      <p class="faq-text">
                        Harga tempe kami sangat terjangkau, dengan kualitas terbaik yang dijamin dari proses produksi hingga pengiriman ke pelanggan.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </div>
      </div>
    </div>
    <div
      class="bg-top-center space-top"
      data-bg-src="assets/img/bg/gallery_bg_1.jpg"
    >
      <div class="container">
        <div
          class="row justify-content-lg-between justify-content-center align-items-end"
        >
          <div class="col-lg">
            <div class="title-area text-center text-lg-start">
              <span class="sub-title"
                ><img src="assets/img/theme-img/title_icon.svg" alt="Icon" />
                Dokumentasi kita</span
              >
              <h2 class="sec-title text-white">Nikmati keseruan di wisata ini</h2>
            </div>
          </div>
          <div class="col-lg-auto d-none d-lg-block">
            <div class="sec-btn">
              <div class="icon-box">
                <button
                  data-slider-prev="#gallerySlider1"
                  class="slider-arrow default"
                >
                  <i class="far fa-arrow-left"></i>
                </button>
                <button
                  data-slider-next="#gallerySlider1"
                  class="slider-arrow default"
                >
                  <i class="far fa-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container container-gallery">
        <div
          class="swiper th-slider has-shadow"
          id="gallerySlider1"
          data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'
        >
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="gallery-card">
                <div class="box-img">
                  <img
                    src="hero\deswis1.jpg"
                    alt="gallery image"
                  />
                  <a
                    href="hero\deswis1.jpg"
                    class="icon-btn style2 popup-image"
                    ><i class="far fa-plus"></i
                  ></a>
                </div>
                <div class="box-content">
                  <p class="box-subtitle">Kunjungan Disperindagkop UKM</p>
                  <h3 class="box-title">
                    <a href="project-details.html">Kunjungan bersama</a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-card">
                <div class="box-img">
                  <img
                    src="hero\deswis3.jpg"
                    alt="gallery image"
                  />
                  <a
                    href="hero\deswis3.jpg"
                    class="icon-btn style2 popup-image"
                    ><i class="far fa-plus"></i
                  ></a>
                </div>
                <div class="box-content">
                  <p class="box-subtitle">Peresmian Desa Wisata</p>
                  <h3 class="box-title">
                    <a href="project-details.html">Peresmian desa wisata</a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-card">
                <div class="box-img">
                  <img
                    src="hero\deswis4.webp"
                    alt="gallery image"
                  />
                  <a
                    href="hero\deswis4.webp"
                    class="icon-btn style2 popup-image"
                    ><i class="far fa-plus"></i
                  ></a>
                </div>
                <div class="box-content">
                  <p class="box-subtitle">Lokasi</p>
                  <h3 class="box-title">
                    <a href="project-details.html">Desa sanan</a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-card">
                <div class="box-img">
                  <img
                    src="hero\deswis2.webp"
                    alt="gallery image"
                  />
                  <a
                    href="hero\deswis2.webp"
                    class="icon-btn style2 popup-image"
                    ><i class="far fa-plus"></i
                  ></a>
                </div>
                <div class="box-content">
                  <p class="box-subtitle">Proses pembuatan tempe</p>
                  <h3 class="box-title">
                    <a href="project-details.html">Proses pembuatan tempe</a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-card">
                <div class="box-img">
                  <img
                    src="hero\deswis1.jpg"
                    alt="gallery image"
                  />
                  <a
                    href="hero\deswis1.jpg"
                    class="icon-btn style2 popup-image"
                    ><i class="far fa-plus"></i
                  ></a>
                </div>
                <div class="box-content">
                  <p class="box-subtitle">Kunjungan Disperindagkop UKM</p>
                  <h3 class="box-title">
                    <a href="project-details.html">Kunjungan bersama</a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-card">
                <div class="box-img">
                  <img
                    src="hero\deswis3.jpg"
                    alt="gallery image"
                  />
                  <a
                    href="hero\deswis3.jpg"
                    class="icon-btn style2 popup-image"
                    ><i class="far fa-plus"></i
                  ></a>
                </div>
                <div class="box-content">
                  <p class="box-subtitle">Peresmian Desa Wisata</p>
                  <h3 class="box-title">
                    <a href="project-details.html">Peresmian desa wisata</a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-card">
                <div class="box-img">
                  <img
                    src="hero\deswis4.webp"
                    alt="gallery image"
                  />
                  <a
                    href="hero\deswis4.webp"
                    class="icon-btn style2 popup-image"
                    ><i class="far fa-plus"></i
                  ></a>
                </div>
                <div class="box-content">
                  <p class="box-subtitle">Lokasi</p>
                  <h3 class="box-title">
                    <a href="project-details.html">Desa sanan</a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-card">
                <div class="box-img">
                  <img
                    src="hero\deswis2.webp"
                    alt="gallery image"
                  />
                  <a
                    href="hero\deswis2.webp"
                    class="icon-btn style2 popup-image"
                    ><i class="far fa-plus"></i
                  ></a>
                </div>
                <div class="box-content">
                  <p class="box-subtitle">Proses pembuatan tempe</p>
                  <h3 class="box-title">
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-block d-lg-none mt-40 text-center">
          <div class="icon-box">
            <button
              data-slider-prev="#gallerySlider1"
              class="slider-arrow default"
            >
              <i class="far fa-arrow-left"></i>
            </button>
            <button
              data-slider-next="#gallerySlider1"
              class="slider-arrow default"
            >
              <i class="far fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <section class="overflow-hidden space" id="testi-sec">
      <div class="container">
        <div class="title-area text-center">
          <span class="sub-title"
            ><img
              src="assets/img/theme-img/title_icon.svg"
              alt="Icon"
            />Testimoni</span
          >
          <h2 class="sec-title">Ulasan dari Pengunjung Kami</h2>
        </div>
        <div class="testi-box-area" data-bg-src="assets/img/bg/testi_bg_2.png">
          <div class="testi-box-img">
            <img src="assets/img/testimonial/testi_2_1.jpg" alt="Image" />
          </div>
          <div class="testi-box-shape">
            <img src="assets/img/bg/testi_box_shape.png" alt="image" />
          </div>
          <div class="testi-box-slide">
            <div
              class="swiper th-slider"
              id="testiSlide2"
              data-slider-options='{"effect":"slide"}'
            >
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="testi-box">
                    <p class="testi-box_text">
                      “Keberagaman adalah kunci dalam filosofi UMKM tempe kami. Kami
                      dengan hati-hati memilih berbagai jenis bahan baku, memastikan ekosistem
                      yang seimbang dan bervariasi. Ini tidak hanya membantu secara alami
                      menghindari hama dan penyakit, tetapi juga meningkatkan kesehatan
                      tanah dengan menyesuaikan kebutuhan nutrisi tanaman yang berbeda.”
                    </p>
                    <h3 class="testi-box_name">Angelina Margret</h3>
                    <span class="testi-box_desig">Pengunjung Desa Wisata Tempe Sanan</span>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testi-box">
                    <p class="testi-box_text">
                      “Desa Wisata Tempe Sanan menawarkan pengalaman yang luar biasa.
                      Kualitas tempe yang dihasilkan dari bahan-bahan alami sangat terasa
                      dan tempat ini memiliki suasana yang nyaman untuk berwisata sekaligus
                      belajar tentang proses pembuatan tempe.”
                    </p>
                    <h3 class="testi-box_name">Alexan Micelito</h3>
                    <span class="testi-box_desig">Pengunjung Desa Wisata Tempe Sanan</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi-box_quote">
              <img src="assets/img/testimonial/quote_1.png" alt="Image" />
            </div>
            <div class="icon-box">
              <button
                data-slider-prev="#testiSlide2"
                class="slider-arrow default"
              >
                <i class="far fa-arrow-left"></i>
              </button>
              <button
                data-slider-next="#testiSlide2"
                class="slider-arrow default"
              >
                <i class="far fa-arrow-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>    
    <section class="overflow-hidden space bg-smoke2" id="blog-sec">
      <div class="shape-mockup" data-top="0" data-left="0">
        <img src="assets/img/shape/vector_shape_1.png" alt="shape" />
      </div>
      <div class="shape-mockup" data-bottom="0" data-right="0">
        <img src="assets/img/shape/vector_shape_2.png" alt="shape" />
      </div>
      <div class="container">
        <div
          class="row justify-content-lg-between justify-content-center align-items-end"
        >
          <div class="col-lg">
            <div class="title-area text-center text-lg-start">
              <span class="sub-title"
                ><img
                  src="assets/img/theme-img/title_icon.svg"
                  alt="Icon"
                />Blog & Berita</span
              >
              <h2 class="sec-title">Update Terbaru & Informasi UMKM</h2>
            </div>
          </div>
          <div class="col-lg-auto d-none d-lg-block">
            <div class="sec-btn">
              <a href="blog.php" class="th-btn"
                >Lihat Postingan Lainnya<i class="fas fa-chevrons-right ms-2"></i
              ></a>
            </div>
          </div>
        </div>
        <div class="row gy-4">
          <div class="col-xl-6">
            <div class="blog-box">
              <div class="blog-img">
                <img src="hero/blogk.png" alt="blog image" />
              </div>
              <div class="blog-content">
                <div class="blog-meta">
                  <a href="blog.php"><i class="far fa-user"></i>Oleh Desa Sanan</a>
                  <a href="blog.php"
                    ><i class="far fa-calendar"></i>15 Maret, 2023</a
                  >
                </div>
                <h3 class="box-title">
                    Strategi UMKM Tempe untuk Meningkatkan Ekonomi Lokal</a
                  >
                </h3>
                <p class="box-text">
                  Pengusaha tempe di Sanan terus berinovasi untuk meningkatkan
                  kualitas produk dan memperluas pasar.
                </p>
                <a href="blog.php" class="th-btn"
                  >Baca Selengkapnya<i class="fas fa-chevrons-right ms-2"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="blog-box">
              <div class="blog-img">
                <img src="hero/blogg.png" alt="blog image" />
              </div>
              <div class="blog-content">
                <div class="blog-meta">
                  <a href="blog.php"><i class="far fa-user"></i>Oleh Desa Sanan</a>
                  <a href="blog.php"
                    ><i class="far fa-calendar"></i>16 Maret, 2023</a
                  >
                </div>
                <h3 class="box-title">
                    >Mendorong Wisata Kuliner Melalui Produk Tempe Khas Sanan</a
                  >
                </h3>
                <p class="box-text">
                  Produk tempe khas Desa Sanan menjadi daya tarik utama wisata
                  kuliner di daerah ini.
                </p>
                <a href="blog.php" class="th-btn"
                  >Baca Selengkapnya<i class="fas fa-chevrons-right ms-2"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="blog-box">
              <div class="blog-img">
                <img src="hero/blogd.png" alt="blog image" />
              </div>
              <div class="blog-content">
                <div class="blog-meta">
                  <a href="blog.php"><i class="far fa-user"></i>Oleh Desa Sanan</a>
                  <a href="blog.php"
                    ><i class="far fa-calendar"></i>17 Maret, 2023</a
                  >
                </div>
                <h3 class="box-title">
                  <a href="blog.php"
                    >Peluang Ekspor Tempe Sanan ke Pasar Internasional</a
                  >
                </h3>
                <p class="blog.php">
                  Tempe Sanan kini mulai dilirik oleh pasar internasional berkat
                  kualitas dan inovasinya.
                </p>
                <a href="blog.php" class="th-btn"
                  >Baca Selengkapnya<i class="fas fa-chevrons-right ms-2"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="blog-box">
              <div class="blog-img">
                <img src="hero/blogv.png" alt="blog image" />
              </div>
              <div class="blog-content">
                <div class="blog-meta">
                  <a href="blog.php"><i class="far fa-user"></i>Oleh Desa Sanan</a>
                  <a href="blog.php"
                    ><i class="far fa-calendar"></i>19 Maret, 2023</a
                  >
                </div>
                <h3 class="box-title">
                  <a href="blog.php"
                    >Kiat Sukses UMKM Tempe Sanan di Era Digital</a
                  >
                </h3>
                <p class="box-text">
                  Pelaku UMKM Tempe Sanan terus mengembangkan strategi digital
                  marketing untuk memperluas jangkauan produk mereka.
                </p>
                <a href="blog.php" class="th-btn"
                  >Baca Selengkapnya<i class="fas fa-chevrons-right ms-2"></i
                ></a>
              </div>
            </div>
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
