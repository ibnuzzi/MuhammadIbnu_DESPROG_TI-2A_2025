<html>
<head>
</head>
<body>
    <h2>Keranjang Belanja </h2>
    <?php
    if(isset($_COOKIE['beliNovel'])) {
        $beliNovel = $_COOKIE['beliNovel'];
    } else {
        $beliNovel = 0; // Nilai default jika cookie belum ada
    }

    if(isset($_COOKIE['beliBuku'])) {
        $beliBuku = $_COOKIE['beliBuku'];
    } else {
        $beliBuku = 0; // Nilai default jika cookie belum ada
    }

    echo "Jumlah Novel: " . $beliNovel . "<br>";
    echo "Jumlah Buku : " . $beliBuku;
    ?>
</body>
</html>

