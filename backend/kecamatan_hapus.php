<?php
include "../admin/includes/config.php";
if(isset($_GET['hapuskecamatan']))
{
    $kodekecamatan = $_GET["hapuskecamatan"];
    mysqli_query($conn, "DELETE FROM kecamatan
    WHERE kecamatan_ID = '$kodekecamatan'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
    document.location='inputkecamatan.php'</script>";
}
?>