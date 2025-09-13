<?php
if (!defined('aktif')) {
  die('Anda tidak bisa akses langsung file ini');
} else {
  /** Memanggil koneksi ke MySQL **/
  include("C:/xampp/htdocs/a_WEBPHP/admin/includes/config.php");
  // Mengambil satu kategori secara acak
  $querykategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY RAND() LIMIT 1");
  $kategori = mysqli_fetch_assoc($querykategori);
  // Mengambil destinasi sesuai kategori yang dipilih (dengan LIMIT 4)
  $querydestinasi = mysqli_query($conn, "SELECT * FROM destinasi WHERE kategori_ID = '{$kategori['kategori_ID']}' LIMIT 4");
?>

<section class="pt-5 pt-md-9" id="service">
  <div class="container">
    <div class="position-absolute z-index--1 end-0 d-none d-lg-block">
      <img src="assets/img/category/shape.svg" style="max-width: 200px" alt="service" />
    </div>
    <!--Menampilkan kategori -->
    <div class="mb-7 text-center">
      <h5 class="text-secondary">CATEGORY</h5>
      <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize"><?php echo $kategori['kategori_NAMA']; ?></h3>
    </div>
    <!-- Menampilkan destinasi berdasarkan kategori -->
    <div class="row">
      <?php if (mysqli_num_rows($querydestinasi) > 0) {
        while ($destinasi = mysqli_fetch_assoc($querydestinasi)) { ?>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card service-card shadow-hover rounded-3 text-center align-items-center">
              <div class="card-body p-xxl-5 p-4">
                <img class="mb-4 mt-2 rounded-2 w-100" style="height: 120px; width: 100%;" src="assets/img/dest/<?php echo $destinasi['destinasi_FOTO']; ?>" alt="<?php echo $destinasi['destinasi_NAMA']; ?>" />
                <h4 class="mb-3"><?php echo $destinasi['destinasi_NAMA']; ?></h4>
                <p class="mb-0 fw-medium"><?php echo $destinasi['destinasi_ALAMAT']; ?></p>
                <p class="mt-3 text-secondary"><?php echo $destinasi['destinasi_TRIP']; ?></p>
              </div>
            </div>
          </div>
        <?php }
      } else { ?>
        <div class="col-12 text-center">
          <p class="text-muted">No destinations found for this category.</p>
        </div>
      <?php } ?>
    </div>
  </div><!-- end of container-->
</section>
<?php } ?>
