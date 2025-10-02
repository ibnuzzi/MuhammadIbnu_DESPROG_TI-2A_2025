<?php
// langkah 1 -2
// function perkenalan () {
//  echo "Assalamualaikum, ";
//  echo "Perkenalkan, nama saya Elok<br/>"; //Tulis sesuai nama kalian
//  echo "Senang berkenalan dengan Anda<br/>";
//  }

// //memanggil fungsi yang sudah dibuat
// perkenalan();
// perkenalan();

// langkah 4 - 5
//membuat fungsi
// function perkenalan ($nama, $salam){
// echo $salam.",";
// echo "Perkenalkan, nama saya. ".$nama.".<br/>";
// echo "Senang berkenalan dengan Anda<br/>";
// }

// //memanggil fungsi yang sudah dibuat
// perkenalan ("Hamdana", "Hallo");
// echo "<hr>";
// $saya = "Elok";
// $ucapanSalam = "Selamat pagi";
// //memanggil lagi
// perkenalan ($saya, $ucapanSalam);

// langkah 7 & 8
// function perkenalan ($nama, $salam = "Assalamualaikum"){
// echo $salam.",";
// echo "Perkenalkan, nama saya ".$nama."<br/>";
// echo "Senang berkenalan dengan Anda<br/>";
// }
//memanggil fungsi yang sudah dibuat
// perkenalan ("Hamdana", "Hallo");
// echo "<hr>";
// $saya = "Elok";
//memanggil lagi tanpa mengisi parameter salam
// perkenalan ($saya);

// langkah 9 & 10
// function hitungUmur($thn_lahir, $thn_sekarang){
//  $umur = $thn_sekarang - $thn_lahir;
//  return $umur;
//  }
//  echo "Umur saya adalah ", hitungUmur (2005, 2025), " tahun";
//  isi sesuai dengan tahun lahir kalian

// langkah 12 & 13
function hitungUmur($thn_lahir, $thn_sekarang)
{
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}
function perkenalan($nama, $salam = "Assalamualaikum")
{
    echo $salam . ",";
    echo "Perkenalkan, nama saya " . $nama . "<br/>";
    //memanggil fungsi lain
    echo "Saya berusia " . hitungUmur(1988, 2023) . " tahun<br/>";
    echo "Senang berkenalan dengan anda <br/>";
}
//memanggil fungsi perkenalan
perkenalan("Elok");
