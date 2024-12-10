<!-- Sidebar -->
<?php
    include_once ('controllers/cNguoiDung.php');
    $nguoidung = new cNguoiDung();
    if(isset($_SESSION['dangnhap'])){
        $taikhoan = $nguoidung->getNguoiDungByID($_SESSION["dangnhap"]);
        $role = $taikhoan[0]['mavaitro'];
        if($role == 4){
            require("layout/navnvb.php");
        }elseif($role == 3){
            require("layout/navnvbh.php");
        }elseif($role == 2){
            require("layout/navqlch.php");
        }elseif($role == 1){
            require("layout/navqlchuoi.php");
        }
    }
?>
<style>
    .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            padding: 50px;
            max-width: 1000px;
            margin: auto;
            justify-content: center;
            align-items: center;
        }
    .tile {
        background: orange;
        color: white;
        font-weight: bold;
        font-size: 20px;
        padding: 50px;
        width: 210px;
        border-radius: 10px; 
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease-in-out; /* Hiệu ứng khi hover */
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .tile:hover {
        background: #05b048;
        transform: translateY(-5px); /* Nhấc lên một chút */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Tăng đổ bóng */
        border: 2px solid white; /* Thêm viền khi hover */
    }

    .tile i {
        font-size: 100px;
        margin-bottom: 20px;
    }
</style>
    <div style="">
        <div class="grid">
            <?php
                include_once ('controllers/cNguoiDung.php');
                $nguoidung = new cNguoiDung();
                if(isset($_SESSION['dangnhap'])){
                    $taikhoan = $nguoidung->getNguoiDungByID($_SESSION["dangnhap"]);
                    $role = $taikhoan[0]['mavaitro'];
                    if($role == 1){
                        echo '<a href="index.php?page=qlnlchuoicuahang/thongkenguyenlieu" class="tile"><i class="fas fa-boxes"></i>Thống kê nguyên liệu</a>';
                        echo '<a href="index.php?page=qlnlchuoicuahang/xemchitiet" class="tile"><i class="fas fa-warehouse"></i>Quản lý nguyên liệu</a>';
                        echo '<a href="index.php?page=qlmonan/xemchitiet" class="tile"><i class="fas fa-chart-line"></i>Thống kê doanh thu</a>';
                        echo '<a href="index.php?page=qlmonan/xemchitiet" class="tile"><i class="fas fa-utensils"></i>Quản lý món ăn</a>';
                    } elseif($role == 2){
                        echo '<a href="index.php?page=qlnlcuahang" class="tile"><i class="fas fa-warehouse"></i>Quản lý nguyên liệu</a>';
                        echo '<a href="index.php?page=QLNV" class="tile"><i class="fas fa-user-cog"></i>Quản lý nhân viên</a>';
                        echo '<a href="index.php?page=qlkh" class="tile"><i class="fas fa-users"></i>Quản lý khách hàng</a>';
                        echo '<a href="index.php?page=ChamCong" class="tile"><i class="fas fa-clock"></i>Chấm công</a>';
                        echo '<a href="index.php?page=phancongcalam" class="tile"><i class="fas fa-tasks"></i>Phân công ca làm</a>';

                    } elseif($role == 3){
                        echo '<a href=\'index.php?page=nhanvien/xemluong\' class=\'tile\'><i class="fas fa-money-bill"></i>Xem lương</a>';
                        echo '<a href=\'index.php?page=xemlichlamviec\' class=\'tile\'><i class="fas fa-calendar"></i>Xem lịch làm việc</a>';
                        echo '<a href=\'index.php?page=nhanvien/dangkycalam\' class=\'tile\'><i class="fas fa-clipboard"></i>Đăng ký ca làm</a>';
                        echo '<a href=\'index.php?page=dexuatmonmoi\' class=\'tile\'><i class="fas fa-lightbulb"></i>Đề xuất món mới</a>';
                        echo '<a href=\'index.php?page=taodonhang\' class=\'tile\'><i class="fas fa-shopping-cart"></i>Tạo đơn hàng</a>';
                        echo '<a href=\'index.php?page=bantrong\' class=\'tile\'><i class="fas fa-chair"></i>Xem bàn trống</a>';
                        echo '<a href=\'index.php?page=nhanvien/quanlydonhang\' class=\'tile\'><i class="fas fa-box"></i>Quản lý đơn hàng</a>';
                        echo '<a href="index.php?page=qlkh" class="tile"><i class="fas fa-users"></i>Quản lý khách hàng</a>';
                    } elseif($role == 4){
                        echo '<a href=\'index.php?page=nhanvien/xemluong\' class=\'tile\'><i class="fas fa-money-bill"></i>Xem lương</a>';
                        echo '<a href=\'index.php?page=xemlichlamviec\' class=\'tile\'><i class="fas fa-calendar"></i>Xem lịch làm việc</a>';
                        echo '<a href=\'index.php?page=nhanvien/dangkycalam\' class=\'tile\'><i class="fas fa-clipboard"></i>Đăng ký ca làm</a>';
                        echo '<a href=\'index.php?page=dexuatmonmoi\' class=\'tile\'><i class="fas fa-lightbulb"></i>Đề xuất món mới</a>';
                        echo "<a href='index.php?page=bangiaodonhang' class='tile'><i class=\"fas fa-hands-helping\"></i>Bàn giao đơn hàng</a>";
                        echo "<a href='index.php?page=tiepnhandonhang' class='tile'><i class=\"fas fa-receipt\"></i>Tiếp nhận đơn hàng</a>";
                    }
                }
            ?>
        </div>
    </div>

</body>
</html>
