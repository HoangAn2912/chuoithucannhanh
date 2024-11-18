<?php
// Kiểm tra nếu dữ liệu đã được gửi qua POST
if (isset($_POST['madh']) && isset($_POST['mattdh'])) {
    // Lấy dữ liệu từ POST
    $madh = $_POST['madh'];
    $mattdh = $_POST['mattdh'];

    // Bao gồm file controller
    include_once("cTiepNhanDonHang.php");

    // Tạo đối tượng của controller
    $control = new controlDonHang();

    // Gọi hàm cUpdateTinhTrang từ controller
    $result = $control->cUpdateTinhTrang($madh, $mattdh);

    // Kiểm tra kết quả và trả về thông báo cho AJAX
    if ($result) {
        echo "Cập nhật tình trạng thành công!";
    } else {
        echo "Cập nhật tình trạng thất bại!";
    }
} else {
    echo "Dữ liệu không hợp lệ!";
}
?>
