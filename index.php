<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Journal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark-subtle sticky-top">
        <div class="container">
          <a class="navbar-brand fw-bold" href="#">Daily Journal</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#hero">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#article">Article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#schedule">Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#profil">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <section id="hero" class="text-sm-start text-center p-5">
      <div class="d-sm-flex flex-sm-row align-items-center">
        <div>
          <h1 class="fw-bold display-4">If you have good habits, time becomes your ally.</h1>
          <h4 class="lead display-6">All you need is patience.</h4>
        </div>
        <img src="assets/heroimg.jpg" alt="" class="img-fluid p-5" width="500">
      </div>
    </section>
    
    <section id="article" class="text-center p-5 bg-dark text-light">
      


         <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="assets/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
	<div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->
    </section>

    <section id="profil">
      <div class="container-fluid bg-light pt-5 pb-5">
        <h1 class="text-center mb-5 mt-5">Profil Mahasiswa</h1>
        <div class="container d-flex justify-content-evenly">
          <div class="row row-cols-1 row-cols-md-2 g-4 mb-3"> 
          <div class="col">
          <div class="imgcont col-5 m-auto">
            <img src="assets/111.jpg" class="rounded-circle" style="border-radius: 15px; width: 170px;">
          </div>
        </div> 
        <div class="col">
          <div class="biocont">
            <h1 class="text-center text-md-start">M. Alauddin Nuurul Hudaa</h1>
          <table class="table bg-transparent">
            <tr>
              <td class="border-0"><b>NIM</b</td>
              
              <td class="border-0">:</td>
              <td class="border-0">A11.2023.14897</td>
            </tr>
            <tr>
              <td class="border-0"><b>Program Studi</b></td>
              
              <td class="border-0">:</td>
              <td class="border-0">Teknik Informatika</td>
            </tr>
            <tr>
              <td class="border-0"><b>Email</b></td>
              
              <td class="border-0">:</td>
              <td class="border-0">adinuzumaki25@gmail.com</td>
            </tr>
            <tr>
              <td class="border-0"><b>Telepon</b></td>
              
              <td class="border-0">:</td>
              <td class="border-0">085227570222</td>
            </tr>
            <tr>
              <td class="border-0"><b>Alamat</b></td>
              
              <td class="border-0">:</td>
              <td class="border-0">Ngesrep Barat V No. 3</td>
            </tr>
          </table>
        </div>
      </div>
          </div>
        </div>
      </div>
    </section>
    
    <section id="schedule">
      <div class="container pb-5">
        <h1 class="text-center mt-5 mb-5">Jadwal Kuliah & Kegiatan Mahasiswa</h1>

        <div class="row row-cols-1 row-cols-md-4 g-4 mb-3">
          <div class="col">
            <div class="card h-100 m-auto border-success" style="width: 100%;">
              <div class="card-header bg-success">
                <h5 class="text-center text-light">Senin</h5>
              </div>
              <div class="card-body">
                <h6 class="text-center">09.00 - 10.30</h6>
                <p class="text-center">Basis Data <br>Ruang H.3.4</p><br>
                <h6 class="text-center">13.00 - 15.00</h6>
                <p class="text-center">Dasar Pemrograman <br>Ruang H.3.1</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 m-auto border-danger" style="width: 100%;">
              <div class="card-header bg-danger">
                <h5 class="text-center text-light">Selasa</h5>
              </div>
              <div class="card-body">
                <h6 class="text-center">09.00 - 10.30</h6>
                <p class="text-center">Pemrograman Berbasis Web <br>Ruang H.3.4</p><br>
                <h6 class="text-center">13.00 - 15.00</h6>
                <p class="text-center">Dasar Pemrograman <br>Ruang H.3.1</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 m-auto border-warning" style="width: 100%;">
              <div class="card-header bg-warning">
                <h5 class="text-center text-light">Rabu</h5>
              </div>
              <div class="card-body">
                <h6 class="text-center">09.00 - 10.30</h6>
                <p class="text-center">Basis Data <br>Ruang H.3.4</p><br>
                <h6 class="text-center">13.00 - 15.00</h6>
                <p class="text-center">Dasar Pemrograman <br>Ruang H.3.1</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 m-auto border-primary" style="width: 100%;">
              <div class="card-header bg-primary">
                <h5 class="text-center text-light">Kamis</h5>
              </div>
              <div class="card-body">
                <h6 class="text-center">09.00 - 10.30</h6>
                <p class="text-center">Basis Data <br>Ruang H.3.4</p><br>
                <h6 class="text-center">13.00 - 15.00</h6>
                <p class="text-center">Dasar Pemrograman <br>Ruang H.3.1</p>
              </div>
            </div>
        </div>
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-5 justify-content-evenly">
          <div class="col">
            <div class="card h-100 m-auto border-info" style="width: 100%;">
              <div class="card-header bg-info">
                <h5 class="text-center text-light">Jumat</h5>
              </div>
              <div class="card-body">
                <h6 class="text-center">09.00 - 10.30</h6>
                <p class="text-center">Basis Data <br>Ruang H.3.4</p><br>
                <h6 class="text-center">13.00 - 15.00</h6>
                <p class="text-center">Dasar Pemrograman <br>Ruang H.3.1</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 m-auto border-dark" style="width: 100%;">
              <div class="card-header bg-dark">
                <h5 class="text-center text-light">Sabtu</h5>
              </div>
              <div class="card-body">
                <h6 class="text-center">09.00 - 10.30</h6>
                <p class="text-center">Basis Data <br>Ruang H.3.4</p><br>
                <h6 class="text-center">13.00 - 15.00</h6>
                <p class="text-center">Dasar Pemrograman <br>Ruang H.3.1</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 m-auto border-success" style="width: 100%;">
              <div class="card-header bg-success-subtle">
                <h5 class="text-center text-light">Minggu</h5>
              </div>
              <div class="card-body">
                <h6 class="text-center">09.00 - 10.30</h6>
                <p class="text-center">Basis Data <br>Ruang H.3.4</p><br>
                <h6 class="text-center">13.00 - 15.00</h6>
                <p class="text-center">Dasar Pemrograman <br>Ruang H.3.1</p>
              </div>
            </div>
        </div>
       
    </section>

    <?php
      $sql1 = "SELECT * FROM gallery";
      $hasil1 = $conn->query($sql1); 
    ?>
      <section id="gallery" class="bg-dark-subtle text-dark pb-5">
          <h1 class="text-center pb-5 pt-5">Gallery</h1>
          <div id="carouselExample" class="carousel slide" style="width: 95%; margin: auto;">
            <div class="carousel-inner">
              <?php
              
              $isActive = true;

              
              while ($row = mysqli_fetch_assoc($hasil1)) {
                  
                  $imagePath = $row['gambar'];
                  
                  
                  $activeClass = $isActive ? 'active' : '';
                  $isActive = false; 
              ?>
                <div class="carousel-item <?php echo $activeClass; ?>">
                  <img src="assets/<?php echo $imagePath; ?>" class="d-block w-100" alt="..." style="object-fit: cover; width: 100%; height: 500px;">
                </div>
              <?php } ?>
            </div>
            <!-- Tombol navigasi -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      </section>
    </div>
   
    <section class="footer">
    <footer class="text-center p-2">
      <div class="p-2">
        <a href="https://wa.me/6285227570222"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
        <a href="https://www.instagram.com/adin_nhd/"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
        <a href="https://www.linkedin.com/in/m-alauddin-nh/"><i class="bi bi-linkedin h2 p-2 text-dark"></i></a>
      </div>
      <div>
        <p align="center">M. Alauddin Nuurul Hudaa &copy; 2024</p>
      </div>
    </footer>
  </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>