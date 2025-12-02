<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
include "config/koneksi.php";
include "fungsi/pesan_kilat.php";
include "fungsi/anti_injection.php";

$username = antiinjection($koneksi, $_POST['username']);
$password = antiinjection($koneksi, $_POST['password']); // Mengambil password 'admin'

// Kueri diubah: tidak perlu mengambil 'salt'
$query = "SELECT username, level, password FROM `user` WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
mysqli_close($koneksi);

// Mengambil password teks biasa dari database
$password_database = $row['password']; 
if ($password_database != null) {
    // Membandingkan teks biasa: 'admin' == 'admin'
    if ($password == $password_database) {
        // var_dump($password , $password_database); // Debug: tampilkan password dari database
        // die(); // Hentikan eksekusi untuk debugging 
        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];
        header("Location: index.php");
    } else {
        pesan('danger', "Login gagal. Password Anda Salah.");
        header("Location: login.php");
    }
} else {
    pesan('warning', "Username tidak ditemukan.");
    header("Location: login.php");
}
?>