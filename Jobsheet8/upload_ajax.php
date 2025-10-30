<?php
if (isset($_FILES['files'])) {
    // Ubah ekstensi yang diizinkan
    $extensions = array("jpg", "jpeg", "png", "gif");
    $all_errors = array();
    $upload_path = "uploads/"; // Ganti ke folder uploads

    if (!file_exists($upload_path)) {
        mkdir($upload_path, 0777, true);
    }

    $totalFiles = count($_FILES['files']['name']);

    // Loop untuk setiap file
    for ($i = 0; $i < $totalFiles; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        @$file_ext = strtolower(end(explode('.', $file_name)));

        $errors = array();

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "Ekstensi file $file_name tidak diizinkan (hanya JPG, JPEG, PNG, GIF).";
        }

        if ($file_size > 2097152) { // Tetap 2 MB
            $errors[] = "Ukuran file $file_name tidak boleh lebih dari 2 MB.";
        }

        if (empty($errors) == true) {
            if (!move_uploaded_file($file_tmp, $upload_path . $file_name)) {
                $all_errors[] = "Gagal mengunggah $file_name.";
            }
        } else {
            $all_errors = array_merge($all_errors, $errors);
        }
    }

    // Tampilkan hasil
    if (empty($all_errors)) {
        echo "Semua file gambar berhasil diunggah.";
    } else {
        echo implode("<br>", $all_errors);
    }
}
?>