<!-- Navigation bar -->
<div class="navbar" style="justify-content: center;">
    <div>
    <a href="index.php?page=trangchu" class="header_logo"><img src="layout/Screenshot_2024-10-21_225419-removebg-preview.png"  width="50" height="50" style="padding-right: 250px; "alt=""></a>
    </div>
    <a href="index.php?page=trangchu">Trang Chủ</a>
    <?php
    if (isset($_SESSION["dangnhap"])) {
        echo '
        <div class="dropdown">
            <a href="#">Quản lý <i class="fas fa-caret-down"></i></a>
            <div class="dropdown-content" style="color: white;">';
        
        // Chỉ hiển thị "Quản lý đơn hàng" cho nhân viên bán hàng (mavaitro = 3)
        if (isset($_SESSION["mavaitro"]) && $_SESSION["mavaitro"] == 3) {
            echo '<a href="index.php?page=nhanvien/quanlydonhang">Quản lý đơn hàng <i class="fas fa-list"></i></a>';
        }
        
        
        echo '<a href="index.php?page=qlkh">Quản lý khách hàng <i class="fas fa-warehouse"></i></a>';
        
        echo '</div>
        </div>';

        echo '
        <div class="dropdown">
            <a href="#">Xem <i class="fas fa-caret-down"></i></a>
            <div class="dropdown-content">
                <a href="index.php?page=xemlichlamviec">Xem lịch làm việc</a>
                <a href="index.php?page=bantrong">Xem bàn trống</a>
                <a href="index.php?page=nhanvien/xemluong">Xem lương</a>
            </div>
        </div>';

        echo '
        <div class="dropdown">
            <a href="#">Chức năng <i class="fas fa-caret-down"></i></a>
            <div class="dropdown-content">
                <a href="index.php?page=nhanvien/dangkycalam">Đăng ký ca làm</a>
                <a href="index.php?page=dexuatmonmoi">Đề xuất món mới</a>
            </div>
        </div>';

        echo ' <a href="index.php?page=taodonhang">Tạo đơn hàng</a>';
    }
    ?>
</div>
