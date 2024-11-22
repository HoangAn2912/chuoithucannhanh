<?php
    if(isset($_POST["add"])){
        echo 
        '<form method = "post">
            <div class="container" id="ingredient">
                <div class="header">
                    <span><button class="close-btn" onclick="closeIgredient()">✖</button></span>
                </div>
                <h3 style="color: #db5a04;">Thêm nguyên liệu</h3>
                <div class="themnguyenlieu">
                    <div class="form-group">
                        <label for="name">Số lượng </label>
                        <input type="number" id="" name="quantity" required>
                    </div>
                </div>
                <button class="btn-add" name="btn-add" value="' . $_POST["add"] . '">Nhập</button>
            </div>
        </form>';
    }
?>
<?php
    include_once('controllers/cKhoNguyenLieu.php');
    include_once ('controllers/cLichSuNhapKho.php');
    $history = new cLichSuNhapKho();
    $nguyenlieu = new cKhoNguyenLieu();   
    if(isset($_POST['btn-add'])){
       if( $history ->updatehistory ($_POST['quantity'],  $_POST['btn-add']) &&
        $nguyenlieu->updatequantity($_POST['quantity'], $_POST['btn-add']) ){

        }
    }
?>
<?php
    include_once("controllers/cKhoNguyenLieu.php");
    include_once("controllers/cCuaHang.php");
    $nguyenlieu = new cKhoNguyenLieu();
    $cuaHang = new cCuaHang();
    if (isset($_POST["btn-detail"])) {

        $list = $nguyenlieu->getNguyenLieuByMaNL_CH($_POST["btn-detail"]);
        echo '<form method = "post">
                <div class="container" id="ingredient">
                        
                    <div class="header">
                        <span>Mã nguyên liệu: ' . $list[0]["manl"] . '</span>
                        <span><button class="close-btn" onclick="closeIgredient()">✖</button></span>
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

                if ($list[0]['TinhTrang'] == "Hết hàng") {
                echo '<button class="btn-approve" name="btn-approve" value="' . $list[0]['NLCH_ID'] . '">Đề xuất</button>';
                }
            echo '</div>';
        echo '</form>';
    }
    if  (isset($_POST["btn-approve"])) {
       $nguyenlieu->updateTinhTrangNguyenLieu($_POST["btn-approve"], 'Chờ duyệt');
    }
?>