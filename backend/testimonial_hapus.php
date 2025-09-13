<?php
include "../admin/includes/config.php";
if(isset($_GET['hapustestimonial']))
{
    $kodetestimoni = $_GET["hapustestimonial"];
    mysqli_query($conn, "DELETE FROM testimoni
    WHERE testi_ID = '$kodetestimoni'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
    document.location='inputtestimonial.php'</script>";
}
?>