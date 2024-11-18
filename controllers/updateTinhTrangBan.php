
<?php
// updateTinhTrangDH.php
include_once("cXemBanTrong.php");

if (isset($_POST['maban']) && isset($_POST['trangthai'])) {
    $maban = $_POST['maban'];
    $trangthai = $_POST['trangthai'];

    // Kiểm tra lại giá trị nhận được từ form
    error_log("maban: $maban, trangthai: $trangthai");

    $control = new controlBan();
    
    // Cập nhật trạng thái bàn
    $success = $control->updateTrangThaiBan($maban, $trangthai);

    if ($success) {
        // Sau khi cập nhật thành công, chuyển hướng về bàn trống
        header("Location: ../index.php?page=bantrong"); 
        exit();
    } else {
        echo "Có lỗi xảy ra khi cập nhật trạng thái bàn.";
    }
} else {
    echo "Dữ liệu không hợp lệ!";
}

?>