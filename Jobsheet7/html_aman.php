<!DOCTYPE html>
<html>
<head>
    <title>Penanganan HTML Injection</title>
</head>
<body>
    <h2>Uji HTML Injection dengan htmlspecialchars()</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="input">Masukkan Teks:</label>
        <input type="text" name="input" id="input"><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input'])) {

        $input = $_POST['input'];
        $input_aman = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        echo "<h3>Hasil Output Aman:</h3>";
        echo "<div>Anda memasukkan: " . $input_aman . "</div>";
    }
    ?>
</body>
</html>
<?php
