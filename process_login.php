<?php
session_start();
include 'adminfinish/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data email dan password dari form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Query ke database untuk mengambil user berdasarkan email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Debug data user
        // echo '<pre>'; print_r($user); echo '</pre>';

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan data user ke session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                header("Location: adminfinish/admindex.php");
            } else {
                header("Location: Criuckerzz/index.php");
            }
            exit;
        } else {
            // Password salah
            echo "<script>
                    alert('Password yang Anda masukkan salah.');
                    window.location.href = 'login.php';
                  </script>";
        }
    } else {
        // Email tidak ditemukan
        echo "<script>
                alert('Email tidak ditemukan.');
                window.location.href = 'login.php';
              </script>";
    }
} else {
    // Jika bukan POST, redirect ke halaman login
    header("Location: login.php");
    exit;
}
?>
