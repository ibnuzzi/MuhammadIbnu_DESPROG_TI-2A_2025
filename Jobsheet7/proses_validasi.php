<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $nama = trim($_POST["nama"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = $_POST["password"] ?? '';

    if (empty($nama)) {
        $errors['nama'] = "Nama harus diisi (Server).";
    } 

    if (empty($email)) {
        $errors['email'] = "Email harus diisi (Server).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid (Server).";
    }

    if (empty($password)) {
        $errors['password'] = "Password harus diisi (Server).";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password minimal 8 karakter (Server).";
    }

    if (!empty($errors)) {
        header('Content-Type: application/json');
        echo json_encode(['errors' => $errors]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => "Data berhasil dikirim! (Server)"]);
    }
}
?>