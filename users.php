<?php
include 'db.php'; // Pastikan path ini sesuai struktur folder kamu

$username = 'winter';
$password_plain = 'bin1';
$password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);

// Cek apakah username sudah ada
$check = $conn->prepare("SELECT * FROM users WHERE username = ?");
$check->bind_param("s", $username);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "Username sudah terdaftar!";
} else {
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password_hashed);

    if ($stmt->execute()) {
        echo "User berhasil ditambahkan!";
    } else {
        echo "Gagal menambahkan user: " . $stmt->error;
    }

    $stmt->close();
}

$check->close();
$conn->close();
?>
