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
                    echo '<a href="index.php?page=tiepnhandonhang">Quản lý đơn hàng<i class="fas fa-warehouse"></i></a>';
                    echo '<a href="index.php?page=quanlykhachhang">Quản lý khách hàng<i class="fas fa-warehouse"></i></a>';
                   
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
                    </div>
                  </div>';
            }
        ?>
        <div class="search-container">
            <input type="text" placeholder="Tìm kiếm..." class="search-bar">
            <span class="search-icon fas fa-search "></span>
        </div>
    </div>