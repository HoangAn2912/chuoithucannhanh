<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
    echo require("layout/navqlchuoi.php");
?>
<?php
    if(isset($_POST["btn-detail"])){
        echo '<div class="container" id="ingredient-details">
            
            <div class="header">
                <span>Mã nguyên liệu: 2</span>
                <span>Mã cửa hàng: 1</span>
                <span><button class="close-btn" onclick="closeDetails()">✖</button></span>
            </div>
            
            <h3 style="color: #db5a04;">Chi tiết nguyên liệu</h3>
            
            <div class="details">
                <div>
                    <p>Tên nguyên liệu: thịt bò</p>
                    <p>Đơn vị tính: kg</p>
                    <p>Đơn giá: 280,000VND</p>
                    <p>Trạng thái: chờ duyệt</p>
                </div>
                <div>
                    <p>Tên NCC: tươi sống</p>
                    <p>SDT nhà cung cấp: 012345678</p>
                    <p>Email NCC: abc@gmail.com</p>
                    <p>Số lượng bổ sung: 20</p>
                </div>
            </div>
            
            <button class="btn-approve">Duyệt</button>
        </div>';
    }
?>
<?php
    if(isset($_POST["update"])){
        header("Location:index.php?page=qlnlchuoicuahang/capnhat");
    }
?>
<?php
    if(isset($_POST["add"])){
        echo 
        '<div class="container" id="ingredient-details">
            <div class="header">
                <span><button class="close-btn" onclick="closeDetails()">✖</button></span>
            </div>
            <h3 style="color: #db5a04;">Thêm nguyên liệu</h3>
            <div class="themnguyenlieu">
                <div class="form-group">
                    <label for="name">Tên nguyên liệu</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="unit">Đơn vị tính</label>
                    <select id="unit" name="unit" required>
                        <option value="">Chọn đơn vị</option>
                        <option value="kg">Kg</option>
                        <option value="g">g</option>
                        <option value="l">l</option>
                        <option value="ml">ml</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="supplierName">Tên NCC</label>
                    <input type="text" id="supplierName" name="supplierName" required>
                </div>
                <div class="form-group">
                    <label for="supplierPhone">SĐT NCC</label>
                    <input type="tel" id="supplierPhone" name="supplierPhone" required>
                </div>
                <div class="form-group">
                    <label for="supplierEmail">Email NCC</label>
                    <input type="email" id="supplierEmail" name="supplierEmail" required>
                </div>
            </div>
            <button class="btn-add">Thêm</button>
        </div>';
    }
?>
<div class="sidebar">
<form action=""  method="post">
        <h4>Trạng thái <button type="submit" style ="background-color: rgba(0, 0, 0, 0); border: none; color: white" name="filter"><i class="fas fa-filter" style="margin-left: 80px;"></i></button></h4>
           <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Đã duyệt"> Đã duyệt <br>
           <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Chờ duyệt"> Chờ duyệt
            
        <h4>Cửa hàng </h4>
                <?php
                    include_once("controllers/cCuaHang.php");
                    $cuaHang = new cCuaHang();
                    $DScuaHang = $cuaHang->getCuaHang();
                    foreach($DScuaHang as $i){
                        echo '<input style ="margin-bottom: 30px;" type="checkbox" name="cuahang[]" value="'.$i['mach'].'"> '.$i['tench'].'<br>';
                    }
                ?>
            <button class="add" name="add">Thêm mới</button>
            <button class="update" name="update">Cập nhật</button>

    </form>
</div>
    <div style="margin-left: 210px; padding: 20px;" class="content">
        <h4 style="color: #db5a04">Quản lý nguyên liệu</h4>
        <div class="table-material">
            <form action="" method="post">
                <table>
                <tr>
                    <th>Mã CH</th>
                    <th>Mã NL</th>
                    <th>Tên Nguyên Liệu</th>
                    <th>Đơn vị tính</th>
                    <th>Đơn giá (VND)</th>
                    <th>Trạng thái</th>
                    <th>Tùy Chọn</th>
                </tr>
                <?php
                    include_once("controllers/cKhoNguyenLieu.php");
                    $khoNguyenLieu = new cKhoNguyenLieu();
                    if (isset($_POST["filter"])) {
                        if (isset($_POST["cuahang"]) && isset($_POST["trangthai"])) {
                            foreach ($_POST["cuahang"] as $i) {
                                foreach ($_POST["trangthai"] as $t) {
                                    $DS = $khoNguyenLieu->getNguyenLieuByMaCH_TT($i, $t);
                                }
                            }
                        } elseif (isset($_POST["cuahang"])) {
                            foreach ($_POST["cuahang"] as $i) {
                                $DS = $khoNguyenLieu->getNguyenLieuByMaCH($i);
                            }
                        } elseif (isset($_POST["trangthai"])) {
                            foreach ($_POST["trangthai"] as $t) {
                                $DS = $khoNguyenLieu->getNguyenLieuByTT($t);
                            }
                        }else {
                            $DS = $khoNguyenLieu->getNguyenLieu();
                        }
                        $khoNguyenLieu->displayNguyenLieu($DS);
                    } else {
                        $DS = $khoNguyenLieu->getNguyenLieu();
                        $khoNguyenLieu->displayNguyenLieu($DS);
                    }
                ?>
                </table>
            </form>
        </div>
        <div class="pagination">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">Tiếp theo</a>
        </div>
    </div>

</body>

<script>
    function closeDetails() {
        document.getElementById("ingredient-details").style.display ="none";
    }
</script>
</html>
