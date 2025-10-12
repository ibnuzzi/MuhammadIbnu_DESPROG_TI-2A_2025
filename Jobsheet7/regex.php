<?php
$pattern = '/[a-z]/';
$text = 'This is a Sample Text.';

if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!" . "<br>";
} else {
    echo "Tidak ada huruf kecil!" . "<br>";
}

echo "<hr>"; 

$pattern = '/[0-9]+/'; 
$text = 'There are 123 apples.';
$matches = array(); 

if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok!" . "<br>";
}

echo "<hr>"; 

$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie.';
$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text . "<br>";

echo "<hr>"; 

// $pattern = '/go*d/'; 
// $text = 'god is good.';
// $matches = array();

// if (preg_match($pattern, $text, $matches)) {
//     echo "Cocokkan: " . $matches[0] . "<br>";
// } else {
//     echo "Tidak ada yang cocok!" . "<br>";
// }

// $pattern_q = '/go?d/'; 
// $text_q = 'gd is good, but ggod is not.';
// $matches_q = array();

// if (preg_match($pattern_q, $text_q, $matches_q)) {
//     echo "Soal 5.5 - Cocokkan: " . $matches_q[0] . "<br>";
// } else {
//     echo "Soal 5.5 - Tidak ada yang cocok!" . "<br>";
// }

$pattern_range = '/go{2,3}d/';
$text_range = 'god is good and goood.';
$matches_range = array();

if (preg_match($pattern_range, $text_range, $matches_range)) {
    echo "Soal 5.6 - Cocokkan: " . $matches_range[0] . "<br>";
} else {
    echo "Soal 5.6 - Tidak ada yang cocok!" . "<br>";
}
?>