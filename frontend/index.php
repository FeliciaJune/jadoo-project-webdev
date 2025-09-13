<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php
  include("../admin/includes/config.php");
  // Mengambil data kategori
  $querykat = mysqli_query($conn, "SELECT * FROM kategori");
  $queryfelicia = mysqli_query ($conn, "select * from felicia");

?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Jadoo | Travel Agency Landing Page UI</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <link rel="stylesheet" href="assets/css/UAS.css">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <?php define('aktif', TRUE);?>
      <?php include("menu.php");?>
      <?php include("travel.php");?>

      <!-- ============================================-->
      <!-- <section> begin ============================-->

      <?php include("category.php");?>

      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      
      <?php include("topdestination.php");?>

      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->

      <?php include("booking.php");?>

      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      
      <?php include("testimoni.php");?>

      <!-- <section> close ============================-->
      <!-- ============================================-->

      <?php include("trip.php");?>
       

    <?php if(mysqli_num_rows($queryfelicia) > 0) { 
     while ($row = mysqli_fetch_array($queryfelicia)) { ?>
      <div style="margin-left: 428px;" class="Perkenalan">
        <div style="text-align: center; width:400px" class="column">
          <div class="fel">
              <img class="rounded-circle fit-cover" src="assets/img/testimonial/<?php echo $row['perkenalan_FOTO']; ?>" height="65" width="65" style="margin-bottom: 10px;">
              <div style="text-align: center; padding: 10px;" class="desc">
              <p><?php echo $row['Keterangan']; ?></p>
              <h4><?php echo $row['Yfelicia']; ?></h4>
              <p><?php echo $row['825230136felicia']; ?></p>
              </div>
          </div> <!-- testi -->
        </div> <!-- column -->
      </div> <!-- Perkenalan -->
      <?php } } ?>


      <div class="py-5 text-center">
        <p class="mb-0 text-secondary fs--1 fw-medium">All rights reserved@jadoo.com</p>
      </div>

       <!-- penutup -->  
       <div class="row-bawah">
          <div style="padding-left: 0px; padding-right: 0px;" class="container">
          <div style="margin-top: 43px; margin-left: 0px; margin-right: 100px;" class="column">
            <a href="#">Pesonajawa.com</a><br>
            <p>Wisata Jawa Mempesona</p>
            <a href="#">Pariwisata Solo</a><br>
            <a href="#">Download SLPP App</a><br>
          </div> <br> <!-- column -->
          <div style="margin-right: 90px;" class="column">
          <a href="#">Travel & Hotel Informations</a><br>
          <p style="color: white;"><?php echo $kategori['kategori_NAMA']; ?></p>
          </div> <!-- column -->
          <div style=" margin-right: 0px; padding-left: 50px;" class="column">
            <a href="#">Contact Us</a><br>
            <p>admin@pesonajawa.com</p>
          </div> <br> <!-- column -->
  
          </div> <!-- container row bawah-->
         </div> <!-- row bawah -->
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
  </body>

</html>