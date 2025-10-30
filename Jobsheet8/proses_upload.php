<?php
// Lokasi penyimpanan file yang diunggah
$targetDirectory = "uploads/"; // Ganti ke folder uploads agar konsisten
$allowedExtensions = array("jpg", "jpeg", "png", "gif");

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if (isset($_FILES['files']) && $_FILES['files']['name'][0]) {
    $totalFiles = count($_FILES['files']['name']);

    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $targetFile = $targetDirectory . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $tmpName = $_FILES['files']['tmp_name'][$i];

        // Validasi ekstensi file
        if (in_array($fileType, $allowedExtensions)) {
            // Pindahkan file yang diunggah ke direktori penyimpanan
            if (move_uploaded_file($tmpName, $targetFile)) {
                echo "File gambar $fileName berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "File $fileName tidak valid (hanya .jpg, .jpeg, .png, .gif yang diizinkan).<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>