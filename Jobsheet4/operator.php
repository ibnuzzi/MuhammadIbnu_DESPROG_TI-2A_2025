<?php
// Soal 3.1
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Hasil tambah: {$hasilTambah}<br>";
echo "Hasil kurang: {$hasilKurang}<br>";
echo "Hasil kali: {$hasilKali}<br>";
echo "Hasil bagi: {$hasilBagi}<br>";
echo "Sisa bagi: {$sisaBagi}<br>";
echo "Pangkat: {$pangkat}<br>";

echo "<br><br>";

// Soal 3.2
$a = 10;
$b = 5;

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Sama dengan: {$hasilSama}<br>";
echo "Tidak sama dengan: {$hasilTidakSama}<br>";
echo "Lebih kecil: {$hasilLebihKecil}<br>";
echo "Lebih besar: {$hasilLebihBesar}<br>";
echo "Lebih kecil atau sama dengan: {$hasilLebihKecilSama}<br>";
echo "Lebih besar atau sama dengan: {$hasilLebihBesarSama}<br>";

echo "<br><br>";

// Soal 3.3
$a = true;
$b = false;

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil AND: {$hasilAnd}<br>";
echo "Hasil OR: {$hasilOr}<br>";
echo "Hasil NOT A: {$hasilNotA}<br>";
echo "Hasil NOT B: {$hasilNotB}<br>";

echo "<br><br>";

// Soal 3.4
$a = 10;
$b = 5;

$a += $b;
echo "Hasil penugasan tambah: {$a}<br>";

$a = 10;
$a -= $b;
echo "Hasil penugasan kurang: {$a}<br>";

$a = 10;
$a *= $b;
echo "Hasil penugasan kali: {$a}<br>";

$a = 10;
$a /= $b;
echo "Hasil penugasan bagi: {$a}<br>";

$a = 10;
$a %= $b;
echo "Hasil penugasan sisa bagi: {$a}<br>";

echo "<br><br>";

// Soal 3.5
$a = 10;
$b = "10";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Hasil identik: {$hasilIdentik}<br>";
echo "Hasil tidak identik: {$hasilTidakIdentik}<br>";

echo "<br><br>";

// Soal 3.6
$total_kursi = 45;
$kursi_terisi = 28;

$kursi_kosong = $total_kursi - $kursi_terisi;
$persentase_kosong = ($kursi_kosong / $total_kursi) * 100;

echo "Total kursi: {$total_kursi}<br>";
echo "Kursi terisi: {$kursi_terisi}<br>";
echo "Kursi yang masih kosong: {$kursi_kosong}<br>";
echo "Persentase kursi yang kosong: {$persentase_kosong}%";
?>