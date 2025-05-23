<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['tambah'])) {
  $nama_proyek = $_POST['nama_proyek'];
  $nama_klien = $_POST['nama_klien'];
  $nama_perusahaan = $_POST['nama_perusahaan'];
  $deskripsi = $_POST['deskripsi'];
  $tgl_mulai = $_POST['tanggal_mulai'];
  $tgl_selesai = $_POST['tanggal_selesai'];
  $kategori = $_POST['kategori'];
  $nilai_kontrak = $_POST['nilai_kontrak'];


    // Upload gambar utama
    $namaFile = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $lokasiUpload = 'img/project/';
    $namaUtama = uniqid() . '-' . $namaFile;
    
    if (move_uploaded_file($tmp, $lokasiUpload . $namaUtama)) {
        echo "Upload utama berhasil: $namaUtama<br>";
    } else {
        echo "Upload GAGAL!";
        exit;
    }    

    // Simpan ke t_data
    $query = mysqli_query($conn, "INSERT INTO t_data 
  (image, nama_proyek, nama_klien, nama_perusahaan, deskripsi, tanggal_dimulai_proyek, tanggal_selesai_proyek, kategori, nilai_kontrak) 
  VALUES 
  ('$namaUtama', '$nama_proyek', '$nama_klien', '$nama_perusahaan', '$deskripsi', '$tgl_mulai', '$tgl_selesai', '$kategori', '$nilai_kontrak')");

    if ($query) {
        $id_proyek = mysqli_insert_id($conn);

        // Upload banyak gambar tambahan
        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            $namaGambar = $_FILES['images']['name'][$key];
            $namaBaru = uniqid() . '-' . $namaGambar;
            $uploadPath = $lokasiUpload . $namaBaru;

            if (move_uploaded_file($tmpName, $lokasiUpload . $namaBaru)){
              echo "Upload tambahan berhasil: $namaBaru<br>";
              mysqli_query($conn, "INSERT INTO project_images (project_id, image) VALUES ('$id_proyek', '$namaBaru')");
            } else {
              echo "GAGAL upload gambar tambahan: $namaGambar<br>";
            }
        }

        // Simpan log aktivitas
        mysqli_query($conn, "INSERT INTO log_aktivitas (admin_id, aktivitas) 
                             VALUES ('{$_SESSION['admin_id']}', 'Tambah proyek: $nama_klien')");
        header("Location: dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Proyek</title>
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
      <h3>Tambah Proyek</h3>
      <form method="post" enctype="multipart/form-data">
        
        <div class="mb-3">
          <label>Gambar Utama</label>
          <input type="file" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Foto Lainnya (bisa pilih banyak)</label>
          <input type="file" name="images[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
          <label>Kategori</label>
          <select name="kategori" class="form-select" required>
            <option value="rumah">Rumah</option>
            <option value="gedung">Gedung</option>
            <option value="jalan">Jalan</option>
            <option value="other">Other</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Nama Proyek</label>
          <input type="text" name="nama_proyek" class="form-control" required>
        </div>


        <div class="mb-3">
          <label>Nama Klien</label>
          <input type="text" name="nama_klien" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Nama Perusahaan</label>
          <input type="text" name="nama_perusahaan" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
          <label>Tanggal Mulai</label>
          <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Tanggal Selesai</label>
          <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Nilai Kontrak </label>
          <input type="number" name="nilai_kontrak" class="form-control" required>
        </div>

        <button type="submit" name="tambah" class="btn btn-success">Simpan</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>
