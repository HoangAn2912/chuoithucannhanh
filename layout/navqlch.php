    <!-- Navigation bar -->
    <div class="navbar">
        <a href="index.php?page=trangchu">Trang Chủ</a>
        <div class="dropdown">
            <?php

                if (isset($_SESSION["dangnhap"])&& (($_SESSION["dangnhap"] === "qlch1"))){
                    echo '<a href="#">Quản lý <i class="fas fa-caret-down"></i></a>';

                }
            ?>
            <div class="dropdown-content">
            <?php
                if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] === "qlch1")) {
                    echo '<a href="index.php?page=QLNV">Quản lý Nhân Viên <i class="fas fa-user"></i></a>';
                    echo '<a href="index.php?page=qlnlcuahang">Quản lý nguyên liệu <i class="fas fa-warehouse"></i></a>';
                }
            ?>
            </div>
        </div>
       
        <?php
            if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] == "qlch1")) {
                echo '
                <div class="dropdown">
                    <a href="#">Nhân sự<i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="index.php?page=phancongcalam">Phân công ca làm</a>
                        <a href="index.php?page=ChamCong">Chấm công</a>
                        <a href="#">Xếp lịch</a>
                        <a href="#">Tính lương</a>
                    </div>
                  </div>';
            }
        ?>
       
        <div class="search-container">
            <input type="text" placeholder="Tìm kiếm..." class="search-bar">
            <span class="search-icon fas fa-search "></span>
        </div>
    </div>