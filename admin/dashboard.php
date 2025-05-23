<?php
session_start();
include 'koneksi.php'; // koneksi ke database

// Cek apakah admin udah login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Ambil data admin
$admin_id = $_SESSION['admin_id'];
$admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE id = $admin_id"));

// Ambil data proyek
$jumlah_proyek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM t_data"))['total'];
$proyek_terbaru = mysqli_query($conn, "SELECT * FROM t_data ORDER BY tanggal_dimulai_proyek DESC LIMIT 1");
$data_proyek = mysqli_query($conn, "SELECT * FROM t_data ORDER BY tanggal_dimulai_proyek DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <link rel="shortcut icon" href="img/logo/logo-murgung2.jpg" type="image/x-icon">
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-2 bg-dark text-white min-vh-100 p-3">
      <h4>Admin Panel</h4>
      <hr>
      <p>👋 Hai, <strong><?= $admin['username']; ?></strong></p>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="dashboard.php" class="nav-link text-white">📂 Kelola Projects</a></li>
        <li class="nav-item"><a href="log.php" class="nav-link text-white">🕒 Log Aktivitas</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">🚪 Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="col-md-10 p-4">
      <h2>Selamat Datang, <?= $admin['username']; ?>!</h2>
      <p>Hari ini: <?= date("l, d M Y "); ?></p>
      <hr>

      <!-- Ringkasan Konten -->
      <div class="mb-4">
        <h4>Ringkasan</h4>
        <p>Total Proyek: <strong><?= $jumlah_proyek; ?></strong></p>
        <?php if (mysqli_num_rows($proyek_terbaru) > 0): 
          $pt = mysqli_fetch_assoc($proyek_terbaru); ?>
          <p>Proyek Terbaru: <strong><?= $pt['nama_proyek']; ?></strong> (<?= $pt['tanggal_dimulai_proyek']; ?>)</p>
        <?php endif; ?>
      </div>

      <!-- CRUD Proyek -->
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Project</h4>
        <a href="data_tambah.php" class="btn btn-primary">➕ Tambah Proyek</a>
      </div>

      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>Nama Proyek</th>
            <th>Nama Klien</th>
            <th>Perusahaan</th>
            <th>Deskripsi</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($data_proyek)): ?>
          <tr>
            <td><?= $row['nama_proyek']; ?></td>
            <td><?= $row['nama_klien']; ?></td>
            <td><?= $row['nama_perusahaan']; ?></td>
            <td><?= $row['deskripsi']; ?></td>
            <td><?= $row['tanggal_dimulai_proyek']; ?></td>
            <td><?= $row['tanggal_selesai_proyek']; ?></td>
            <td>
              <a href="data_edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">📝 Edit</a>
              <a href="data_hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">❌ Hapus</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>

    </div>
  </div>
</div>
</body>
</html>
