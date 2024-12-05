<?php
session_start(); // Khởi động phiên làm việc

// Kiểm tra nếu người dùng đã xác nhận đăng xuất
if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    session_destroy(); // Hủy phiên làm việc
    header('Location: index.php?page=dangnhap'); // Chuyển hướng đến trang đăng nhập
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Interface</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/DAY/day.css?v=1">
    <link rel="stylesheet" href="layout/style.css?v=3">
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="logo" style="margin-right: 10px"> 
            <?php
                include_once ('controllers/cNguoiDung.php');
                $nguoidung = new cNguoiDung();
                if (isset($_SESSION["dangnhap"])) {
                    $taikhoan = $nguoidung->getNguoiDungByID($_SESSION["dangnhap"]);
                    echo $taikhoan[0]['tennd'];
                }
            ?>        
        </div>
        <div class="user-icon" style="margin-right: 20px"> <i class="fas fa-user-circle"></i> </div>

        <?php
            if (isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"]) {
                // Hiển thị nút Đăng xuất với modal xác nhận
                echo '<a href="#" id="logoutButton" style="color: white; text-decoration: none; margin-right: 5px"> <i class="fas fa-sign-out-alt"></i> Đăng xuất</a>';
            } else {
                // Hiển thị nút Đăng ký / Đăng nhập nếu chưa đăng nhập
                echo '<a href="index.php?page=dangky" style="color: white; text-decoration: none; margin-right: 5px"> <i class="fas fa-user-plus"></i> Đăng ký</a>/';
                echo '<a href="index.php?page=dangnhap" style="color: white; text-decoration: none; margin-right: 5px"> <i class="fas fa-sign-in-alt"></i> Đăng nhập</a>';
            }
        ?>
    </div>

    <!-- Modal xác nhận -->
    <div id="logoutModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h4>Xác nhận đăng xuất</h4>
            <p>Bạn có chắc chắn muốn đăng xuất không?</p>
            <button onclick="confirmLogout()">Có</button>
            <button onclick="closeModal()">Không</button>
        </div>
    </div>

    <script>
        const logoutButton = document.getElementById('logoutButton');
        const logoutModal = document.getElementById('logoutModal');

        // Hiển thị modal xác nhận khi nhấn Đăng xuất
        if (logoutButton) {
            logoutButton.onclick = function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định
                logoutModal.style.display = 'block';
            };
        }

        function closeModal() {
            logoutModal.style.display = 'none';
        }

        function confirmLogout() {
            window.location.href = 'index.php?page=dangxuat&confirm=yes'; // Thêm confirm=yes để xác nhận đăng xuất
        }

        window.onclick = function(event) {
            if (event.target === logoutModal) {
                closeModal();
            }
        }
    </script>

</body>
</html>
