<?php
// Koneksi database
include('../adminfinish/db.php'); // Pastikan file koneksi database sudah terhubung

// Menyimpan komentar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_comment'])) {
    // Ambil data dari form
    $id_blog = $_GET['id']; // ID blog yang dipilih
    $parent_comment_id = isset($_POST['parent_comment_id']) && $_POST['parent_comment_id'] !== 'NULL' ? $_POST['parent_comment_id'] : NULL;
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']); // Nama pengguna
    $comment = mysqli_real_escape_string($conn, $_POST['comment']); // Komentar
    $status = 'Aktif'; // Status komentar

    // Query untuk menyimpan komentar ke database
    $query = "INSERT INTO comments (id_blog, parent_comment_id, customer_name, comment, status) 
              VALUES ('$id_blog', " . ($parent_comment_id ? "'$parent_comment_id'" : "NULL") . ", '$customer_name', '$comment', '$status')";

    // Menjalankan query
    if (mysqli_query($conn, $query)) {
        // Redirect setelah berhasil menyimpan komentar
        header("Location: blog-details.php?id=$id_blog");
        exit; // Hentikan script setelah redirect
    } else {
        echo "<script>alert('Gagal menambahkan komentar. Coba lagi.');</script>";
    }
}
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>
      Criuckerz
    </title>    <meta name="author" content="criuckerz" />
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
          <h1 class="breadcumb-title">Blog </h1>
          <ul class="breadcumb-menu">
            <li><a href="index.php">Home</a></li>
            <li>Blog Standard</li>
          </ul>
        </div>
      </div>
    </div>
    <?php
include('../adminfinish/db.php');  // Pastikan ini mengarah ke file koneksi yang benar

// Mengambil ID blog dari URL
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];
} else {
    echo "Blog tidak ditemukan.";
    exit;
}

// Mengambil data blog berdasarkan ID
$query = "SELECT * FROM blog WHERE id = '$blog_id' AND status = 'active'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("ERROR: Could not execute query. " . mysqli_error($conn));
}

// Mengecek apakah blog ditemukan
if (mysqli_num_rows($result) == 0) {
    echo "Blog tidak ditemukan.";
    exit;
}

// Mendapatkan data blog
$row = mysqli_fetch_assoc($result);
$title = htmlspecialchars($row['title']);
$content = $row['content'];  // Pastikan kolom 'content' ada dalam tabel
$image = $row['image'];      // Pastikan kolom 'image' ada dalam tabel
$created_at = date('d M, Y', strtotime($row['created_at'])); // Format tanggal
?>

    <section class="th-blog-wrapper blog-details space-top space-extra-bottom">
      <div class="container">
      <div class="row">
    <div class="col-xxl-8 col-lg-7">
        <div class="th-blog blog-single">
            <div class="blog-img">
                <img src="../adminfinish/uploads/<?php echo $image; ?>" alt="Blog Image" />
            </div>
            <div class="blog-content">
                <div class="blog-meta">
                    <a class="author" href="blog.html"><i class="far fa-user"></i>By Criuckerz</a>
                    <a href="blog.php"><i class="far fa-calendar"></i><?php echo $created_at; ?></a>
                    <a href="blog-details.php?id=<?php echo $blog_id; ?>"><i class="far fa-comments"></i>Komentar (3)</a>
                </div>
                <h2 class="blog-title"><?php echo $title; ?></h2>
                <p><?php echo $content; ?></p>
            </div>
        </div>
        
        <?php  
// Fungsi untuk mendapatkan avatar random
function get_random_avatar() {
    $avatars = ['avatar1.svg', 'avatar2.svg', 'avatar3.svg', 'avatar4.svg'];
    return $avatars[array_rand($avatars)];
}

