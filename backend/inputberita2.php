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
        $beritaID = $_POST ['inputID'];
        $beritaJUDUL = $_POST ['inputJUDUL'];
        $beritaISI = $_POST ['inputISI'];
        $beritaSUMBER = $_POST ['inputSUMBER'];
        $kategoriKODE = $_POST ['kategoriID'];

        $namafoto = $_FILES['fotoberita']['name'];
        $file_tmp = $_FILES['fotoberita']['tmp_name'];
        $file_size = $_FILES['fotoberita']['size'];
        $max_size = 2*1024*1024;

        if ($_FILES['fotoberita']['error'] === 0) {
            if ($file_size > $max_size) {
                echo "<script>alert('Ukuran file melebihi batas maksimal, tidak bisa lebih dari 2MB.');</script>";
            } else {
                move_uploaded_file($file_tmp, '../admin/images/'.$namafoto);
    
                mysqli_query($conn, "insert into berita values ('$beritaID', '$beritaJUDUL', '$beritaISI', '$beritaSUMBER', '$kategoriKODE', '$namafoto')");
                header("location: inputberita2.php");
            }
        }
    }
   /** $query = mysqli_query ($conn, "select * from berita,kategori */
   /** where berita.kategori_ID = kategori.kategori_ID"); */
    $datakategori = mysqli_query ($conn, "select * from kategori");
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
        <h2 style="padding-left:40px;">Input Berita Wisata</h2>
        </div>
        <div class="judul2">    
        <small style="padding-left:40px;">Berita tentang destinasi di Jawa</small>
        </div>
        <!-- membuat form input data kategori -->
         <form method="post" enctype="multipart/form-data">
         <div class="row mb-3 mt-2">
            <label for="beritaID" class="col-sm-2 col-form-label">Kode Berita</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="beritaID" name="inputID" placeholder="Kode Berita Wisata">
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="beritaJUDUL" class="col-sm-2 col-form-label">Judul Berita Wisata</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="beritaJUDUL" name="inputJUDUL" placeholder="Judul Berita Wisata">
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="beritaISI" class="col-sm-2 col-form-label">Isi Berita Wisata</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="beritaISI" name="inputISI" placeholder="Isi Berita Wisata">
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="beritaSUMBER" class="col-sm-2 col-form-label">Sumber Berita</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="beritaSUMBER" name="inputSUMBER" placeholder="Sumber Berita Wisata">
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
                    </option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
         <!-- end select2 !-->

         <!-- input file !-->
          <div class="form-group row mb-3 mt-5">
            <label for="file" class="col-sm-2 col-form-label">Foto Berita</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="file" name="fotoberita">
                <p class="help-block">Unggah Foto Berita</p>
            </div>
          </div> 
         <!-- end input file !-->

         <div class="form-group row">
         <div class="col-sm-2"></div>
         <div class="col-sm-10">
            <input type="submit" class="btn btn-success" value="Simpan" name="Simpan">
            <input type="reset" class="btn btn-danger" value="Batal">
         </div>
         </div>
         </form> <br> <br>
         <div class="judul3">
            <h2 style="padding-left:40px;">Output Berita Wisata<h2>
         </div>

         <!-- form pencarian data !-->
          <form method="POST">
            <div class="form-group row mt-5">
                <label for="search" class="col-sm-2">Cari Judul Berita</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search"
                    value="<?php if(isset($_POST["search"]))
                    {echo $_POST["search"];}?>" placeholder="Cari Judul Berita">
                </div>
                 <input type="submit" name="kirim" value="cari" class="col-sm-1 btn btn-primary">
            </div> 
          </form>

         <!-- Tabel !-->
         <table class="table table-striped table-success table-hover mt-5">
            <!-- membuat judul !-->
            <tr class="info">
                <th>Kode</th>
                <th>Judul Berita</th>
                <th>Isi Berita</th>
                <th>Sumber Berita</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Foto Berita</th>
                <th colspan="2">Aksi</th>
            </tr>
            <!-- menampilkan data dari tabel kategori -->
            <?php { 
            /** pencarian data */
            if(isset($_POST["kirim"]))
            {
              $search = $_POST["search"];
              $query = mysqli_query ($conn, "select * from kategori, berita
              where kategori.kategori_ID = berita.kategori_ID and 
              berita_JUDUL like '%".$search."%'");
            }else
            {
              $query = mysqli_query ($conn, "select * from kategori, berita
              where kategori.kategori_ID = berita.kategori_ID");
            } 
            /** pencarian data */ 
            ?>
            <?php while ($row = mysqli_fetch_array($query))
            { ?>
            <tr class="danger">
                <td><?php echo $row['berita_ID']; ?> </td>
                <td><?php echo $row['berita_JUDUL']; ?> </td>
                <td><?php echo $row['berita_ISI']; ?> </td>
                <td><?php echo $row['berita_SUMBER']; ?> </td>
                <td><?php echo $row['kategori_ID']; ?> </td>
                <td><?php echo $row['kategori_NAMA']; ?> </td>
                <td>
                    <?php if($row['berita_FOTO']==""){ echo "<img src='images/noimage.png'
                    width='88'/>";}else{?>
                    <img src="../admin/images/<?php echo $row['berita_FOTO'] ?>" width="88" class="
                    img-responsive" />
                <?php }?>
                </td>
                <td>
                    <a href="berita_edit.php?ubahberita=<?php echo $row["berita_ID"]?>" class="btn btn-success btn-sm" title="EDIT">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                   <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                   <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                   </svg>
                </td>
                <td>
                   <a href="berita_hapus.php?hapusberita=<?php echo $row["berita_ID"]?>" class="btn btn-danger btn-sm" title="HAPUS">
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