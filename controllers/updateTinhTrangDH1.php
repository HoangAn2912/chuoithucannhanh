<?php
// Kiểm tra nếu dữ liệu đã được gửi qua POST
if (isset($_POST['madh']) && isset($_POST['mattdh'])) {
    // Lấy dữ liệu từ POST
    $madh = $_POST['madh'];
    $mattdh = $_POST['mattdh'];

    // Bao gồm file controller
    include_once("cTiepNhanDonHang1.php");

    // Tạo đối tượng của controller
    $control = new controlDonHang();

    // Gọi hàm cUpdateTinhTrang từ controller
    $result = $control->cUpdateTinhTrang($madh, $mattdh);

   
 }
?>
