<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$log = mysqli_query($conn, "SELECT log_aktivitas.*, admin.username FROM log_aktivitas 
                            JOIN admin ON log_aktivitas.admin_id = admin.id
                            ORDER BY log_aktivitas.waktu DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Log Aktivitas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-2 bg-dark text-white min-vh-100 p-3">
      <h4>Admin Panel</h4>
      <hr>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="dashboard.php" class="nav-link text-white">📂 Kelola Proyek</a></li>
        <li class="nav-item"><a href="log.php" class="nav-link text-white">🕒 Log Aktivitas</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">🚪 Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="col-md-10 p-4">
      <h3>Log Aktivitas</h3>
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>Waktu</th>
            <th>Admin</th>
            <th>Aktivitas</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($log)): ?>
          <tr>
            <td><?= $row['waktu']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['aktivitas']; ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
