<?php
    echo '<link rel="stylesheet" href="css/QLMA/chitiet.css">';
    echo require("layout/navqlchuoi.php");
    include_once("controllers/cKhoNguyenLieu.php");
    include_once("controllers/cNguyenLieu.php");
?>
<?php
    include_once("controllers/cMonAn.php");
    include_once("controllers/cCuaHang.php");
    $monan = new cMonAn();
    $cuaHang = new cCuaHang();
    if (isset($_POST["btn-detail"])) {

        $list = $monan-> getMonAnByMaMonAn($_POST["btn-detail"]);
        $ch = $cuaHang->getCuaHangByMaCH($list[0]['mach']);
        
        echo $ch["mach"];
        echo '<form method = "post">
                <div class="container" id="ingredient-details">
                        
                    <div class="header">
                        <span>Mã món ăn: ' . $list[0]["mama"] . '</span>
                        <span>Cửa hàng: ' . $ch[0]['tench'] . ' </span>
                        <span><button class="close-btn" onclick="closeDetails()">✖</button></span>
                    </div>
                    <h3 style="color: #db5a04;">Chi tiết món ăn</h3>
                    
                    <div class="details">
                        <div>
                            <p>Tên món ăn: ' . $list[0]['tenma'] . '</p>
                            <p>Loại món ăn: ' . $list[0]['maloaima'] . '</p>
                            <p>Đơn giá: ' . $list[0]['giaban'] . ' VND</p>
                            <p>Trạng thái: ' . $list[0]['trangthai'] . '</p>
                            <p>Tên nguyên liệu: ' . $list[0]['tennl'] . '</p>
                            <p>Số lượng: ' . $list[0]['soluong'] . '</p>
                        </div>
                        
                    </div>';

               
            echo '</div>';
        echo '</form>';
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
                    <span><button class="close-btn" onclick="closeDetails()">✖</button></span>
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
                    <div class="form-group scrollable-container">
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
<form action=""  method="post">
        <h4>Trạng thái <button type="submit" style ="background-color: rgba(0, 0, 0, 0); border: none; color: white" name="filter"><i class="fas fa-filter" style="margin-left: 80px;"></i></button></h4>
           <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Đã duyệt"> Còn <br>
           <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Chờ duyệt"> Hết <br>
           <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Chờ duyệt"> Ẩn
            
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
        <h4 style="color: #db5a04">Quản lý món ăn</h4>
        <div class="table-material" style ="max-height: 400px; overflow-y: auto;">
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
                    include_once("controllers/cMonAn.php");
                    $MonAn = new cMonAn();
                    $DS = array();
                    if (isset($_POST["filter"])) {
                        if (isset($_POST["cuahang"]) && isset($_POST["trangthai"])) {
                            foreach ($_POST["cuahang"] as $i) {
                                foreach ($_POST["trangthai"] as $t) {
                                    // array_merge: để thêm dữ liệu từ mỗi vòng lặp mà không ghi đè lên kết quả trước đó
                                    $DS = array_merge($DS, $MonAn->getMonAnByMaCH_TT($i, $t));
                                }
                            }
                        } elseif (isset($_POST["cuahang"])) {
                            foreach ($_POST["cuahang"] as $i) {
                                $DS = array_merge($DS, $MonAn->getMonAnByMaCH($i));
                            }
                        } elseif (isset($_POST["trangthai"])) {
                            foreach ($_POST["trangthai"] as $t) {
                                $DS = array_merge($DS, $MonAn->getMonAnByTT($t));
                            }
                        }else {
                            $DS = $MonAn->getMonAn();
                        }
                        $MonAn->displayMonAn($DS);
                    } else {
                        $DS = $MonAn->getMonAn();
                        $MonAn->displayMonAn($DS);
                    }
                ?>
            
                <!-- Add more rows as needed -->
            </table>
            </div>
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
        document.getElementById("ingredient-details").style.display = "none";
    }
</script>
</html>
