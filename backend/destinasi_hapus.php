<?php
include "../admin/includes/config.php";
if(isset($_GET['hapusdestinasi']))
{
    $kodedestinasi = $_GET["hapusdestinasi"];
    mysqli_query($conn, "DELETE FROM destinasi
    WHERE destinasi_ID = '$kodedestinasi'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
    document.location='inputdestinasi.php'</script>";
}
?>