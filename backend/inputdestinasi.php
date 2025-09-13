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
    /** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
    if (isset($_POST['Simpan']))
    {
        $destinasiID = $_POST ['inputID'];
        $kategoriID = $_POST ['kategoriID'];
        $kabupatenID = $_POST ['kabupatenID'];
        $destinasiNAMA = $_POST ['inputNAMA'];
        $destinasiALAMAT = $_POST ['inputALAMAT'];

        $namafoto = $_FILES['fotodestinasi']['name'];
        $file_tmp = $_FILES['fotodestinasi']['tmp_name'];
        move_uploaded_file($file_tmp, '../admin/images/'.$namafoto);

        $destinasiTRIP = $_POST ['inputTRIP'];
        $destinasiIDR = $_POST ['inputIDR'];

        mysqli_query($conn, "insert into destinasi values ('$destinasiID', '$kategoriID', '$kabupatenID', '$destinasiNAMA', '$destinasiALAMAT', '$namafoto', '$destinasiTRIP', '$destinasiIDR')");
        header("location: inputdestinasi.php");
    }
    /** $query = mysqli_query ($conn, "select * from destinasi,kecamatan */
    /** where destinasi.kecamatan_ID = kecamatan.kecamatan_ID"); */
    $datakategori = mysqli_query ($conn, "select * from kategori");
    $datakabupaten = mysqli_query ($conn, "select * from kabupaten");
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
        <h2 style="padding-left:40px;">Input Destinasi Wisata</h2>
        </div>
        <div class="judul2">    
        <small style="padding-left:40px;">Destinasi Wisata</small>
        </div>
        <!-- membuat form input data kategori -->
         <form method="post" enctype="multipart/form-data">
         <div class="row mb-3 mt-5">
            <label for="destinasiID" class="col-sm-2 col-form-label">Kode Destinasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="destinasiID" name="inputID" placeholder="Kode Destinasi">
            </div>
         </div>

        <!-- penggunaan select2 !-->
        <div class="row mb-3 mt-5">
            <label for="kategoriID" class="col-sm-2 col-form-label">Kode Kategori</label>
            <div class="col-sm-10">
                <select class="form-control" id="kategoriID" name="kategoriID">
                    <option>Kode Kategori</option>
                    <?php while($row = mysqli_fetch_array($datakategori))
                    { ?>
                    <option value="<?php echo $row["kategori_ID"]?>">
                    <?php echo $row["kategori_ID"]?>
                    <?php echo $row["kategori_NAMA"]?>
                    <?php echo $row["kategori_KET"]?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>
         <!-- end select2 !-->

        <!-- penggunaan select2 !-->
        <div class="row mb-3 mt-5">
            <label for="kabupatenID" class="col-sm-2 col-form-label">Kode Kabupaten</label>
            <div class="col-sm-10">
                <select class="form-control" id="kabupatenID" name="kabupatenID">
                    <option>Kode Kabupaten</option>
                    <?php while($row = mysqli_fetch_array($datakabupaten))
                    { ?>
                    <option value="<?php echo $row["kabupaten_ID"]?>">
                    <?php echo $row["kabupaten_ID"]?>
                    <?php echo $row["kabupaten_NAMA"]?>
                    <?php echo $row["kabupaten_ALAMAT"]?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>
         <!-- end select2 !-->

         <div class="row mb-3 mt-5">
            <label for="destinasiNAMA" class="col-sm-2 col-form-label">Nama Destinasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="destinasiNAMA" name="inputNAMA" placeholder="Nama Destinasi">
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="destinasiALAMAT" class="col-sm-2 col-form-label">Alamat Destinasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="destinasiALAMAT" name="inputALAMAT" placeholder="Alamat Destinasi">
            </div>
         </div>

         <!-- input file !-->
          <div class="form-group row mb-3 mt-5">
            <label for="file" class="col-sm-2 col-form-label">Foto Destinasi</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="file" name="fotodestinasi">
                <p class="help-block">Unggah Foto Destinasi</p>
            </div>
          </div> 
         <!-- end input file !-->

         <div class="row mb-3 mt-5">
            <label for="destinasiTRIP" class="col-sm-2 col-form-label">Trip Destinasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="destinasiTRIP" name="inputTRIP" placeholder="Trip Destinasi">
            </div>
         </div>

         <div class="row mb-3 mt-5">
            <label for="destinasiIDR" class="col-sm-2 col-form-label">Harga Destinasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="destinasiIDR" name="inputIDR" placeholder="Harga Destinasi">
            </div>
         </div>         

         <div class="form-group row">
         <div class="col-sm-2"></div>
         <div class="col-sm-10">
            <input type="submit" class="btn btn-success" value="Simpan" name="Simpan">
            <input type="reset" class="btn btn-danger" value="Batal">
         </div>
         </div>
         </form> <br> <br>
         <div class="judul3">
            <h2 style="padding-left:40px;">Output Destinasi Wisata<h2>
         </div>

        <!-- form pencarian data !-->
        <form method="POST">
            <div class="form-group row mt-5">
                <label for="search" class="col-sm-2">Cari Judul Destinasi</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search"
                    value="<?php if(isset($_POST["search"]))
                    {echo $_POST["search"];}?>" placeholder="Cari Judul Destinasi">
                </div>
                 <input type="submit" name="kirim" value="cari" class="col-sm-1 btn btn-primary">
            </div> 
        </form>

         <table class="table table-striped table-success table-hover mt-5">
            <!-- membuat judul !-->
            <tr class="info">
                <th>Kode</th>
                <th>Kode Kat</th>
                <th>Nama Kat</th>
                <th>Keterangan Kat</th>
                <th>Kode Kab</th>
                <th>Nama Kab</th>
                <th>Alamat Kab</th>
                <th>Nama Destinasi</th>
                <th>Alamat Destinasi</th>
                <th>Foto Destinasi</th>
                <th>Trip Destinasi</th>
                <th>Harga Destinasi</th>
                <th colspan="2">Aksi</th>
            </tr>
            <!-- menampilkan data dari tabel kategori -->
            <?php { 
            /** pencarian data */
            if(isset($_POST["kirim"]))
            {
              $search = $_POST["search"];
              $query = mysqli_query ($conn, "SELECT * FROM destinasi
              JOIN kategori ON destinasi.kategori_ID = kategori.kategori_ID
              JOIN kabupaten ON destinasi.kabupaten_ID = kabupaten.kabupaten_ID
              WHERE destinasi.destinasi_NAMA LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'");
            }else
            {
                $query = mysqli_query ($conn, "SELECT * FROM destinasi
                JOIN kategori ON destinasi.kategori_ID = kategori.kategori_ID
                JOIN kabupaten ON destinasi.kabupaten_ID = kabupaten.kabupaten_ID");
            } 
            /** pencarian data */ 
            ?>
            <?php while ($row = mysqli_fetch_array($query))
            { ?>
            <tr class="danger">
                <td><?php echo $row['destinasi_ID']; ?> </td>
                <td><?php echo $row['kategori_ID']; ?> </td>
                <td><?php echo $row['kategori_NAMA']; ?> </td>
                <td><?php echo $row['kategori_KET']; ?> </td>
                <td><?php echo $row['kabupaten_ID']; ?> </td>
                <td><?php echo $row['kabupaten_NAMA']; ?> </td>
                <td><?php echo $row['kabupaten_ALAMAT']; ?> </td>
                <td><?php echo $row['destinasi_NAMA']; ?> </td>
                <td><?php echo $row['destinasi_ALAMAT']; ?> </td>
                <td>
                    <?php if($row['destinasi_FOTO']==""){ echo "<img src='images/noimage.png'
                    width='88'/>";}else{?>
                    <img src="../admin/images/<?php echo $row['destinasi_FOTO'] ?>" width="88" class="
                    img-responsive" />
                <?php }?>
                </td>
                <td><?php echo $row['destinasi_TRIP']; ?> </td>
                <td><?php echo $row['destinasi_IDR']; ?> </td>
                <td>
                   <a href="destinasi_edit.php?ubahdestinasi=<?php echo $row["destinasi_ID"]?>" class="btn btn-success btn-sm" title="EDIT">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                   <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                   <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                   </svg>
                </td>
                <td>
                   <a href="destinasi_hapus.php?hapusdestinasi=<?php echo $row["destinasi_ID"]?>" class="btn btn-danger btn-sm" title="HAPUS">
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