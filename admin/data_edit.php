<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM t_data WHERE id = '$id'"));

if (isset($_POST['edit'])) {
  $nama_proyek = $_POST['nama_proyek'];
  $nama_klien = $_POST['nama_klien'];
  $nama_perusahaan = $_POST['nama_perusahaan'];
  $deskripsi = $_POST['deskripsi'];
  $tgl_mulai = $_POST['tanggal_mulai'];
  $tgl_selesai = $_POST['tanggal_selesai'];
  $kategori = $_POST['kategori'];
  $nilai_kontrak = $_POST['nilai_kontrak'];


    // Path folder upload (DARI file ini /admin/data_edit.php)
    $lokasiUpload = 'img/project/';

    // Cek apakah ada gambar baru diupload
    if ($_FILES['image']['name']) {
        $namaFile = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $namaBaru = uniqid() . '-' . $namaFile;

        // Upload file baru
        if (move_uploaded_file($tmp, $lokasiUpload . $namaBaru)) {
            // Hapus file lama kalau ada
            if (!empty($data['image']) && file_exists($lokasiUpload . $data['image'])) {
                unlink($lokasiUpload . $data['image']);
            }

            // Update dengan gambar baru
            mysqli_query($conn, "UPDATE t_data SET 
              image='$namaBaru',
              nama_proyek='$nama_proyek',
              nama_klien='$nama_klien',
              nama_perusahaan='$nama_perusahaan',
              deskripsi='$deskripsi',
              tanggal_dimulai_proyek='$tgl_mulai',
              tanggal_selesai_proyek='$tgl_selesai',
              kategori='$kategori',
              nilai_kontrak='$nilai_kontrak'
              WHERE id='$id'");

        }
    } else {
        // Update tanpa ubah gambar
       mysqli_query($conn, "UPDATE t_data SET 
    nama_proyek='$nama_proyek',
    nama_klien='$nama_klien',
    nama_perusahaan='$nama_perusahaan',
    deskripsi='$deskripsi',
    tanggal_dimulai_proyek='$tgl_mulai',
    tanggal_selesai_proyek='$tgl_selesai',
    kategori='$kategori',
    nilai_kontrak='$nilai_kontrak'
    WHERE id='$id'");

    }

    // Catat log
    mysqli_query($conn, "INSERT INTO log_aktivitas (admin_id, aktivitas) VALUES ('{$_SESSION['admin_id']}', 'Edit project ID: $id')");
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Proyek</title>
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
        <li class="nav-item"><a href="dashboard.php" class="nav-link text-white">📂 Kelola Project</a></li>
        <li class="nav-item"><a href="log.php" class="nav-link text-white">🕒 Log Aktivitas</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">🚪 Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="col-md-10 p-4">
      <h3>Edit Project</h3>
      <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label>Kategori</label>
          <select name="kategori" class="form-select" required>
            <option value="jalan" <?= $data['kategori'] == 'jalan' ? 'selected' : '' ?>>Jalan</option>
            <option value="gedung" <?= $data['kategori'] == 'gedung' ? 'selected' : '' ?>>Gedung</option>
            <option value="rumah" <?= $data['kategori'] == 'rumah' ? 'selected' : '' ?>>Rumah</option>
            <option value="other" <?= $data['kategori'] == 'other' ? 'selected' : '' ?>>Other</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Upload Gambar Baru (biarkan kosong jika tidak ingin diganti)</label>
          <input type="file" name="image" class="form-control">
          <?php if ($data['image']): ?>
            <p class="mt-2">Gambar saat ini:</p>
            <img src="img/project/<?= $data['image']; ?>" width="150">
          <?php endif; ?>
        </div>

        <div class="mb-3">
  <label>Nama Proyek</label>
  <input type="text" name="nama_proyek" value="<?= $data['nama_proyek'] ?>" class="form-control" required>
</div>


        <div class="mb-3">
          <label>Nama Klien</label>
          <input type="text" name="nama_klien" value="<?= $data['nama_klien'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Nama Perusahaan</label>
          <input type="text" name="nama_perusahaan" value="<?= $data['nama_perusahaan'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control"><?= $data['deskripsi'] ?></textarea>
        </div>

        <div class="mb-3">
          <label>Tanggal Mulai</label>
          <input type="date" name="tanggal_mulai" value="<?= $data['tanggal_dimulai_proyek'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Tanggal Selesai</label>
          <input type="date" name="tanggal_selesai" value="<?= $data['tanggal_selesai_proyek'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Nilai Kontrak (Rp)</label>
          <input type="number" name="nilai_kontrak" value="<?= $data['nilai_kontrak'] ?? 0 ?>" class="form-control" required>
        </div>


        <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>
