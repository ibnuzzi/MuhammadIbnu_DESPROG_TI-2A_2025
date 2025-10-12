<!DOCTYPE html>
<html>
<head>
    <title>Form Validasi dengan AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.8.min.js"></script>
</head>
<body>
    <h1>Form Validasi dengan AJAX</h1>
    <form id="myForm" method="post" action="proses_validasi.php">
        <label for="nama">Nama: </label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span id="password-error" style="color: red;"></span><br><br>

        <input type="submit" value="Submit">
    </form>
    <div id="hasil_proses"></div>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                var valid_client = true;

                var password = $("#password").val();
                $("#password-error").text("");
                if (password === "") {
                    $("#password-error").text("Password harus diisi (Client).");
                    valid_client = false;
                } else if (password.length < 8) {
                    $("#password-error").text("Password minimal 8 karakter (Client).");
                    valid_client = false;
                }

                if (!valid_client) return;

                $.ajax({
                    url: "proses_validasi.php",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    success: function(response) {

                        $("#nama-error, #email-error, #password-error").text("");
                        $("#hasil_proses").html("");

                        if (response.errors) {
                            if (response.errors.nama) $("#nama-error").text(response.errors.nama);
                            if (response.errors.email) $("#email-error").text(response.errors.email);
                            if (response.errors.password) $("#password-error").text(response.errors.password);
                            $("#hasil_proses").html("<p style='color: red;'>Validasi Gagal di Server!</p>");
                        } else if (response.success) {
                            $("#hasil_proses").html("<p style='color: green;'>" + response.success + "</p>");
                            $("#myForm")[0].reset();
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>