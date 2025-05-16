<?php 
include 'header.php';
?>

<style>
  .custom-card {
    background-color: #6F826A; !important; /* Ungu gelap */
    color: white;
  }

  .card {
/* Border kuning */
  }

  .card-title {
    font-weight: bold;
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

<section id="services" class="services grey lighten-5 scrollspy" style="padding: 50px 0;">
  <div class="container">
    <div class="row">
      
      <!-- Konstruksi Sipil -->
      <div class="col m4 s12">
        <div class="card">
          <div class="card-image">
            <img src="img/konturksi.jpg" alt="Konstruksi Sipil">
          </div>
          <div class="card-content custom-card">
            <span class="card-title yellow-text text-lighten-1">KONSTRUKSI SIPIL</span>
            <p>Mengerjakan serta melakukan pengawasan dalam sebuah proyek pengerjaan konstruksi untuk menjadi sebuah bangunan yang baik dalam berbagai aspek.</p>
          </div>
        </div>
      </div>

      <!-- Arsitektur -->
      <div class="col m4 s12">
        <div class="card">
          <div class="card-image">
            <img src="img/arsitektur.jpg" alt="Arsitektur">
          </div>
          <div class="card-content custom-card">
            <span class="card-title yellow-text text-lighten-1">ARSITEKTUR</span>
            <p>Perencanaan dan Perancangan lingkungan yang akan dikerjakan mulai dari lingkup makro seperti kawasan dan perancangan kota, dll.</p>
          </div>
        </div>
      </div>

      <!-- Rekonstruksi Proyek -->
      <div class="col m4 s12">
        <div class="card">
          <div class="card-image">
            <img src="img/REKONTRUKSI.jpg" alt="Rekontruksi">
          </div>
          <div class="card-content custom-card">
            <span class="card-title yellow-text text-lighten-1">REKONTRUKSI PROYEK</span>
            <p>Bagian elektrikal yang kami kerjakan meliputi instalasi tegangan rendah sampai tegangan tinggi, secara spesifik meliputi juga pengerjaan panel listrik.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php 
include 'footer.php';
?>
