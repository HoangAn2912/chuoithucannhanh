<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
    echo require("layout/navqlchuoi.php");
?>
<?php
    include_once("controllers/cKhoNguyenLieu.php");
    include_once("controllers/cCuaHang.php");
    $nguyenlieu = new cKhoNguyenLieu();
    $cuaHang = new cCuaHang();
    if (isset($_POST["btn-detail"])) {

        $list = $nguyenlieu->getNguyenLieuByMaNL_CH($_POST["btn-detail"]);
        $ch = $cuaHang->getCuaHangByMaCH($list[0]['mach']);

        echo '<form method = "post">
                <div class="container" id="ingredient-details">
                        
                    <div class="header">
                        <span>Mã nguyên liệu: ' . $list[0]["manl"] . '</span>
                        <span>Cửa hàng: ' . $ch[0]['tench'] . ' </span>
                        <span><button class="close-btn" onclick="closeDetails()">✖</button></span>
                    </div>
                    
                    <h3 style="color: #db5a04;">Chi tiết nguyên liệu</h3>
                    
                    <div class="details">
                        <div>
                            <p>Tên nguyên liệu: ' . $list[0]['tennl'] . '</p>
                            <p>Đơn vị tính: ' . $list[0]['donvitinh'] . '</p>
                            <p>Đơn giá: ' . $list[0]['dongia'] . ' VND</p>
                            <p>Trạng thái: ' . $list[0]['TinhTrang'] . '</p>
                        </div>
                        <div>
                            <p>Tên NCC: ' . $list[0]['ten_ncc'] . '</p>
                            <p>SDT nhà cung cấp: ' . $list[0]['sodienthoai_ncc'] . '</p>
                            <p>Email NCC: ' . $list[0]['email_ncc'] . '</p>
                            <p>Số lượng bổ sung: ' . $list[0]['SoLuongBoSung'] . '</p>
                        </div>
                    </div>';

                if ($list[0]['TinhTrang'] == "Chờ duyệt") {
                echo '<button class="btn-approve" name="btn-approve" value="' . $list[0]['NLCH_ID'] . '">Duyệt</button>';
                }
            echo '</div>';
        echo '</form>';
    }
    if  (isset($_POST["btn-approve"])) {
       $nguyenlieu->updateTinhTrangNguyenLieu($_POST["btn-approve"], 'Đã duyệt');
    }
?>
<?php
    if(isset($_POST["update"])){
        header("Location:index.php?page=qlnlchuoicuahang/capnhat");
    }
?>
<?php
    include_once("controllers/cNguyenLieu.php");
    $nguyenlieu = new cNguyenLieu();
    if(isset($_POST["add"])){
        echo 
        '<form method="post">
            <div class="container" id="ingredient-details">
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
                <button class="btn-add" type="submit" name="btn-add">Thêm</button>
            </div>
        </form>';
    }
    if(isset($_POST["btn-add"])){
        $name = $_POST['name'];
        $unit = $_POST['unit'];
        $supplierName =  $_POST['supplierName'];
        $supplierPhone =  $_POST['supplierPhone'];
        $supplierEmail = $_POST['supplierEmail'];

        $nguyenlieu->addNguyenLieu($name, $donvitinh, $supplierName, $supplierEmail, $supplierPhone);
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
                    $DS = array();
                    if (isset($_POST["filter"])) {
                        if (isset($_POST["cuahang"]) && isset($_POST["trangthai"])) {
                            foreach ($_POST["cuahang"] as $i) {
                                foreach ($_POST["trangthai"] as $t) {
                                    // array_merge: để thêm dữ liệu từ mỗi vòng lặp mà không ghi đè lên kết quả trước đó
                                    $DS = array_merge($DS, $khoNguyenLieu->getNguyenLieuByMaCH_TT($i, $t));
                                }
                            }
                        } elseif (isset($_POST["cuahang"])) {
                            foreach ($_POST["cuahang"] as $i) {
                                $DS = array_merge($DS, $khoNguyenLieu->getNguyenLieuByMaCH($i));
                            }
                        } elseif (isset($_POST["trangthai"])) {
                            foreach ($_POST["trangthai"] as $t) {
                                $DS = array_merge($DS, $khoNguyenLieu->getNguyenLieuByTT($t));
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
