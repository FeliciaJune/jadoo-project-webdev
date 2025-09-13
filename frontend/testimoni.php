 <?php
if(!defined('aktif')) {
  die('Anda tidak bisa akses langsung file ini');
} else {
  // Memanggil koneksi ke MySQL
  include("C:/xampp\htdocs\a_WEBPHP/admin/includes/config.php");
  $query = mysqli_query($conn, "SELECT * FROM testimoni");
  // Mengambil data pertama untuk menampilkan judul
  $firstRow = mysqli_fetch_array($query); 
?>
<section id="testimonial">
  <?php if(mysqli_num_rows($query) > 0) { ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="mb-8 text-start">
            <h5 class="text-secondary">Testimonials</h5>
            <!-- Menampilkan testi_JUDUL dari data pertama -->
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize"><?php echo $firstRow["testi_JUDUL"]; ?></h3>
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
          <div class="pe-7 ps-5 ps-lg-0">
            <div class="carousel slide carousel-fade position-static" id="testimonialIndicator" data-bs-ride="carousel">
              <!-- Carousel Indicators -->
              <div class="carousel-indicators">
                <?php 
                $counter = 0;
                mysqli_data_seek($query, 0); 
                while ($row = mysqli_fetch_array($query)) { ?>
                  <button class="<?php echo $counter == 0 ? 'active' : ''; ?>" type="button" data-bs-target="#testimonialIndicator" data-bs-slide-to="<?php echo $counter; ?>" aria-current="true" aria-label="Testimonial <?php echo $counter; ?>"></button>
                <?php 
                  $counter++;
                } ?>
              </div>
              <!-- Carousel Items -->
              <div class="carousel-inner">
                <?php 
                $active = true;
                mysqli_data_seek($query, 0);
                while ($row = mysqli_fetch_array($query)) { ?>
                  <div class="carousel-item position-relative <?php echo $active ? 'active' : ''; ?>">
                    <div class="card shadow" style="border-radius:10px;">
                      <div class="position-absolute start-0 top-0 translate-middle"> 
                        <img class="rounded-circle fit-cover" src="assets/img/testimonial/<?php echo $row['testi_FOTO']; ?>" height="65" width="65" alt="Testimonial Picture" />
                      </div>
                      <div class="card-body p-4">
                        <p class="fw-medium mb-4">"<?php echo $row["testi_ISI"]; ?>"</p>
                        <h5 class="text-secondary"><?php echo $row["testi_NAMA"]; ?></h5>
                        <p class="fw-medium fs--1 mb-0"><?php echo $row["testi_KotaNeg"]; ?></p>
                      </div>
                    </div>
                    <div class="card shadow-sm position-absolute top-0 z-index--1 mb-3 w-100 h-100" style="border-radius:10px;transform:translate(25px, 25px)"> </div>
                  </div>
                <?php 
                  $active = false;
                } ?>
              </div>
              <!-- Carousel Navigation -->
              <div class="carousel-navigation d-flex flex-column flex-between-center position-absolute end-0 top-lg-50 bottom-0 translate-middle-y z-index-1 me-3 me-lg-0" style="height:60px;width:20px;">
                <button class="carousel-control-prev position-static" type="button" data-bs-target="#testimonialIndicator" data-bs-slide="prev">
                  <img src="assets/img/icons/up.svg" width="16" alt="icon" />
                </button>
                <button class="carousel-control-next position-static" type="button" data-bs-target="#testimonialIndicator" data-bs-slide="next">
                  <img src="assets/img/icons/down.svg" width="16" alt="icon" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End of container -->
  <?php } ?>
</section>
<?php } ?>
