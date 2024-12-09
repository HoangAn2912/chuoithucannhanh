<?php
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
    include_once("controllers/cNguyenLieu.php");
    include_once("controllers/cKhoNguyenLieu.php");
    include_once("controllers/cCuaHang.php");
    $nguyenlieu = new cNguyenLieu();
    $khonguyenlieu = new cKhoNguyenLieu();
    $cuahang = new cCuahang();
    if(isset($_POST["add"])){
        echo 
        '<form method="post" id="ingredientForm" class="updateMaterial" enctype="multipart/form-data">
            <div class="container" id="ingredient">
                <div class="header">
                    <span><button class="close-btn">✖</button></span>
                </div>
                <h3 style="color: #db5a04;">Thêm nguyên liệu</h3>
                <div class="themnguyenlieu">
                    <div class="form-group">
                        <label>Tên nguyên liệu</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" id="hinh" name="hinh" required>
                    </div>
                    <div class="form-group">
                        <label>Đơn vị tính</label>
                        <input type="text" id="unit" name="unit" required>
                        <input type="text" id="price" name="price" required placeholder="Đơn giá">
                    </div>
                    <div class="form-group">
                        <label>Tên NCC</label>
                        <input type="text" id="supplierName" name="supplierName" required>
                    </div>
                    <div class="form-group">
                        <label>SĐT NCC</label>
                        <input type="tel" id="supplierPhone" name="supplierPhone" required>
                    </div>
                    <div class="form-group">
                        <label>Email NCC</label>
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
        $price = $_POST["price"];
        $supplierName =  $_POST['supplierName'];
        $supplierPhone =  $_POST['supplierPhone'];
        $supplierEmail = $_POST['supplierEmail'];
        $hinhanh= $_FILES['hinh']['name'];
        $dsch = $cuahang->getCuaHang();
        if(move_uploaded_file($_FILES['hinh']['tmp_name'],'image/'.$hinhanh)){
            $nguyenlieu->addNguyenLieu($name, $unit,$price, $supplierName, $supplierEmail, $supplierPhone, $hinhanh);
            $nl_new = $nguyenlieu->getNguyenLieuByIDMax();
            if ($nl_new) {
                foreach($dsch as $i){
                    $khonguyenlieu->addNguyenLieu($nl_new[0]["manl"], $i["mach"]);
                }
            }
        } else {
            echo '<script>alert("Cập nhật ảnh không thành công!");</script>';
        }
    }
?>