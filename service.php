<?php 
include 'header.php';
?>

<style>
.custom-card {
  background-color: #6F826A !important;
  color: white;
}

.card-title {
  font-weight: bold;
}

.card {
  flex: 1;
}

</style>

<body>

<!-- Jumbotron-style Section -->
<div class="parallax-container valign-wrapper">
  <div class="container">
    <div class="row center">
      <h3 class="header white-text">Service</h3>
    </div>
  </div>
  <div class="parallax">
    <img src="img/bg_gedung1.jpg" alt="Background Gedung">
  </div>
</div>

<section id="services" class="services scrollspy" style="padding: 50px 0;">
  <div class="container">

    <!-- Baris Pertama -->
    <div class="row">
      <!-- General Contractor -->
      <div class="col m6 s12">
        <div class="card">
          <div class="card-image">
            <img src="img/general-contactor.jpg" alt="General Contractor">
          </div>
          <div class="card-content custom-card">
            <span class="card-title yellow-text text-lighten-1">General Contractor</span>
            <p>Mengerjakan serta melakukan pengawasan dalam proyek konstruksi untuk menghasilkan bangunan yang kokoh dan sesuai standar.</p>
          </div>
        </div>
      </div>

      <!-- Arsitektur -->
      <div class="col m6 s12">
        <div class="card">
          <div class="card-image">
            <img src="img/arsitektur.jpg" alt="Civil">
          </div>
          <div class="card-content custom-card">
            <span class="card-title yellow-text text-lighten-1">Civil</span>
            <p>Pekerjaan konstruksi sipil yang mencakup pembangunan jalan, jembatan, drainase, struktur beton, dan infrastruktur lainnya dengan standar kualitas tinggi.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Baris Kedua -->
    <div class="row">
      <!-- Rekonstruksi Proyek -->
      <div class="col m6 s12">
        <div class="card">
          <div class="card-image">
            <img src="img/almunium.webp" alt="Aluminium Applicator">
          </div>
          <div class="card-content custom-card">
            <span class="card-title yellow-text text-lighten-1">Aluminium Applicator</span>
            <p>menghadirkan layanan pemasangan dan finishing aluminium berkualitas untuk berbagai kebutuhan bangunan.</p>
          </div>
        </div>
      </div>

      <!-- Instalasi Elektrikal -->
      <div class="col m6 s12">
        <div class="card">
          <div class="card-image">
            <img src="img/supplier.webp" alt="Supplier">
          </div>
          <div class="card-content custom-card">
            <span class="card-title yellow-text text-lighten-1">Supplier</span>
            <p>menyediakan berbagai material dan perlengkapan konstruksi berkualitas tinggi untuk mendukung kelancaran proyek pembangunan</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>




<?php 
include 'footer.php';
?>
