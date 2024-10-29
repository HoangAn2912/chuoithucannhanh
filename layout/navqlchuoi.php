    <!-- Navigation bar -->
    <div class="navbar">
        <a href="index.php?page=trangchu">Trang Chủ</a>
            <?php
                if (isset($_SESSION["dangnhap"])&& ($_SESSION["dangnhap"] === "chuoi")){
                    echo
                        '<div class="dropdown">
                            <a href="#">Quản lý <i class="fas fa-caret-down"></i></a>
                            <div class="dropdown-content">
                                <a href="index.php?page=qlnlchuoicuahang/xemchitiet">Quản lý nguyên liệu <i class="fas fa-warehouse"></i></a>
                                <a href="index.php?page=qlmonan/xemchitiet">Quản lý món ăn <i class="fas fa-warehouse"></i></a>
                            </div>
                        </div>';
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
        <div class="search-container">
            <input type="text" placeholder="Tìm kiếm..." class="search-bar">
            <span class="search-icon fas fa-search "></span>
        </div>
    </div>