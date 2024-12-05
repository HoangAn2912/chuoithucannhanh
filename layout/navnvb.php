    <!-- Navigation bar -->
    <div class="navbar">
        <a href="index.php?page=trangchu">Trang Chủ</a>
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
        <div class="search-container">
            <input type="text" placeholder="Tìm kiếm..." class="search-bar">
            <span class="search-icon fas fa-search "></span>
        </div>
    </div>

