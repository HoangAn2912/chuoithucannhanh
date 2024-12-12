<?php
// Kiểm tra
if (isset($_POST['madh']) && isset($_POST['mattdh'])) {
    // Lấy
    $madh = $_POST['madh'];
    $mattdh = $_POST['mattdh'];

    include_once("cTiepNhanDonHang1.php");

    $control = new controlDonHang();

    $result = $control->cUpdateTinhTrang($madh, $mattdh);

   
 }
?>
