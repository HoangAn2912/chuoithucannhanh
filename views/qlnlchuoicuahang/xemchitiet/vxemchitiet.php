<?php
    include_once("controllers/cKhoNguyenLieu.php");
    include_once("controllers/cCuaHang.php");
    $nguyenlieu = new cKhoNguyenLieu();
    $cuaHang = new cCuaHang();
    if (isset($_POST["btn-detail"])) {

        $list = $nguyenlieu->getNguyenLieuByMaNL_CH($_POST["btn-detail"]);
        $ch = $cuaHang->getCuaHangByMaCH($list[0]['mach']);

        echo '<form method = "post">
                <div class="container" id="ingredient">
                        
                    <div class="header">
                        <span>Mã nguyên liệu: ' . $list[0]["manl"] . '</span>
                        <span>Cửa hàng: ' . $ch[0]['tench'] . ' </span>
                        <span><button class="close-btn">✖</button></span>
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
                            <p>Số lượng hiện có: ' . $list[0]['SoLuongHienCo'] . '</p>
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