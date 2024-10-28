    <!-- Navigation bar -->
    <div class="navbar">
        <a href="index.php?page=trangchu">Trang Chủ</a>
        <div class="dropdown">
            <?php

                if (isset($_SESSION["dangnhap"])&& (($_SESSION["dangnhap"] === "qlch1")|| ($_SESSION["dangnhap"] === "chuoi"))){
                    echo '<a href="#">Quản lý <i class="fas fa-caret-down"></i></a>';

                }
            ?>
            <div class="dropdown-content">
            <?php
                if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] === "qlch1")) {
                    echo '<a href="index.php?page=QLNV">Quản lý Nhân Viên <i class="fas fa-user"></i></a>';
                    echo '<a href="index.php?page=qlnlcuahang">Quản lý nguyên liệu <i class="fas fa-warehouse"></i></a>';
                }elseif((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] === "chuoi")){
                    echo '<a href="index.php?page=qlnlchuoicuahang/xemchitiet">Quản lý nguyên liệu <i class="fas fa-warehouse"></i></a>';
                    echo '<a href="index.php?page=qlmonan/xemchitiet">Quản lý món ăn <i class="fas fa-warehouse"></i></a>';
                }
            ?>
            </div>
        </div>
        <?php
            if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] == "chuoi")){
                echo 
                '<div class="dropdown">
                    <a href="#">Thống kê <i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="#">Thống kê doanh thu <i class="fas fa-chart-line"></i></a>
                        <a href="index.php?page=qlnlchuoicuahang/thongkenguyenlieu">Thống kê nguyên liệu <i class="fas fa-seedling"></i>
                    </div>
                </div>';
            }
        ?>
        <?php
            if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] == "qlch1")) {
                echo '
                <div class="dropdown">
                    <a href="#">Nhân sự <i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="index.php?page=ChamCong">Chấm công </a>
                        <a href="#">Xếp lịch</a>
                        <a href="#">Tính lương</a>
                    </div>
                  </div>';
            }
        ?>
        <?php
            if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] == "nvbh")) {
                echo '<a href="#">Quản lý đơn hàng</a>';
                echo '<a href="#">Xem lương</a>';
                echo '<a href="#">Đăng ký ca làm</a>';
            }
            if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] == "nvb")){
                echo '<a href="#">Quản lý đơn hàng</a>';
                echo '<a href="#">Xem lương</a>';
                echo '<a href="#">Đăng ký ca làm</a>';
            }
        ?>
        <div class="search-container">
            <input type="text" placeholder="Tìm kiếm..." class="search-bar">
            <span class="search-icon fas fa-search "></span>
        </div>
    </div>