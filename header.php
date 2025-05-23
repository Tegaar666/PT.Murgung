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
  font-family: "PT Serif", serif;
  font-weight: 400;
  font-style: normal;
  background: linear-gradient(to bottom, #d0f0c0, #ffffff);
}

.top-bar a {
  margin-left: 10px;
}
.top-bar i {
  vertical-align: middle;
  margin-right: 5px;
}




</style>
<body id="home" class="scrollspy">

<!-- Top Bar -->
<div style="background-color:rgb(0, 0, 0); color: white; font-size: 14px; padding: 6px 0;">
  <div class="container">
    <div class="row" style="margin-bottom: 0;">
      <!-- Kontak kiri -->
      <div class="col s12 m6">
        <span><i class="fa fa-envelope"></i> murgungint@gmail.com </span>
        &nbsp;&nbsp;
        <span><i class="fa fa-phone"></i> +62 821 1600 0463</span>
      </div>

      <!-- Sosial Media kanan -->
      <div class="col s12 m6 right-align">
        <a href="https://www.facebook.com/61553585624739" class="white-text" style="margin: 0 6px;"><i class="fab fa-facebook-f"></i></a>
        <a href="" class="white-text" style="margin: 0 6px;"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/murgungindonesia/" class="white-text" style="margin: 0 6px;"><i class="fab fa-instagram"></i></a>
        <a href="https://maps.app.goo.gl/wGTpDHjoStNjDW7K8" class="white-text" style="margin: 0 6px;"><i class="fa-solid fa-location-dot"></i></a>
      </div>
    </div>
  </div>
</div>



  <!-- Navbar -->
  <nav style="background-color: #4a6c45; color:white">
    <div class="container">
      <div class="nav-wrapper d-flex align-items-center">
        <!-- Gunakan link atau logo sebagai anchor -->
        <a href="index.php" class="brand-logo">
          <img src="img/logo/logo-murgung.png" alt="Logo" width="150" style="margin-top:5px;">
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="index.php" class="white-text" style="font-size: 18px;">Home</a></li>
          <li><a href="service.php" class="white-text" style="font-size: 18px;">Services</a></li>
          <li><a href="projects.php" class="white-text" style="font-size: 18px;">Projects</a></li>
          <li><a href="aboutus.php" class="white-text" style="font-size: 18px;">About Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
