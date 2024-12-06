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
        }else {
            echo '<script>alert("Cập nhật ảnh không thành công!");</script>';
        }
    }
    

?>
<?php
    if(isset($_POST["edit"])){
        echo 
        '<div class="container" id="ingredient">
            <div class="header">
                <span><button class="close-btn" onclick="closeUpdates()">✖</button></span>
            </div>
            <h3 style="color: #db5a04;">Sửa món ăn</h3>
            <div class="updateMaterial">
                <div class="form-group">
                    <label for="name">Tên món ăn</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="loai">Loại món</label>
                    <input type="text" id="loai" name="loai" required>
                    </select>
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
                <div class="form-group">
                    <label for="nguyenlieu">Nguyên liệu</label>
                    <input type="text" id="nguyenlieu" name="nguyenlieu" required>
                </div>
            </div>
            <button class="btn-update">Sửa</button>
        </div>';
    }
    foreach ($_POST['dinhluong'] as $key => $dinhluong) {
        if(!empty($dinhluong)){
            $congthuc .= 'ID: ' . $_POST['nguyenlieu_id'][$key]. ', Dinhluong: ' . $dinhluong.', ';
        }
    }
?>

<div class="sidebar">
    <form action=""  method="post">
        <h4>Trạng thái</h4>
            <a href=""><label><input type="checkbox" name="trangthai"> Còn</label></a>
            <a href=""><label><input type="checkbox" name="trangthai"> Hết</label></a>
        <h4>Cửa hàng</h4>
            <a href=""><label><input type="checkbox" name="cuahang" value="1"> Cửa hàng 1</label></a>
            <a href=""><label><input type="checkbox" name="cuahang" value="2"> Cửa hàng 2</label></a>
            <a href=""><label><input type="checkbox" name="cuahang" value="3"> Cửa hàng 3</label></a>
            <a href=""><label><input type="checkbox" name="cuahang" value="4"> Cửa hàng 4</label></a>
            <a href=""><label><input type="checkbox" name="cuahang" value="5"> Cửa hàng 5</label></a>
            <button class="add" name="add">Thêm mới</button>
            <button class="update" name="update">Cập nhật</button>

    </form>
</div>
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
                                        echo '<li><button class="delete" name="delete" onclick="return confirm(\'Ban co chac muon xoa sp nay khong?\')" type="submit">xóa</button></li>';
                                        echo '<li><button class="edit" name="edit">sửa</button></li>';
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

