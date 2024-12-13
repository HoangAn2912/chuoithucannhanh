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
        '<form method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
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
                        <label>Hình ảnh</label>
                        <input type="file" id="hinh" name="hinh" required>
                    </div>
                   <div class="form-group">
                        <label for="loai">Loại món ăn</label>
                        <select id="loai" name="loai" required>
                            <option value="1">Gà</option>
                            <option value="2">Mì ý</option>
                            <option value="3">Khoai tây</option>
                            <option value="4">Nước ngọt</option>
                            <option value="5">Combo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gia">Số lượng</label>
                        <input type="text" id="soluong" name="soluong" required>
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
        $soluong=  $_POST['soluong'];
        $hinhanh= $_FILES['hinh']['name'];
        $congthuc = '';
        foreach ($_POST['dinhluong'] as $key => $dinhluong) {
            if(!empty($dinhluong)){
                $congthuc .= 'ID: ' . $_POST['nguyenlieu_id'][$key]. ', Dinhluong: ' . $dinhluong.', ';
            }
        }if(move_uploaded_file($_FILES['hinh']['tmp_name'],'img/'.$hinhanh)){

        $monan->addMonAn($name, $loai, $gia, $soluong, $congthuc, $hinhanh);
    }}
?>
<div class="sidebar">
    <form action="" method="post">
      
        
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
<script>
function validateForm() {
    // Lấy giá trị từ các trường input
    const name = document.getElementById("name").value;
    const loai = document.getElementById("loai").value;
    const gia = parseFloat(document.getElementById("gia").value);
    const dinhluongInputs = document.querySelectorAll('input[name="dinhluong[]"]');
    
    // Kiểm tra tên món ăn không được trống
    if (name.trim() === "") {
        alert("Tên món ăn không được để trống.");
        return false;
    }

    // Kiểm tra loại món ăn không được trống
    if (loai === "") {
        alert("Loại món ăn không được để trống.");
        return false;
    }

    // Kiểm tra đơn giá phải lớn hơn 0
    if (isNaN(gia) || gia <= 0) {
        alert("Đơn giá phải lớn hơn 0.");
        return false;
    }

    // Kiểm tra định lượng nguyên liệu không được nhỏ hơn 0
    for (let i = 0; i < dinhluongInputs.length; i++) {
        const dinhluong = parseFloat(dinhluongInputs[i].value);
        if (dinhluong <= 0) {
            alert("Định lượng các nguyên liệu không được nhỏ hơn 0.");
            return false;
        }
    }

    // Nếu tất cả các điều kiện hợp lệ, cho phép gửi form
    return true;
}
</script>