// Fungsi untuk menampilkan komentar secara hierarki
function display_comments($parent_id, $id_blog, $conn, $level = 0) {
    // Query untuk mengambil komentar sesuai parent_id
    $query = $parent_id === NULL
        ? "SELECT * FROM comments WHERE id_blog = '$id_blog' AND parent_comment_id IS NULL AND status = 'Aktif' ORDER BY comment_date DESC"
        : "SELECT * FROM comments WHERE id_blog = '$id_blog' AND parent_comment_id = '$parent_id' AND status = 'Aktif' ORDER BY comment_date DESC";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        // Mendapatkan avatar random untuk setiap komentar
        $avatar = get_random_avatar();

        // Styling khusus untuk balasan
        $is_reply = $level > 0; // Jika level lebih dari 0, berarti ini balasan
        $avatar_size = $is_reply ? '40px' : '60px'; // Ukuran avatar lebih kecil untuk balasan
        $font_size = $is_reply ? '14px' : '16px'; // Ukuran font lebih kecil untuk balasan
        $margin_left = $level * 30; // Indentasi bertingkat berdasarkan level

        echo '
        <li class="th-comment-item" style="margin-left:' . $margin_left . 'px;">
            <div class="th-post-comment" style="font-size: ' . $font_size . ';">
                <div class="comment-avater" style="width: ' . $avatar_size . '; height: ' . $avatar_size . ';">
                    <img src="avatar/' . $avatar . '" alt="Penulis Komentar" style="width: 100%; height: 100%; border-radius: 50%;" />
                </div>
                <div class="comment-content">
                    <span class="commented-on"><i class="far fa-calendar"></i> ' . date('d M, Y', strtotime($row['comment_date'])) . '</span>
                    <h3 class="name">' . htmlspecialchars($row['customer_name']) . '</h3>
                    <p class="text">' . nl2br(htmlspecialchars($row['comment'])) . '</p>
                    <div class="reply_and_edit">
                        <a href="javascript:void(0);" class="reply-btn" onclick="setReply(' . $row['id'] . ')"><i class="fas fa-reply"></i> Balas</a>
                    </div>
                </div>
            </div>
        </li>';

        // Rekursi untuk menampilkan balasan
        display_comments($row['id'], $id_blog, $conn, $level + 1);
    }
}
?>





<div class="th-comments-wrap">
    <h2 class="blog-inner-title h4">
        <i class="far fa-comments"></i> Komentar
    </h2>
    <ul class="comment-list">
        <?php
        $id_blog = $_GET['id']; // ID blog dari URL
        display_comments(NULL, $id_blog, $conn); // Memulai dengan komentar utama
        ?>
    </ul>
</div>


<!-- Form Komentar -->
<!-- Form Komentar -->
<div class="th-comment-form">
    <div class="form-title">
        <h3 class="blog-inner-title h4 mb-2">
            <i class="fa-solid fa-reply"></i> Tinggalkan Komentar
        </h3>
        <p class="form-text">
            Alamat email Anda tidak akan dipublikasikan. Kolom yang wajib diisi ditandai dengan *
        </p>
    </div>
    <form method="POST">
        <input type="hidden" name="parent_comment_id" id="parent_comment_id" value="NULL">
        <div class="row">
            <div class="col-md-6 form-group">
                <input
                    type="text"
                    name="customer_name"
                    placeholder="Nama Anda*"
                    class="form-control"
                    required
                />
                <i class="far fa-user"></i>
            </div>
            <div class="col-md-6 form-group">
                <input
                    type="email"
                    name="email"
                    placeholder="Email Anda*"
                    class="form-control"
                    required
                />
                <i class="far fa-envelope"></i>
            </div>
            <div class="col-12 form-group">
                <textarea
                    name="comment"
                    placeholder="Tulis Komentar*"
                    class="form-control"
                    required
                ></textarea>
                <i class="far fa-pencil"></i>
            </div>
            <div class="col-12 form-group mb-0">
                <button type="submit" name="submit_comment" class="th-btn">Posting Komentar</button>
            </div>
        </div>
    </form>
</div>


<script>
    // Fungsi untuk menetapkan parent_comment_id saat balasan di klik
    function setReply(commentId) {
        document.getElementById('parent_comment_id').value = commentId;
        window.scrollTo({
            top: document.querySelector('.th-comment-form').offsetTop,
            behavior: 'smooth'
        });
    }
</script>


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
