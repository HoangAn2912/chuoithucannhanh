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
        $nl = $nguyenlieu->getNguyenLieuByMaNL_CH($_POST['btn-add']);
        if($_POST['quantity'] == $nl[0]['SoLuongBoSung']){
            if( $history ->updatehistory ($_POST['quantity'],  $_POST['btn-add']) &&
                $nguyenlieu->updatequantity($_POST['quantity'], $_POST['btn-add']) && ($nguyenlieu->updateTinhTrangNguyenLieu($_POST['btn-add'], 'Còn hàng'))){

                    echo 'window.location.href = "index.php?page=qlnlcuahang';
            }
        }else{
            echo '<script>
                    alert("Vui lòng nhập đúng số lượng đã đề xuất là: ' . $nl[0]['SoLuongBoSung'] . '");
                    window.location.href = "index.php?page=qlnlcuahang";
                  </script>';
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
        echo '<form method = "post" id="detail">
            <div class="detail" >
                <div class="headerdetail">
                    <img src="image/'.$list[0]["hinh"].'" alt="Hình ảnh nguyên liệu">
                    <h1>Thông tin chi tiết nguyên liệu</h1>
                    <span><button class="close-btn" style="padding-left: 100px;">✖</button></span>
                </div>
                <div class="info">
                    <div class="info-item">
                        <div class="info-label">Mã nguyên liệu:</div>
                        <div class="info-value">'.$list[0]["manl"].'</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tên nguyên liệu:</div>
                        <div class="info-value">'.$list[0]['tennl'].'</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Đơn vị tính:</div>
                        <div class="info-value">'.$list[0]['donvitinh'].'</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Đơn giá:</div>
                        <div class="info-value">'.$list[0]['dongia'].'</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Trạng thái:</div>
                        <div class="info-value">'.$list[0]['TinhTrang'].'</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tên NCC:</div>
                        <div class="info-value">'.$list[0]['ten_ncc'].'</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">SĐT nhà cung cấp:</div>
                        <div class="info-value">'.$list[0]['sodienthoai_ncc'].'</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email NCC:</div>
                        <div class="info-value">'.$list[0]['email_ncc'].'</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Số lượng bổ sung:</div>
                        <div class="info-value">'.$list[0]['SoLuongBoSung'].'</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Số lượng hiện có:</div>
                        <div class="info-value">'.$list[0]['SoLuongHienCo'].'</div>
                    </div>
                </div>';
                if ($list[0]['TinhTrang'] == "Chờ duyệt") {
                    echo '<button class="btn-approve" name="btn-approve" value="' . $list[0]['NLCH_ID'] . '">Duyệt</button>';
                }
            echo '</div>';
        echo '</form>';
    }
    if  (isset($_POST["btn-approve"])) {
        echo '<form method = "post">
                <div class="container" style="height: 250px;" id="ingredient">
                    <div class="header">
                        <span><button class="close-btn">✖</button></span>
                    </div>
                    
                    <h3 style="color: #db5a04; margin: auto;">Nhập số lượng đề xuất</h3>
                    <div class="form-group"  style ="margin-top: 20px;">
                        <input type="number" id="quantityadd" name="quantityadd" required>
                    </div>';
                    echo '<button class="btn-confirm" name="btn-confirm" value="' . $_POST["btn-approve"]. '">Xác nhận</button>';
            echo '</div>';
        echo '</form>';
    }
    if(isset($_POST["btn-confirm"])){
        $nguyenlieu->updatequantityadd($_POST["quantityadd"],$_POST["btn-confirm"]);
    }
?>