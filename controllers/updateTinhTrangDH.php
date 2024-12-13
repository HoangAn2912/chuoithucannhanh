<?php

if (isset($_POST['madh']) && isset($_POST['mattdh'])) {
    $madh = $_POST['madh'];
    $mattdh = $_POST['mattdh'];

    include_once("cTiepNhanDonHang.php");

    $control = new controlDonHang();

    $result = $control->cUpdateTinhTrang($madh, $mattdh);

    if ($result) {
        echo "Cập nhật tình trạng thành công!";
    } else {
        echo "Cập nhật tình trạng thất bại!";
    }
} else {
    echo "Dữ liệu không hợp lệ!";
}
?>
