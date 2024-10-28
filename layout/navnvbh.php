    <!-- Navigation bar -->
    <div class="navbar" style="justify-content: center;">
        <a href="index.php?page=trangchu">Trang Chủ</a>
        <div class="dropdown">
            <?php
                if (isset($_SESSION["dangnhap"])){
                    echo '<a href="#">Quản lý<i class="fas fa-caret-down"></i></a>';
                }
            ?>
            <div class="dropdown-content" style="color: white;">
            <?php
                if((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] === "nvbh")){
                    echo '<a href="index.php?page=qlkh">Quản lý khách hàng<i class="fas fa-warehouse"></i></a>';
                   
                }
            ?>
            </div>
        </div>
        <?php
            if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] == "nvbh")) {
                echo '
                <div class="dropdown">
                    <a href="#">Xem<i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="index.php?page=bantrong">Xem bàn trống</a>
                        <a href="index.php?page=xemlichlamviec">Xem lịch làm việc</a>
                    </div>
                  </div>';
            }
        ?>
<<<<<<< HEAD
        <?php
            if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] == "nvbh")) {
                echo '
                <div class="dropdown">
                    <a href="#">Chức năng<i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="index.php?page=dexuatmonmoi">Đề xuất món mới</a>
                    </div>
                  </div>';
            }
        ?>
=======
>>>>>>> 4d5883349d575eccfdbe9394f4f9b2a8fc49a16f
        <div class="search-container">
            <input type="text" placeholder="Tìm kiếm..." class="search-bar">
            <span class="search-icon fas fa-search "></span>
        </div>
    </div>