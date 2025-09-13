<!DOCTYPE html>
<html>
    <?php
    ob_start();
	session_start();
	if(!isset($_SESSION['admin_USER']))
	header("location:login.php");
	?>
    <body class="sb-nav-fixed">
        <?php include "include/head.php";?>
        <?php include "include/menunav.php";?>
        <div id="layoutSidenav">
            <?php include "include/menu.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
    <?php
    /** Memanggil koneksi ke My SQL **/
    include("../admin/includes/config.php");
    /** menerima data yang akan diubah */
    $kodetestimoni = $_GET["ubahtestimonial"];
    $edit = mysqli_query($conn, "SELECT * FROM testimoni WHERE testi_ID = '$kodetestimoni'");
    $row_edit = mysqli_fetch_array($edit);
    /** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
    if (isset($_POST['ubah']))
    {
        $testiID = $_POST ['inputID'];
        $testiJUDUL = $_POST ['inputJUDUL'];
        $testiISI = $_POST ['inputISI'];
        $testiNAMA = $_POST ['inputNAMA'];
        $testiKotaNeg = $_POST ['inputKotaNeg'];

        $namafoto = $_FILES['fototestimoni']['name'];
        $file_tmp = $_FILES['fototestimoni']['tmp_name'];
        move_uploaded_file($file_tmp, '../frontend/assets/img/testimonial/'.$namafoto);

        if($namafoto == ""){
        mysqli_query($conn, "UPDATE testimoni SET testi_JUDUL='$testiJUDUL', testi_ISI='$testiISI', testi_NAMA='$testiNAMA', testi_KotaNeg='$testiKotaNeg'
        WHERE testi_ID='$testiID'");
        } else
        {
        mysqli_query($conn, "UPDATE testimoni SET testi_JUDUL='$testiJUDUL', testi_ISI='$testiISI', testi_NAMA='$testiNAMA', testi_KotaNeg='$testiKotaNeg',
        testi_FOTO='$namafoto' WHERE testi_ID='$testiID'");
        }
        header("location: inputtestimonial.php");
    }
    /** $query = mysqli_query ($conn, "select * from testimoni"); */
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <title></title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
        <div class="judul">    
        <h2 style="padding-left:40px;">Input Testimoni</h2>
        </div>
        <div class="judul2">    
        <small style="padding-left:40px;">Testimoni</small>
        </div>
        <!-- membuat form input data testimoni -->
         <form method="post"  enctype="multipart/form-data">
         <div class="row mb-3 mt-5">
            <label for="testiID" class="col-sm-2 col-form-label">ID Testimoni</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="testiID" name="inputID" value="<?php echo $row_edit["testi_ID"]?>" readonly>
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="testiJUDUL" class="col-sm-2 col-form-label">Judul Testimoni</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="testiJUDUL" name="inputJUDUL" value="<?php echo $row_edit["testi_JUDUL"]?>">
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="testiISI" class="col-sm-2 col-form-label">Isi Testimoni</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="testiISI" name="inputISI" value="<?php echo $row_edit["testi_ISI"]?>">
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="testiNAMA" class="col-sm-2 col-form-label">Nama Testimoni</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="testiNAMA" name="inputNAMA" value="<?php echo $row_edit["testi_NAMA"]?>">
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="testiKotaNeg" class="col-sm-2 col-form-label">Kota-Negara Testimoni</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="testiKotaNeg" name="inputKotaNeg" value="<?php echo $row_edit["testi_KotaNeg"]?>">
            </div>
         </div>

         <!-- input file !-->
         <div class="form-group row mb-3 mt-5">
            <label for="file" class="col-sm-2 col-form-label">Foto Testimoni</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="file" name="fototestimoni">
                <p class="help-block">Unggah Foto Testimoni</p>
            </div>
          </div> 
         <!-- end input file !-->

         <div class="form-group row">
         <div class="col-sm-2"></div>
         <div class="col-sm-10">
            <input type="submit" class="btn btn-success" value="Update" name="ubah">
            <input type="reset" class="btn btn-danger" value="Batal">
         </div>
         </div>
         </form> <br> <br>
         <div class="judul3">
            <h2 style="padding-left:40px;">Output Testimoni<h2>
         </div>

         <!-- form pencarian data !-->
         <form method="POST">
            <div class="form-group row mt-5">
                <label for="search" class="col-sm-2">Cari Judul Testimoni</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search"
                    value="<?php if(isset($_POST["search"]))
                    {echo $_POST["search"];}?>" placeholder="Cari Judul Testimoni">
                </div>
                 <input type="submit" name="kirim" value="cari" class="col-sm-1 btn btn-primary">
            </div> 
          </form>

          <!-- Tabel !-->
         <table class="table table-striped table-success table-hover mt-5">

            <!-- membuat judul !-->
            <tr class="info">
                <th>ID Testimoni</th>
                <th>Judul Testimoni</th>
                <th>Isi Testimoni</th>
                <th>Nama Testimoni</th>
                <th>Kota-Negara Testimoni</th>
                <th>Foto Testimoni</th>
                <th colspan="2">Aksi</th>
            </tr>
            <!-- menampilkan data dari tabel testimoni -->
            <?php {
            /** pencarian data */
            if(isset($_POST["kirim"]))
            {
            $search = $_POST["search"];
            $query = mysqli_query ($conn, "select * from testimoni
            WHERE testi_JUDUL like '%".$search."%'");
            }else
            {
            $query = mysqli_query ($conn, "select * from testimoni");
            } 
            /** pencarian data */
            ?>
            <?php while ($row = mysqli_fetch_array($query))
            { ?>
            <tr class="danger">
                <td><?php echo $row['testi_ID']; ?> </td>
                <td><?php echo $row['testi_JUDUL']; ?> </td>
                <td><?php echo $row['testi_ISI']; ?> </td>
                <td><?php echo $row['testi_NAMA']; ?> </td>
                <td><?php echo $row['testi_KotaNeg']; ?> </td>
                <td>
                    <?php if($row['testi_FOTO']==""){ echo "<img src='images/noimage.png'
                    width='88'/>";}else{?>
                    <img src="../frontend/assets/img/testimonial/<?php echo $row['testi_FOTO'] ?>" width="88" class="
                    img-responsive" />
                <?php }?>
                </td>
                <td>
                   <a href="testimonial_edit.php?ubahtestimonial=<?php echo $row["testi_ID"]?>" class="btn btn-success btn-sm" title="EDIT">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                   <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                   <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                   </svg>
                </td>
                <td>
                   <a href="testimonial_hapus.php?hapustestimonial=<?php echo $row["testi_ID"]?>" class="btn btn-danger btn-sm" title="HAPUS">
                   <i class="bi bi-trash"></i>
                </td>
            </tr>
            <?php } ?>
            <?php }?>
        </table>

        </div>
        <div class="col-1"></div>
        </div>
        </main>
        <?php include "include/footer.php";?>
            </div>
        </div>
        <?php include "include/jsscript.php";?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </body>
</html>