    <!-- Navigation bar -->
    <div class="navbar">
        <div class="search-container">
            <a href="index.php?page=trangchu">Trang Chủ</a>
            <?php
                if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] == "chuoi")) {
                    echo '
                    <div class="dropdown">
                        <a href="#">Quản lý <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a href="index.php?page=qlnlchuoicuahang/xemchitiet">Quản lý nguyên liệu</a>
                            <a href="index.php?page=qlmonan/xemchitiet">Quản lý món ăn</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#">Thống kê <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a href="index.php?page=qlnlchuoicuahang/thongkenguyenlieu">Thống kê nguyên liệu</a>
                            <a href="index.php?page=qlmonan/xemchitiet">Thống kê doanh thu</a>
                        </div>
                    </div>';
                }
            ?>
            <input type="text" placeholder="Tìm kiếm..." class="search-bar">
            <span class="search-icon fas fa-search "></span>
        </div>
    </div>