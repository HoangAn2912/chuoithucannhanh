    <!-- Navigation bar -->
    <div class="navbar">
        <div>
        <a href="index.php?page=trangchu" class="header_logo"><img src="layout/Screenshot_2024-10-21_225419-removebg-preview.png"  width="50" height="50" style="padding-right: 250px; "alt=""></a>
        </div>
        <a href="index.php?page=trangchu">Trang chủ</a>
            <?php
                if (isset($_SESSION["dangnhap"])){
                    echo '<a href="index.php?page=tiepnhandonhang">Tiếp nhận đơn hàng</a>';
                    echo '<a href="index.php?page=bangiaodonhang">Bàn giao đơn hàng</a>';
                        echo '
                        <div class="dropdown">
                            <a href="#">Xem<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown-content">
                                <a href="index.php?page=xemlichlamviec">Xem lịch làm việc</a>
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

                    }
            ?>
    </div>

