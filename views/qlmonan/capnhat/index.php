<!-- Sidebar -->
<?php
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
    echo '<link rel="stylesheet" href="css/QLMA/qlma.css">';
    require("layout/navqlchuoi.php");
    include_once("controllers/cKhoNguyenLieu.php");
    include_once("controllers/cNguyenLieu.php");
    include_once("controllers/cMonAn.php");
?>
<div class="sidebar">
<a href="index.php?page=qlmonan/xemchitiet">Quay lại</a>
</div>
<?php
    include_once("controllers/cMonAn.php");
    $monan = new cMonAn();
    if(isset($_POST["add"])){
        echo 
        '<form method="post">
            <div class="container" id="ingredient-details" enctype="multipart/form-data">
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
        $hinhanh= $_FILES['hinh']['name'];
        $congthuc = '';
        foreach ($_POST['dinhluong'] as $key => $dinhluong) {
            if(!empty($dinhluong)){
                $congthuc .= 'ID: ' . $_POST['nguyenlieu_id'][$key]. ', Dinhluong: ' . $dinhluong.', ';
            }
        
        }if(move_uploaded_file($_FILES['hinh']['tmp_name'],'img/'.$hinhanh)){
            $monan->addMonAn($name, $loai, $gia, $congthuc,$hinhanh);
        
        }
    }
    

?>
<?php
    if(isset($_POST["edit"])){
        
        include_once("controllers/cMonAn.php");
        $monan = new cMonAn();
        $ma=$monan->getMonAnByMaMonAn($_POST["edit"]);
        echo 
        '<form method="post">
        <div class="container" id="ingredient">
            <div class="header">
                <span><button class="close-btn" onclick="closeUpdates()">✖</button></span>
            </div>
            <h3 style="color: #db5a04;">Sửa món ăn</h3>
            <div class="updateMaterial">
                <div class="form-group">
                    <label for="name">Tên món ăn</label>
                    <input type="text" id="name" name="name" value="'.htmlspecialchars($ma[0]['tenma']).'" required>
                </div>
                <div class="form-group">
                    <label for="loai">Loại món</label>
                    <input type="text" id="loai" name="loai" value="'.htmlspecialchars($ma[0]['maloaima']).'" required>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gia">Đơn giá</label>
                    <input type="text" id="gia" name="gia" value="'.htmlspecialchars($ma[0]['giaban']).'" required>
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
            <input type="hidden" name="mama" value="' . $ma[0]['mama'] . '">
            <button class="btn-update" type="submit" name="btn-update">Cập nhật</button>
        </div>
        </form>';
    }
    foreach ($_POST['dinhluong'] as $key => $dinhluong) {
        if(!empty($dinhluong)){
            $congthuc .= 'ID: ' . $_POST['nguyenlieu_id'][$key]. ', Dinhluong: ' . $dinhluong.', ';
        }
    }
?>

    <div style="margin-left: 210px; padding: 20px;" class="content">
        <h4 style="color: #db5a04">DANH SÁCH MÓN ĂN</h4>
        <div class="table-material" style ="max-height: 400px; overflow-y: auto;">
        <form action="" method="post">
        <div class="table-wrapper">
            <table>
            <thead>
                <th>Mã MA</th>
                <th>Hình ảnh</th>
                <th>Tên Món Ăn</th>
                <th>Loại món</th>
                <th>Đơn giá (VND)</th>
                <th>Trạng thái</th>
                <th>Tùy Chọn</th>
            </thead>
          
                <?php
                    include_once("controllers/cMonAn.php");
                    $monan = new cMonAn ();
                    $DSMonan=$monan->getMonAn();
                    echo '<tr>';
                    if($DSMonan){
                        foreach($DSMonan as $i){
                            echo '<td>'.$i['mama'].'</td>';
                            echo '<td><img src="img/'.$i['hinhanh'].'" width="50" height="50"></td>';    
                            echo '<td>'.$i['tenma'].'</td>';
                            echo '<td>'.$i['maloaima'].'</td>';
                            echo '<td>'.$i['giaban'].'</td>';
                            echo '<td>'.$i['trangthai'].'</td>';
                                
                            echo '<td>';
                            echo '<div class="dropdown">';
                                echo '<a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>';
                                echo '<div class="dropdown-content" style="background-color: white; min-width: 50px; border-radius: 10px; border: 1px solid;">';
                                    echo '<ul type=none>';
                                    echo "<input type='hidden' name='mama' value='{$i["mama"]}' />";
                                    echo "<li><button type='submit' class='btn btn-danger' name='btnDelete' onclick='return confirm(\"Bạn có xác định xóa món ăn này không?\");'>Xóa</button></li>";
                                        echo '<li><button class="edit" name="edit" value ="'.$i['mama'].'">sửa</button></li>';
                                    echo '</ul>';
                            echo '</div>';
                            echo '</div>';
                            echo '</td>';
                            echo '</tr>';
                    }
                }

                ?>
            </table>
            </div>
        </form>
        </div>
    </div>
</body>
<script>
    function closeUpdates() {
        document.getElementById("ingredient").style.display = "none";
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
</html>
<?php 

if (isset($_POST["btn-update"])) {
    $name = $_POST['name'];
    $loai = $_POST['loai'];
    $gia = $_POST['gia'];
    $mama = $_POST['mama']; // Lấy mã món ăn từ input ẩn

    $congthuc = '';
    foreach ($_POST['dinhluong'] as $key => $dinhluong) {
        if (!empty($dinhluong)) {
            $congthuc .= 'ID: ' . $_POST['nguyenlieu_id'][$key] . ', Dinhluong: ' . $dinhluong . ', ';
        }
    }
    if($monan->updateMonAn($mama, $name, $loai, $gia, $congthuc)){
        echo '<script>alert("Cập nhật thành công!");</script>';
    } else {
        echo '<script>alert("Cập nhật không thành công!");</script>';
    }

    
}
if (isset($_POST['btnDelete'])) {
    $mama = $_POST['mama'];
        $monan = new cMonAn();
        $result = $monan->cDeleteMonAn($mama);
        if ($result) {
            echo "<script>alert('Xóa món ăn thành công!'); window.location.href = 'index.php?page=qlmonan/capnhat';</script>";
            exit();
        } else {
            echo "<script>alert('Xóa món ăn thất bại!');</script>";
        }
    }


?>
