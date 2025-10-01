<?php
// soal 5.1
$nilaiSiswa = [85, 92, 78, 64, 90, 55, 88, 79, 70, 96];
$nilaiLulus = [];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai >= 70) {
        $nilaiLulus[] = $nilai;
    }
}

echo "Daftar nilai siswa yang lulus: " . implode(', ', $nilaiLulus);

echo "<br><br>";

// soal 5.2
$daftarKaryawan = [
    ['Alice', 7],
    ['Bob', 3],
    ['Charlie', 9],
    ['David', 5],
    ['Eva', 6],
];

$karyawanPengalamanLimaTahun = [];

foreach ($daftarKaryawan as $karyawan) {
    if ($karyawan[1] > 5) {
        $karyawanPengalamanLimaTahun[] = $karyawan[0];
    }
}

echo "Daftar karyawan dengan pengalaman kerja lebih dari 5 tahun: " . implode(', ', 
$karyawanPengalamanLimaTahun);

echo "<br><br>";

// soal 5.3
$daftarNilai = [
    'Matematika' => [
        ['Alice', 85],
        ['Bob', 92],
        ['Charlie', 78],
    ],
    'Fisika' => [
        ['Alice', 90],
        ['Bob', 88],
        ['Charlie', 75],
    ],
    'Kimia' => [
        ['Alice', 92],
        ['Bob', 80],
        ['Charlie', 85],
    ],
];

$matakuliah = 'Fisika';

echo "Daftar nilai mahasiswa dalam mata kuliah {$matakuliah}: <br>";

foreach ($daftarNilai[$matakuliah] as $nilai) {
    echo "Nama: {$nilai[0]}, Nilai: {$nilai[1]} <br>";
}

echo "<br><br>";

// soal 5.4
$siswa = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90]
];

$totalNilai = 0;
foreach ($siswa as $dataSiswa) {
    $totalNilai += $dataSiswa[1];
}

$rataRataKelas = $totalNilai / count($siswa);

echo "Nilai rata-rata kelas: " . round($rataRataKelas, 2) . "<br>";
echo "Daftar siswa di atas rata-rata kelas:<br>";

foreach ($siswa as $dataSiswa) {
    if ($dataSiswa[1] > $rataRataKelas) {
        echo "Nama: {$dataSiswa[0]}, Nilai: {$dataSiswa[1]} <br>";
    }
}
?>