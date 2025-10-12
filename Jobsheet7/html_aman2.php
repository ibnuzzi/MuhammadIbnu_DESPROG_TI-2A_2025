<!DOCTYPE html>
<html>
<head>
<title>Penanganan HTML Injection</title>
</head>
<body>
<h2>Uji HTML Injection dan Validasi</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="input">Masukkan Teks:</label>
    <input type="text" name="input" id="input"><br><br>
    
    <label for="email">Masukkan Email:</label>
    <input type="text" name="email" id="email"><br><br>
    
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<h3>Hasil Validasi Email:</h3>";

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div style='color: green;'>Email VALID: " . htmlspecialchars($email) . "</div>";
        } else {
            echo "<div style='color: red;'>Email TIDAK VALID: Format email tidak benar.</div>";
        }
    }
}
?>
</body>
</html>
