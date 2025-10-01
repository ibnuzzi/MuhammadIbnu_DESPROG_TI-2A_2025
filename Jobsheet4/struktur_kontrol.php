<?php
// soal 4.1
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf: B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C";
} elseif ($nilaiNumerik < 70) {
    echo "Nilai huruf: D";
}

echo "<br><br>";

// soal 4.2
$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}

echo "Atlet tersebut memerlukan {$hari} hari untuk mencapai jarak 500 kilometer.";

echo "<br><br>";

// soal 4.3
$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "Jumlah buah yang akan dipanen adalah: {$jumlahBuah}";

echo "<br><br>";

// soal 4.4
$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}

echo "Total skor ujian adalah: {$totalSkor}";

echo "<br><br>";

// soal 4.5
$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: {$nilai} (Tidak lulus) <br>";
        continue;
    }
    echo "Nilai: {$nilai} (Lulus) <br>";
}

echo "<br><br>";

// soal 4.6
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
sort($nilaiSiswa);

// Abaikan 2 nilai terendah dan 2 nilai tertinggi
$nilaiSiswa = array_slice($nilaiSiswa, 2, -2);
$totalNilai = array_sum($nilaiSiswa);

echo "Total nilai yang digunakan untuk rata-rata: {$totalNilai}";

echo "<br><br>";

// soal 4.7
$hargaProduk = 120000;
$diskon = 0;

if ($hargaProduk > 100000) {
    $diskon = $hargaProduk * 0.20;
}

$hargaSetelahDiskon = $hargaProduk - $diskon;

echo "Harga produk: Rp " . number_format($hargaProduk, 0, ',', '.') . "<br>";
echo "Harga yang harus dibayar setelah diskon: Rp " . number_format($hargaSetelahDiskon, 0, ',', '.');

echo "<br><br>";

// soal 4.8
$poinPemain = 650;
$statusHadiah = ($poinPemain > 500) ? "YA" : "TIDAK";

echo "Total skor pemain adalah: {$poinPemain}<br>";
echo "Apakah pemain mendapatkan hadiah tambahan? ({$statusHadiah})";
?>