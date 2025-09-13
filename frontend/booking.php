<?php
if (!defined('aktif')) {
    die('Anda tidak bisa akses langsung file ini');
} else {
    // Memanggil koneksi ke MySQL
    include("C:/xampp/htdocs/a_WEBPHP/admin/includes/config.php");

    // Query untuk mengambil 3 data destinasi
    $queryAll = mysqli_query($conn, "SELECT * FROM kategori, kabupaten, destinasi 
        WHERE kategori.kategori_ID = destinasi.kategori_ID 
        AND kabupaten.kabupaten_ID = destinasi.kabupaten_ID LIMIT 3");

    // Query untuk mengambil data baris pertama
    $queryFirst = mysqli_query($conn, "SELECT * FROM kategori, kabupaten, destinasi 
        WHERE kategori.kategori_ID = destinasi.kategori_ID 
        AND kabupaten.kabupaten_ID = destinasi.kabupaten_ID LIMIT 1");
    $rowFirst = mysqli_fetch_array($queryFirst);
?>
<section id="booking">
    <div class="container">
        <div class="row align-items-center">

            <!-- Menampilkan tiga destinasi -->
            <div class="col-lg-6">
                <div class="mb-4 text-start">
                    <h5 class="text-secondary">Recommendation</h5>
                    <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Here Some Destinations Info</h3>
                </div>

                <?php 
                if (mysqli_num_rows($queryAll) > 0) {
                    $i = 0; // Counter untuk membedakan ikon
                    while ($row = mysqli_fetch_array($queryAll)) {
                        $iconClasses = ['bg-primary', 'bg-danger', 'bg-info']; // Warna background untuk tiap flex
                        $icons = ['selection.svg', 'water-sport.svg', 'taxi.svg']; // Nama ikon
                ?>
                <div class="d-flex align-items-start mb-5">
                    <div class="<?php echo $iconClasses[$i % 3]; ?> me-sm-4 me-3 p-3" style="border-radius: 13px">
                        <img src="assets/img/steps/<?php echo $icons[$i % 3]; ?>" width="22" alt="steps" />
                    </div>
                    <div class="flex-1">
                        <h5 class="text-secondary fw-bold fs-0">
                            <?php echo $row["destinasi_ID"] . " - " . $row["destinasi_NAMA"]; ?>
                        </h5>
                        <p style="font-size: 15px; margin-bottom: 0;">
                            <?php echo $row["destinasi_ALAMAT"]; ?>
                        </p>
                        <small>
                            <?php echo $row["kategori_ID"] . " " . $row["kategori_NAMA"] . ": " . $row["kategori_KET"]; ?>
                        </small>
                        <p style="margin-top: 10px;">
                            <?php echo $row["destinasi_TRIP"]; ?>
                        </p>
                    </div>
                </div>
                <?php 
                        $i++; 
                    } // Akhir while loop
                } else {
                    echo "<p>No destinations available</p>";
                } 
                ?>
            </div>

            <!-- Card mengambil satu data dari data pertama -->
            <div class="col-lg-6 d-flex justify-content-center align-items-start">
                <div class="card position-relative shadow" style="max-width: 370px;">
                    <div class="position-absolute z-index--1 me-10 me-xxl-0" style="right:-160px;top:-210px;">
                        <img src="assets/img/steps/bg.png" style="max-width:550px;" alt="background shape" />
                    </div>
                    <div class="card-body p-3">
                        <img class="mb-4 mt-2 rounded-2 w-100" src="assets/img/dest/<?php echo $rowFirst["destinasi_FOTO"]; ?>" alt="featured destination" />
                        <div>
                            <h5 class="fw-medium"><?php echo $rowFirst["destinasi_NAMA"]; ?></h5>
                            <p class="fs--1 mb-3 fw-medium">
                                <?php echo $rowFirst["kabupaten_ID"] . " | " . $rowFirst["kabupaten_NAMA"] . " | " . $rowFirst["kabupaten_ALAMAT"]; ?>
                            </p>
                            <div class="icon-group mb-4">
                                <span class="btn icon-item">
                                    <img src="assets/img/steps/leaf.svg" alt="leaf icon" />
                                </span>
                                <span class="btn icon-item">
                                    <img src="assets/img/steps/map.svg" alt="map icon" />
                                </span>
                                <span class="btn icon-item">
                                    <img src="assets/img/steps/send.svg" alt="send icon" />
                                </span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mt-n1">
                                    <img class="me-3" src="assets/img/steps/building.svg" width="18" alt="building icon" />
                                    <span class="fs--1 fw-medium"><?php echo $rowFirst["destinasi_IDR"]; ?></span>
                                </div>
                                <button class="btn">
                                    <img src="assets/img/steps/heart.svg" width="20" alt="heart icon" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php } ?>
