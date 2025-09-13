<?php
include "../admin/includes/config.php";
if(isset($_GET['hapuspengalaman']))
{
    $kodepengalaman = $_GET["hapuspengalaman"];
    mysqli_query($conn, "DELETE FROM pengalaman
    WHERE pengalaman_ID = '$kodepengalaman'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
    document.location='inputpengalaman.php'</script>";
}
?>