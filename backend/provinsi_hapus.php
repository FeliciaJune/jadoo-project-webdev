<?php
include "../admin/includes/config.php";
if(isset($_GET['hapusprovinsi']))
{
    $kodeprovinsi = $_GET["hapusprovinsi"];
    mysqli_query($conn, "DELETE FROM provinsi
    WHERE provinsi_ID = '$kodeprovinsi'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
    document.location='inputprovinsi.php'</script>";
}
?>