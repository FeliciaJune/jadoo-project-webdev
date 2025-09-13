<?php
if(!defined('aktif')) {
    die('anda tidak bisa akses langsung file ini');
} else {
  // Memanggil koneksi ke MySQL
  include("C:/xampp/htdocs/a_WEBPHP/admin/includes/config.php");

  // Membatasi hasil query hanya untuk 3 item
  $query = mysqli_query($conn, "SELECT * FROM kabupaten, destinasi
  WHERE kabupaten.kabupaten_ID = destinasi.kabupaten_ID
  LIMIT 3");
?>

<section class="pt-5" id="destination">
  <div class="container">
    <div class="position-absolute start-100 bottom-0 translate-middle-x d-none d-xl-block ms-xl-n4">
      <img src="assets/img/dest/shape.svg" alt="destination" />
    </div>
    <div class="mb-7 text-center">
      <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Plan Your Trip Now</h3>
    </div>
    <div class="row">
      <?php if(mysqli_num_rows($query) > 0) { ?>
        <?php while($row = mysqli_fetch_array($query)) { ?>
          <div class="col-md-4 mb-4">
            <div class="card overflow-hidden shadow">
              <img class="card-img-top" src="../admin/images/<?php echo $row['kabupaten_FOTO']; ?>" alt="Tidak ada Foto" style="height: 275px; width: 100%;" />
              <div class="card-body py-4 px-3">
                <div class="isi">
                <p style="text-align: center;"><?php echo $row['kabupaten_NAMA']; ?></p>
                  <h4 style="text-align: center; margin-bottom: 20px;" class="text-secondary fw-medium" >
                    <a class="link-900 text-decoration-none stretched-link" href="#!"><?php echo $row['destinasi_NAMA']; ?></a>
                  </h4>
                </div>
                <div class="d-flex align-items-center">
                  <span class="fs-0 fw-medium"><?php echo $row['destinasi_TRIP']; ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } else { ?>
        <div class="col-12 text-center">
          <p class="text-muted">No destinations available.</p>
        </div>
      <?php } ?>
    </div>
  </div><!-- end of container-->
</section>
<?php } ?>
