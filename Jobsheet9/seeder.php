<?php
$password = md5('123');

$sql = "INSERT INTO user (id, username, password)
        VALUES (1, 'admin', '$password')";

if (mysqli_query($connect, $sql)) {
    echo "Data admin berhasil dimasukkan";
} else {
    echo "Error: " . mysqli_error($connect);
}
?>