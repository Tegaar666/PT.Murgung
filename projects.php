<?php 
include 'header.php';
?>

<style>
  .project-section {
    padding: 50px 0;
    
  }

  .filter-btn {
    margin: 0 5px 20px 5px;
    background-color: #6F826A !important;
  color: white !important;
  }

  .hide {
    display: none !important;
  }
  .card-image img {
  width: 100%;
  height: 200px; /* atau tinggi yang kamu inginkan */
  object-fit: cover; /* menjaga proporsi gambar sambil mengisi kotak */
}

</style>
<body>
  
<div class="parallax-container valign-wrapper">
  <div class="container">
    <div class="row center">
      <h3 class="header white-text">PROJECTS</h3>
    </div>
  </div>
  <div class="parallax">
    <img src="img/bg_gedung1.jpg" alt="Background Gedung">
  </div>
</div>

<section class="project-section">
 

    <!-- Filter Buttons -->
    <div class="center">
      <button class="btn filter-btn" data-filter="all">Semua</button>
      <button class="btn filter-btn" data-filter="bandara">Bandara</button>
      <button class="btn filter-btn" data-filter="gedung">Gedung</button>
      <button class="btn filter-btn" data-filter="jalan">Jalan</button>
      <button class="btn filter-btn" data-filter="jembatan">Jembatan</button>
    </div>

    <!-- Project Cards -->
    <div class="row">

      <!-- Card 1 -->
      <div class="col s12 m4 project-item jalan">
        <div class="card fixed-height">
          <div class="card-image">
            <img src="img/project/project-4.jpg">
          </div>
          <div class="card-content">
            <span class="project-title">Peningkatan Jalan Besikama - Webua</span>
            <p class="project-description">Kategori: Jalan</p>
          </div>
          <div class="card-action">
            <a href="#">Selengkapnya  »</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col s12 m4 project-item jalan">
        <div class="card fixed-height">
          <div class="card-image">
            <img src="img/project/project-5.jpeg">
          </div>
          <div class="card-content">
            <span class="project-title">Peningkatan Struktur Jalan Boking</span>
            <p class="project-description">Kategori: Jalan</p>
          </div>
          <div class="card-action">
            <a href="#">Selengkapnya »</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col s12 m4 project-item gedung">
        <div class="card fixed-height">
          <div class="card-image">
            <img src="img/project/project-6.jpg">
          </div>
          <div class="card-content">
            <span class="project-title">Pembangunan Gedung Serbaguna</span>
            <p class="project-description">Kategori: Gedung</p>
          </div>
          <div class="card-action">
            <a href="#">Selengkapnya »</a>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col s12 m4 project-item bandara">
        <div class="card fixed-height">
          <div class="card-image">
            <img src="img/project/project-7.jpg">
          </div>
          <div class="card-content">
            <span class="project-title">Perluasan Bandara El Tari</span>
            <p class="project-description">Kategori: Bandara</p>
          </div>
          <div class="card-action">
            <a href="#">Selengkapnya »</a>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col s12 m4 project-item jembatan">
        <div class="card fixed-height">
          <div class="card-image">
            <img src="img/project5.jpg">
          </div>
          <div class="card-content">
            <span class="project-title">Rekonstruksi Jembatan Kali Loa</span>
            <p class="project-description">Kategori: Jembatan</p>
          </div>
          <div class="card-action">
            <a href="#">Selengkapnya »</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


</body>
<script>
  const filterButtons = document.querySelectorAll('.filter-btn');
  const projects = document.querySelectorAll('.project-item');

  filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.getAttribute('data-filter');

      projects.forEach(project => {
        if (filter === 'all') {
          project.classList.remove('hide');
        } else {
          project.classList.toggle('hide', !project.classList.contains(filter));
        }
      });
    });
  });
</script>


<?php 
include 'footer.php';
?>
