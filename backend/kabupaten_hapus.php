<?php
include "../admin/includes/config.php";
if(isset($_GET['hapuskabupaten']))
{
    $kodekabupaten = $_GET["hapuskabupaten"];
    mysqli_query($conn, "DELETE FROM kabupaten
    WHERE kabupaten_ID = '$kodekabupaten'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
    document.location='inputkabupaten.php'</script>";
}
?>