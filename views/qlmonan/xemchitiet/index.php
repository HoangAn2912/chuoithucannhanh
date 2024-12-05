<?php
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
echo '<link rel="stylesheet" href="css/QLMA/qlma.css">';
echo require("layout/navqlchuoi.php");
include_once("controllers/cKhoNguyenLieu.php");
include_once("controllers/cNguyenLieu.php");
include_once("controllers/cMonAn.php");
include_once("controllers/cCuaHang.php");

// Khởi tạo đối tượng
$monan = new cMonAn();
$cuaHang = new cCuaHang();

// Kiểm tra nút btn-detail
if (isset($_POST["btn-detail"])) {
    $maMonAn = $_POST["btn-detail"];
    $list = $monan->getMonAnByMaMonAn($maMonAn);
    if (!empty($list)) {
        $ch = $cuaHang->getCuaHangByMaCH($list[0]['mach']);
    }
}
?>
<?php
    if(isset($_POST["update"])){
        header("Location:index.php?page=qlmonan/capnhat");
    }
?>

<?php
    include_once("controllers/cMonAn.php");
    $monan = new cMonAn();
    if(isset($_POST["add"])){
        echo 
        '<form method="post">
            <div class="container" id="ingredient-details">
                <div class="header">
                    <span><button class="close-btn" onclick="closeIngredientDetails()">✖</button></span>
                </div>
                <h3 style="color: #db5a04;">Thêm món ăn</h3>
                <div class="themnguyenlieu">
                    <div class="form-group">
                        <label for="name">Tên món ăn</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="loai">Loại món ăn</label>
                        <input type="text" id="loai" name="loai" required>
                    </div>
                    <div class="form-group">
                        <label for="gia">Đơn giá</label>
                        <input type="text" id="gia" name="gia" required>
                    </div>
                    <div class="form-group scrollable-container" style="height: 200px;overflow-y: scroll;padding: 10px;">
                        <label for="congthuc">Công thức</label>';
                        $nguyenlieu = new cNguyenLieu();
                        $list_nguyenlieu = $nguyenlieu->getNguyenLieu();
                        foreach ($list_nguyenlieu as $i) {
                            echo'<hr>';
                            echo '<label for="">' . $i["tennl"] . '</label>';
                            echo '<input type="hidden" name="nguyenlieu_id[]" value="' . $i["manl"] . '">';
                            echo '<input type="number" placeholder="Định lượng" name="dinhluong[]"> <br>';
                        }
                    echo '</div>
                </div>
                <button class="btn-add" type="submit" name="btn-add">Thêm</button>
            </div>
        </form>';
    }
    if(isset($_POST["btn-add"])){
        $name = $_POST['name'];
        $loai = $_POST['loai'];
        $gia=  $_POST['gia'];
        $congthuc = '';
        foreach ($_POST['dinhluong'] as $key => $dinhluong) {
            if(!empty($dinhluong)){
                $congthuc .= 'ID: ' . $_POST['nguyenlieu_id'][$key]. ', Dinhluong: ' . $dinhluong.', ';
            }
        }

        $monan->addMonAn($name, $loai, $gia, $congthuc);
    }
?>
<div class="sidebar">
    <form action="" method="post">
        <h4>Trạng thái <button type="submit" style="background-color: rgba(0, 0, 0, 0); border: none; color: white" name="filter"><i class="fas fa-filter" style="margin-left: 80px;"></i></button></h4>
        <input type="checkbox" style="margin-bottom: 30px;" name="trangthai[]" value="Đã duyệt"> Còn <br>
        <input type="checkbox" style="margin-bottom: 30px;" name="trangthai[]" value="Chờ duyệt"> Hết <br>
        <h4>Cửa hàng</h4>
        <?php
        $DScuaHang = $cuaHang->getCuaHang();
        foreach ($DScuaHang as $i) {
            echo '<input style="margin-bottom: 30px;" type="checkbox" name="cuahang[]" value="' . $i['mach'] . '"> ' . $i['tench'] . '<br>';
        }
        ?>
        <button class="add" name="add">Thêm mới</button>
        <button class="update" name="update">Cập nhật</button>
    </form>
</div>

<div style="margin-left: 210px; padding: 20px;" class="content">
    <h4 style="color: #db5a04">Quản lý món ăn</h4>
    <div class="table-material" style="max-height: 400px; overflow-y: auto;">
        <form action="" method="post">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <th>Mã MA</th>
                        <th>Hình ảnh</th>
                        <th>Tên món ăn</th>
                        <th>Loại món</th>
                        <th>Đơn giá (VND)</th>
                        <th>Trạng thái</th>
                        <th>Tùy chọn</th>
                    </thead>
                    <?php
                    $DS = $monan->getMonAn();
                    $monan->displayMonAn($DS);
                    ?>
                </table>
            </div>
        </form>
    </div>
</div>

<!-- Hiển thị form chi tiết nếu có dữ liệu -->
<?php if (isset($list) && !empty($list)): ?>
    <form method="post" id="detail">
        <div class="detail">
            <div class="headerdetail">
                <div class="img-headerdetail">
                    <img src="img/<?php echo $list[0]['hinhanh']; ?>" alt="Hình ảnh món ăn">
                </div>
                <h1>Thông tin chi tiết món ăn</h1>
                <span><button class="close-btn" onclick="closeDetails()">✖</button></span>
            </div>
            <div class="info">
                <div class="info-item">
                    <div class="info-label">Mã món ăn:</div>
                    <div class="info-value"><?php echo $list[0]['mama']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Cửa hàng:</div>
                    <div class="info-value"><?php echo $ch[0]['tench']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Tên món ăn:</div>
                    <div class="info-value"><?php echo $list[0]['tenma']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Loại món ăn:</div>
                    <div class="info-value"><?php echo $list[0]['maloaima']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Giá bán:</div>
                    <div class="info-value"><?php echo $list[0]['giaban']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Trạng thái:</div>
                    <div class="info-value"><?php echo $list[0]['trangthai']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Công thức:</div>
                    <div class="info-value"><?php echo $list[0]['dinhluong']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Số lượng:</div>
                    <div class="info-value"><?php echo $list[0]['soluong']; ?></div>
                </div>
            </div>
        </div>
    </form>
<?php endif; ?>

<script>
    function closeDetails() {
        document.getElementById("detail").style.display = "none";
    }
</script>
<script>
    function closeIngredientDetails() {
        const details = document.getElementById("ingredient-details");
        if (details) {
            details.style.display = "none";
        } 
    }
</script>
