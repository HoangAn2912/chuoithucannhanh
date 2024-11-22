<?php
    include_once("controllers/cNguyenLieu.php");
    $nguyenlieu = new cNguyenLieu();
    if(isset($_POST["add"])){
        echo 
        '<form method="post" enctype="multipart/form-data">
            <div class="container" id="ingredient">
                <div class="header">
                    <span><button class="close-btn" onclick="closeIngredient()">✖</button></span>
                </div>
                <h3 style="color: #db5a04;">Thêm nguyên liệu</h3>
                <div class="themnguyenlieu">
                    <div class="form-group">
                        <label for="name">Tên nguyên liệu</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Hình ảnh</label>
                        <input type="file" id="hinh" name="hinh" required>
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
        $hinhanh= $_FILES['hinh']['name'];
        if(move_uploaded_file($_FILES['hinh']['tmp_name'],'image/'.$hinhanh)){
            return $nguyenlieu->addNguyenLieu($name, $unit, $supplierName, $supplierEmail, $supplierPhone, $hinhanh);
        }else{
            echo 'up ảnh không thành công';
        }
        

    }
?>