<?php
include "../admin/includes/config.php";
if(isset($_GET['hapusberita']))
{
    $kodeberita = $_GET["hapusberita"];
    mysqli_query($conn, "DELETE FROM berita
    WHERE berita_ID = '$kodeberita'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
    document.location='inputberita2.php'</script>";
}
?>