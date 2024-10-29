<?php
// Kiểm tra nếu người dùng đã xác nhận đăng xuất
if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    session_start(); // Khởi động phiên làm việc
    session_destroy(); // Hủy phiên làm việc
    header('Location: index.php?page=dangnhap'); // Chuyển hướng đến trang đăng nhập
    exit();
}
?>
