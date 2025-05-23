<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['admin_id'])) {
    $id = $_SESSION['admin_id'];
    mysqli_query($conn, "INSERT INTO log_aktivitas (admin_id, aktivitas) VALUES ('$id', 'Logout')");
}

session_unset();
session_destroy();
header("Location: login.php");
exit;
?>
