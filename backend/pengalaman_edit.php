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
    $kodepengalaman = $_GET["ubahpengalaman"];
    $edit = mysqli_query($conn, "SELECT * FROM pengalaman WHERE pengalaman_ID = '$kodepengalaman'");
    $row_edit = mysqli_fetch_array($edit);
    /** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
    if (isset($_POST['ubah']))
    {
        $pengalamanID = $_POST ['inputID'];
        $pengalamanJUDUL = $_POST ['inputJUDUL'];
        $pengalamanSUB = $_POST ['inputSUB'];
        $pengalamanKET = $_POST ['inputKET'];
        $pengalamanVID = $_POST ['inputVID'];

        $namafoto = $_FILES['fotopengalaman']['name'];
        $file_tmp = $_FILES['fotopengalaman']['tmp_name'];
        move_uploaded_file($file_tmp, '../frontend/assets/img/hero/'.$namafoto);

        if($namafoto == ""){
        mysqli_query($conn, "UPDATE pengalaman SET pengalaman_JUDUL='$pengalamanJUDUL', pengalaman_SUB='$pengalamanSUB', pengalaman_KET='$pengalamanKET', pengalaman_VID='$pengalamanVID'
        WHERE pengalaman_ID='$pengalamanID'");
        } else
        {
        mysqli_query($conn, "UPDATE pengalaman SET pengalaman_JUDUL='$pengalamanJUDUL', pengalaman_SUB='$pengalamanSUB', pengalaman_KET='$pengalamanKET', pengalaman_VID='$pengalamanVID',
        pengalaman_FOTO='$namafoto' WHERE  pengalaman_ID='$pengalamanID'");
        }
        header("location: inputpengalaman.php");
    }
    /** $query = mysqli_query ($conn, "select * from pengalaman"); */
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
        <h2 style="padding-left:40px;">Input Pengalaman</h2>
        </div>
        <div class="judul2">    
        <small style="padding-left:40px;">Pengalaman</small>
        </div>
        <!-- membuat form input data pengalaman -->
         <form method="post"  enctype="multipart/form-data">
         <div class="row mb-3 mt-5">
            <label for="pengalamanID" class="col-sm-2 col-form-label">ID Pengalaman</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pengalamanID" name="inputID" value="<?php echo $row_edit["pengalaman_ID"]?>" readonly>
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="pengalamanJUDUL" class="col-sm-2 col-form-label">Judul Pengalaman</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pengalamanJUDUL" name="inputJUDUL" value="<?php echo $row_edit["pengalaman_JUDUL"]?>">
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="pengalamanSUB" class="col-sm-2 col-form-label">Sub Judul Pengalaman</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pengalamanSUB" name="inputSUB" value="<?php echo $row_edit["pengalaman_SUB"]?>">
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="pengalamanKET" class="col-sm-2 col-form-label">Keterangan Pengalaman</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pengalamanKET" name="inputKET" value="<?php echo $row_edit["pengalaman_KET"]?>">
            </div>
         </div>
         <div class="row mb-3 mt-5">
            <label for="pengalamanVID" class="col-sm-2 col-form-label">Link Vid Pengalaman</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pengalamanVID" name="inputVID" value="<?php echo $row_edit["pengalaman_VID"]?>">
            </div>
         </div>

         <!-- input file !-->
         <div class="form-group row mb-3 mt-5">
            <label for="file" class="col-sm-2 col-form-label">Foto Pengalaman</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="file" name="fotopengalaman">
                <p class="help-block">Unggah Foto Pengalaman</p>
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
            <h2 style="padding-left:40px;">Output Pengalaman<h2>
         </div>

         <!-- form pencarian data !-->
         <form method="POST">
            <div class="form-group row mt-5">
                <label for="search" class="col-sm-2">Cari Judul Pengalaman</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search"
                    value="<?php if(isset($_POST["search"]))
                    {echo $_POST["search"];}?>" placeholder="Cari Judul Pengalaman">
                </div>
                 <input type="submit" name="kirim" value="cari" class="col-sm-1 btn btn-primary">
            </div> 
         </form>

         <!-- Tabel !-->
         <table class="table table-striped table-success table-hover mt-5">
            <!-- membuat judul !-->
            <tr class="info">
                <th>ID Pengalaman</th>
                <th>Judul Pengalaman</th>
                <th>Sub Judul Pengalaman</th>
                <th>Keterangan Pengalaman</th>
                <th>Link Vid Pengalaman</th>
                <th>Foto Pengalaman</th>
                <th colspan="2">Aksi</th>
            </tr>
            <!-- menampilkan data dari tabel pengalaman -->
            <?php {
            /** pencarian data */
            if(isset($_POST["kirim"]))
            {
              $search = $_POST["search"];
              $query = mysqli_query ($conn, "select * from pengalaman
              WHERE pengalaman_JUDUL like '%".$search."%'");
            }else
            {
              $query = mysqli_query ($conn, "select * from pengalaman");
            } 
            /** pencarian data */              
            ?>
            <?php while ($row = mysqli_fetch_array($query))
            { ?>
            <tr class="danger">
                <td><?php echo $row['pengalaman_ID']; ?> </td>
                <td><?php echo $row['pengalaman_JUDUL']; ?> </td>
                <td><?php echo $row['pengalaman_SUB']; ?> </td>
                <td><?php echo $row['pengalaman_KET']; ?> </td>
                <td><?php echo $row['pengalaman_VID']; ?> </td>
                <td>
                    <?php if($row['pengalaman_FOTO']==""){ echo "<img src='images/noimage.png'
                    width='88'/>";}else{?>
                    <img src="../frontend/assets/img/hero/<?php echo $row['pengalaman_FOTO'] ?>" width="88" class="
                    img-responsive" />
                <?php }?>
                </td>
                <td>
                   <a href="pengalaman_edit.php?ubahpengalaman=<?php echo $row["pengalaman_ID"]?>" class="btn btn-success btn-sm" title="EDIT">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                   <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                   <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                   </svg>
                </td>
                <td>
                   <a href="pengalaman_hapus.php?hapuspengalaman=<?php echo $row["pengalaman_ID"]?>" class="btn btn-danger btn-sm" title="HAPUS">
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