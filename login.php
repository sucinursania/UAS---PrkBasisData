<?php
session_start();
include 'db.php'; // koneksi ke database

$error = ''; // untuk menyimpan pesan error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil data dari database
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Cek password pakai password_verify
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: index.php"); // arahkan ke halaman utama
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"> <style>
        body {
            background-color: rgb(204,  229, 255); /* Latar belakang hitam */
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden; /* Mencegah scroll jika ada elemen di luar viewport */
        }

        .login-wrapper {
            position: relative;
            width: 320px; /* Ukuran yang mendekati layar ponsel */
            height: 600px; /* Ukuran yang mendekati layar ponsel */
            background-color: rgb(242, 164, 229); /* Latar belakang hitam untuk "layar" ponsel */
            border-radius: 30px; /* Sudut melengkung seperti ponsel */
            box-shadow: 0 0 20px rgba(167, 4, 77, 0.5);
            overflow: hidden; /* Penting untuk memotong elemen di luar area */
        }

        .top-wave {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 230px; /* Tinggi gelombang atas */
            background-color:rgb(94, 166, 221); /* Warna pink gelombang */
            border-bottom-left-radius: 30% 20%; /* Gelombang melengkung */
            border-bottom-right-radius: 20% 0%; /* Gelombang melengkung */
            transform: translateY(-30%) rotate(0deg); /* Sedikit rotasi agar lebih melengkung */
            transform-origin: bottom center;
            z-index: 1; /* Pastikan di atas elemen lain */
        }

        .login-container {
            position: relative;
            z-index: 2; /* Di atas gelombang */
            padding: 40px 30px; /* Padding lebih banyak */
            color: #fff; /* Teks putih */
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%; /* Memastikan container mengambil seluruh tinggi wrapper */
            justify-content: flex-start; /* Elemen mulai dari atas */
        }

        .login-logo {
            width: 50px; /* Sesuaikan ukuran logo */
            height: auto;
            margin-top: 10px; /* Jarak dari atas container */
            margin-bottom: 60px; /* Jarak dari teks Welcome! */
        }

        p.create-account-text {
            font-size: 14px;
            color: #fff;
            margin-bottom: 30px;
        }

        input[type="text"], input[type="password"] {
            background-color:rgb(225, 84, 197); /* Latar belakang input field gelap */
            color: #fff; /* Teks input putih */
            padding: 15px;
            margin: 10px 0;
            width: calc(100% - 30px); /* Kurangi padding dari lebar total */
            border-radius: 8px;
            border: 1px solid #555; /* Border abu-abu gelap */
            outline: none; /* Hilangkan outline fokus default */
            font-size: 16px;
        }

        input[type="text"]::placeholder, input[type="password"]::placeholder {
            color: #fff; /* Warna placeholder */
        }

        input[type="submit"] {
            padding: 15px 30px;
            background-color: #F65AD7; /* Warna pink tombol CREATE */
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 600;
            margin-top: 20px;
            width: calc(100% - 30px); /* Lebar tombol sama dengan input */
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color:rgb(238, 143, 219); /* Warna pink sedikit lebih gelap saat hover */
        }

        .error {
            color:rgb(125, 5, 5); /* Warna error yang lebih cerah */
            margin-bottom: 15px;
        }

        .signin-link {
            margin-top: 25px;
            font-size: 14px;
            color: #fff;
        }

        .signin-link a {
            color: #F65AD7; /* Warna pink untuk link SIGN IN */
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
        }

        .signin-link a:hover {
            text-decoration: underline;
        }
        .welcome-screen {
        background-color: #fbd6e6;
        position: fixed;
        width: 100%;
        height: 100vh;
        z-index: 999;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        animation: fadeOut 1s ease 3s forwards; /* hilang setelah 3 detik */
    }

        .welcome-logo {
            width: 120px;
            margin-bottom: 20px;
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                visibility: hidden;
            }
        }
        /* Responsive untuk ukuran yang lebih besar (jika diakses di desktop) */
        @media (min-width: 768px) {
            .login-wrapper {
                width: 380px; /* Ukuran sedikit lebih besar di desktop */
                height: 650px;
            }
        }
        .password-wrapper {
        position: relative;
        width: 100%;
        margin: 10px 0;
        }

        .password-wrapper input[type="password"],
        .password-wrapper input[type="text"] {
        width: 100%;
        padding-right: 40px; /* biar ga ketiban icon */
        background-color: rgb(225, 84, 197);
        color: #fff;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #555;
        font-size: 16px;
        box-sizing: border-box;
        }

        .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 18px;
        color: white;
        }

    </style>
</head>
<body>
  <div class="welcome-screen" id="welcome-screen">
    <img src="LOGO.png" class="welcome-logo" />
    <h1>Welcome to Bill & Co Company</h1>
    <p>Your cute company login portal 💖</p>
  </div>
<div class="login-wrapper" id="login-wrapper" style="display: none;">
    <div class="top-wave"></div>
    <div class="login-container">
        <img src="LOGO.png" alt="LOGO Perusahaan" class="login-LOGO">
        <p class="create-account-text">Login to your account</p>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post" style="width: 100%;">
            <input type="text" name="username" placeholder="Username" required><br>
    <div class="password-wrapper">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <span onclick="togglePassword()" class="toggle-password">👀</span>
    </div>
            <input type="submit" name="login" value="LOGIN">
        </form>
        <p class="signin-link">Don't have an account? <a href="#" id="signin-link">BACK</a></p>
    </div>
</div>
<script>
    // Tampilkan login-wrapper setelah splash screen hilang
    setTimeout(function() {
        document.getElementById("login-wrapper").style.display = "block";
    }, 3000);
     setTimeout(function() {
        document.getElementById("login-wrapper").style.display = "block";
    }, 3000);
    document.getElementById("signin-link").addEventListener("click", function(e) {
        e.preventDefault(); // Biar gak reload
        document.getElementById("login-wrapper").style.display = "none";
        document.getElementById("welcome-screen").style.opacity = "1";
        document.getElementById("welcome-screen").style.visibility = "visible";
        document.getElementById("welcome-screen").style.animation = "none"; // Hapus animasi biar gak fadeOut
    });
    function togglePassword() {
    const passField = document.getElementById("password");
    if (passField.type === "password") {
      passField.type = "text";
    } else {
      passField.type = "password";
    }
  }
</script>
</body>
</html>