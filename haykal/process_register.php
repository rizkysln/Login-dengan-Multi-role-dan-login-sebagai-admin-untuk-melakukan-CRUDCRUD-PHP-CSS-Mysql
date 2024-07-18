<?php
require 'function.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user'; // Tetapkan peran sebagai 'user'

    // Cek apakah username sudah ada
    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah digunakan!');
              </script>";
    } else {
        // Insert data ke database
        mysqli_query($koneksi, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
        echo "<script>
                alert('Pendaftaran berhasil!');
                window.location.href = 'login.php';
              </script>";
    }
}
?>
