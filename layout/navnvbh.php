<!-- Navigation bar -->
    <div class="navbar" style="justify-content: center;">
        <a href="index.php?page=trangchu">Trang Chủ</a>
            <?php
                if (isset($_SESSION["dangnhap"])){
                    echo 
                    '<div class="dropdown">
                        <a href="#">Quản lý <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="color: white;">
                            <a href="index.php?page=qlkh">Quản lý khách hàng <i class="fas fa-warehouse"></i></a>
                            <a href="index.php?page=nhanvien/quanlydonhang">Quản lý đơn hàng <i class="fas fa-warehouse"></i></a>
                        </div>
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
                            <a href="index.php?page=taodonhang">Tạo đơn hàng</a>
                        </div>
                    </div>';

                }
            ?>
        <div class="search-container">
            <input type="text" placeholder="Tìm kiếm..." class="search-bar">
            <span class="search-icon fas fa-search "></span>
        </div>
    </div>

<!-- + Quản lý đơn hàng (đặt hàng, thanh toán, hủy đơn hàng) a
+ Quản lý khách hàng (xem, cập nhật thông tin khách hàng) 
+ Xem số bàn trống
+ Đăng ký ca làm việc 
+ Xem lịch làm việc 
+ Đề xuất món mới
+ Thanh toán
+ Đặt món
+ Xem lương 
+ Đăng nhập, đăng xuất  -->
