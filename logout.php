<?php
session_start();
session_destroy();
echo'<script languange="javascript">
window.alert("Anda telah keluar dari Halaman Administrator")
document.location="index.php";
</script>';


?>