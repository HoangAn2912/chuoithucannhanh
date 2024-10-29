    <!-- Navigation bar -->
    <div class="navbar">
        <a href="index.php?page=trangchu">Trang Chủ</a>
        <div class="dropdown">
            <?php
                if (isset($_SESSION["dangnhap"])){
                    echo '<a href="#">Đơn hàng<i class="fas fa-caret-down"></i></a>';
                }
            ?>
            <div class="dropdown-content">
                <?php
                    if((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] === "nvb")){
                        echo '<a href="index.php?page=tiepnhandonhang">Tiếp nhận đơn hàng <i class="fas fa-warehouse"></i></a>';
                    }
                ?>
            </div>
        </div>
        <?php
            if ((isset($_SESSION["dangnhap"])) && ($_SESSION["dangnhap"] == "nvb")) {
                echo '
                <div class="dropdown">
                    <a href="#">Đơn hàng<i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="index.php?page=tiepnhandonhang">Tiếp nhận đơn hàng</a>
                    </div>
                </div>';
                echo '<a href="index.php?page=nhanvien/dangkycalam">Đăng ký ca làm</a>';
            }
        ?>
        <div class="search-container">
            <input type="text" placeholder="Tìm kiếm..." class="search-bar">
            <span class="search-icon fas fa-search "></span>
        </div>
    </div>