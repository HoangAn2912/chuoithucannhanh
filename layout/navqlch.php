    <!-- Navigation bar -->
    <div class="navbar" style="">
        <div>
            <img src="layout/Screenshot_2024-10-21_225419-removebg-preview.png"  width="50" height="50" style="padding-right: 250px; "alt="">
        </div>
        <a href="index.php?page=trangchu">Trang Chủ</a>
            <?php

                if (isset($_SESSION["dangnhap"])){
                    echo '
                    <div class="dropdown">
                        <a href="#">Nhân sự<i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a href="index.php?page=phancongcalam">Phân công ca làm</a>
                            <a href="index.php?page=ChamCong">Chấm công</a>
                            
                        </div>
                    </div>';
                    echo 
                    '<div class="dropdown">
                    <a href="#">Quản lý <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a href="index.php?page=QLNV">Quản lý nhân viên <i class="fas fa-user"></i></a>
                            <a href="index.php?page=qlkh">Quản lý khách hàng <i class="fas fa-user"></i></a>
                            <a href="index.php?page=qlnlcuahang">Quản lý nguyên liệu <i class="fas fa-warehouse"></i></a>
                        </div>
                    </div>';
                }
            ?>
    </div>