<?php 
session_start();
include 'js/koneksi.php';
if (isset($_SESSION['kd_cs'])) {
  $kode_cs = $_SESSION['kd_cs'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Meta -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>PT. Murgung Nusa Parama</title>

  <!-- Google Fonts Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Materialize CSS -->
  <link rel="stylesheet" href="css/materialize.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

  <link rel="shortcut icon" href="img/logo/logo-murgung2.jpg" type="image/x-icon">
</head>

<style>
body {
  font-family: "Acme", sans-serif;
  font-weight: 400;
  font-style: normal;
}

</style>
<body id="home" class="scrollspy">

  <!-- Navbar -->
  <nav style="background-color: #6F826A;">
    <div class="container">
      <div class="nav-wrapper d-flex align-items-center">
        <!-- Gunakan link atau logo sebagai anchor -->
        <a href="index.php" class="brand-logo">
          <img src="img/logo/logo-murgung.png" alt="Logo" width="150" style="margin-top:5px;">
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="index.php">Home</a></li>
          <li><a href="service.php">Services</a></li>
          <li><a href="projects.php">Projects</a></li>
          <li><a href="aboutus.php">About Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
