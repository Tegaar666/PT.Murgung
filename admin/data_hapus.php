<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM t_data WHERE id = '$id'");
mysqli_query($conn, "INSERT INTO log_aktivitas (admin_id, aktivitas) VALUES ('{$_SESSION['admin_id']}', 'Hapus project ID: $id')");
header("Location: dashboard.php");
exit;
?>
