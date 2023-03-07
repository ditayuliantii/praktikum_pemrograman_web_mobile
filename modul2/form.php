<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $user = strlen($username);
    $pass = strlen($password);
    $x = true;

    if (($user>7)) {
        echo "<script> alert('password tidak boleh lebih dari 7 karakter')</script>";
        $x = false;
    }
    if (!preg_match("/[A-Z]/", $password)) {
        echo "<script> alert('password harus ada huruf kapital')</script>";
        $x = false;
    }
    if (!preg_match("/[a-z]/", $password)) {
        echo "<script> alert('password harus ada huruf kecil')</script>";
        $x = false;
    }
    if (!preg_match("/[^a-zA-Z\d]/", $password)) {
        echo "<script> alert('password harus ada karakter spesial')</script>";
        $x = false;
    }
    if (!preg_match("/[0-9]/", $password)) {
        echo "<script> alert('password harus ada angka')</script>";
        $x = false;
    }
    if ($pass<10) {
        echo "<script> alert('password minimal 10 karakter')</script>";
        $x = false;
    }
    if ($x == true) {
        echo "<script> alert('Login Berhasil!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling</title>
    <style>
    body {
        background-color: #f4f1f1;
        justify-content: center;
        height: 500px;
        display: flex;
        align-items: center;
    }

    .form-login {
        text-align: center;
        background-color: antiquewhite;
        padding: 30px;
        border-radius: 15px;
    }

    h2 {
        margin-top: 0%;
    }
    </style>

</head>

<body>
    <form action="" method="POST">
        <div class="form-login">
            <h2>Form Login</h2>
            <div>
                <input type="text" name="username" placeholder="username" required>
            </div> <br>

            <div>
                <input type="password" name="password" placeholder="password" required>
            </div> <br>

            <div>
                <button type="submit">Kirim</button>
            </div>

        </div>
    </form>
</body>

</html>