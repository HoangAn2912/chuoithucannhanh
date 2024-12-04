<?php
    echo '<link rel="stylesheet" href="css/QLNL/ql.css">';
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script src="js/js_quanlynguyenlieu/quanlynguyenlieu.js?v=1.0"></script>';
    echo require("layout/navqlchuoi.php");
    include_once("views/qlnlchuoicuahang/themnl.php");
    include_once("views/qlnlchuoicuahang/xemchitiet/vxemchitiet.php");
?>
<?php
    include_once("controllers/cKhoNguyenLieu.php");
    $ingredient = new cKhoNguyenLieu();
    $list_ingredient = $ingredient->getDistanctNguyenLieu();
    foreach($list_ingredient as $i){
        if($i['SoLuongHienCo'] == 0 && $i['SoLuongBoSung'] == 0){
            $ingredient->updateTinhTrangNguyenLieu($i['NLCH_ID'],"Hết hàng");
        }
        else if($i["SoLuongHienCo"]>0){
            $ingredient->updateTinhTrangNguyenLieu($i['NLCH_ID'], "Còn hàng");
        }
    }
?>
<?php
    if(isset($_POST["update"])){
        header("Location:index.php?page=qlnlchuoicuahang/capnhat");
    }
?>
<div id="notification" class="notification">
    <span></span>
</div>
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
        <h3 style="color: #db5a04">Quản lý nguyên liệu</h3>
        <div class="table-material" style ="max-height: 400px; overflow-y: auto;">
            <form action="" method="post">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <th>Mã CH</th>
                            <th>Mã NL</th>
                            <th>Hình ảnh</th>
                            <th>Tên Nguyên Liệu</th>
                            <th>Đơn vị tính</th>
                            <th>Đơn giá (VND)</th>
                            <th>Trạng thái</th>
                            <th>Tùy Chọn</th>
                        </thead>
                        <tbody>
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
                                            $DS = array_merge($DS, $khoNguyenLieu->getDistanctNguyenLieuByMaCH($i));
                                        }
                                    } elseif (isset($_POST["trangthai"])) {
                                        foreach ($_POST["trangthai"] as $t) {
                                            $DS = array_merge($DS, $khoNguyenLieu->getNguyenLieuByTT($t));
                                        }
                                    }else {
                                        $DS = $khoNguyenLieu->getDistanctNguyenLieu();
                                    }
                                    $khoNguyenLieu->displayNguyenLieu($DS);
                                } else {
                                    $DS = $khoNguyenLieu->getDistanctNguyenLieu();
                                    $khoNguyenLieu->displayNguyenLieu($DS);
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
