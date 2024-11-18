<?php
// Kiểm tra nếu có dữ liệu POST
if (isset($_POST['maban']) && isset($_POST['trangthai'])) {
    $maban = $_POST['maban'];
    $trangthai = $_POST['trangthai'];

    // Debug log: In ra để kiểm tra
    error_log("Mã bàn: " . $maban . ", Trạng thái: " . $trangthai);
    
    // Kết nối và gọi modelBan
    include_once("models/mXemBanTrong.php");
    $model = new modelBan();  // Khởi tạo đối tượng modelBan

    // Cập nhật trạng thái bàn
    $success = $model->updateTrangThaiBan($maban, $trangthai);

    if ($success) {
        echo "success";  // Trả về thông báo thành công
    } else {
        echo "error";  // Trả về thông báo lỗi
    }
} else {
    echo "error";  // Nếu không có dữ liệu cần thiết
}

?>
