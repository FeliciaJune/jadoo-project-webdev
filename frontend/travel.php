<?php
if(!defined('aktif')) {
  die('anda tidak bisa akses langsung file ini');
} else {
  /** Memanggil koneksi ke MySQL **/
  include("C:/xampp\htdocs\a_WEBPHP/admin/includes/config.php");
  // Menambahkan LIMIT 1 agar hanya satu data yang diambil
  $query = mysqli_query($conn, "SELECT * FROM pengalaman LIMIT 1");
?>

<section style="padding-top: 7rem;">
  <div class="bg-holder" style="background-image:url(assets/img/hero/hero-bg.svg);"></div>
  <!-- bg-holder -->
  <?php if(mysqli_num_rows($query) > 0) { 
    $row = mysqli_fetch_array($query); // ambil hanya satu baris data
  ?>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end">
        <img class="pt-7 pt-md-0 hero-img" src="assets/img/hero/<?php echo $row['pengalaman_FOTO']; ?>" alt="hero-header" />
      </div>
      <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
        <h4 class="fw-bold text-danger mb-3"><?php echo $row["pengalaman_JUDUL"]; ?></h4>
        <h1 class="hero-title"><?php echo $row["pengalaman_SUB"]; ?></h1>
        <p class="mb-4 fw-medium"><?php echo $row["pengalaman_KET"]; ?></p>
        <div class="text-center text-md-start">
          <a class="btn btn-primary btn-lg me-md-4 mb-3 mb-md-0 border-0 primary-btn-shadow" href="#!" role="button">Find out more</a>
          <div class="w-100 d-block d-md-none"></div>
          <a href="#!" role="button" data-bs-toggle="modal" data-bs-target="#popupVideo">
            <span class="btn btn-danger round-btn-lg rounded-circle me-3 danger-btn-shadow">
              <img src="assets/img/hero/play.svg" width="15" alt="play"/>
            </span>
          </a>
          <span class="fw-medium">Play Demo</span>
          <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <iframe class="rounded" style="width:100%;max-height:500px;" height="500px" src="https://www.youtube.com/embed/<?php echo $row['pengalaman_VID']; ?>" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</section>
<?php } ?>
