    <!-- Navigation bar -->
    <div class="navbar">
        <div>
            <img src="layout/Screenshot_2024-10-21_225419-removebg-preview.png"  width="50" height="50" style="padding-right: 250px; "alt="">
        </div>
        <div class="search-container">
            <a href="index.php?page=trangchu">Trang Chủ</a>
            <?php
                if (isset($_SESSION["dangnhap"])) {
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
            
        </div>
    </div>