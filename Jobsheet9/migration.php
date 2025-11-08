<?php
$sql = "CREATE TABLE user (
    id INT(11) PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
)";

if (mysqli_query($connect, $sql)) {
    echo "Tabel user berhasil dibuat";
} else {
    echo "Error: " . mysqli_error($connect);
}
?>