<?php
session_start();
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password1 = $_POST['password'];
    $password2 = $_POST['konfirmasi'];

    // cek username udah dipake belum
    $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan!');</script>";
    } elseif ($password1 != $password2) {
        echo "<script>alert('Konfirmasi password tidak cocok!');</script>";
    } else {
        $hash = password_hash($password1, PASSWORD_DEFAULT);
        $query = mysqli_query($conn, "INSERT INTO admin (username, password) VALUES ('$username', '$hash')");
        if ($query) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 shadow">
                    <h4 class="mb-3 text-center">Registrasi Admin</h4>
                    <form method="post">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="konfirmasi" class="form-control" required>
                        </div>
                        <button type="submit" name="register" class="btn btn-success w-100">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
