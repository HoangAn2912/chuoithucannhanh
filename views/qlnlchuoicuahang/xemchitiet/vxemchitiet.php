<?php
    include_once("controllers/cKhoNguyenLieu.php");
    include_once("controllers/cCuaHang.php");
    $nguyenlieu = new cKhoNguyenLieu();
    $cuaHang = new cCuaHang();
    if (isset($_POST["btn-detail"])) {

        $list = $nguyenlieu->getNguyenLieuByMaNL_CH($_POST["btn-detail"]);
        $ch = $cuaHang->getCuaHangByMaCH($list[0]['mach']);

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
                        <div class="info-label">Cửa hàng:</div>
                        <div class="info-value">'.$ch[0]['tench'].'</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tên nguyên liệu:</div>
                        <div class="info-value">'.$list[0]['tennl'].'></div>
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
        $nguyenlieu->updateTinhTrangNguyenLieu($_POST["btn-approve"], 'Đã duyệt');
    }
?>