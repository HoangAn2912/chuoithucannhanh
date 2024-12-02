<?php
    if(isset($_POST["edit"])){
        include_once("controllers/cNguyenLieu.php");
        $nguyenlieu = new cNguyenLieu ();
        $nl=$nguyenlieu->getNguyenLieuByID($_POST["edit"]);
        echo 
        '<div class="container" id="ingredient">
            <div class="header">
                <button type="button" class="close-btn">✖</button>
            </div>
            <h3>Sửa nguyên liệu</h3>
            <form id="ingredientForm" method="post" class="updateMaterial">
                <div class="form-group">
                    <label for="price">Đơn giá</label>
                    <input type="number" id="price" name="price" value="'.$nl[0]['dongia'].'" required>
                    <p id="errorprice"></p>
                </div>
                <div class="form-group">
                    <label for="unit">Đơn vị tính</label>
                    <input type="text" id="unit" name="unit" value="'.$nl[0]['donvitinh'].'" required>
                    <p id="errorunit"></p>
                </div>
                <div class="form-group" style="position: relative;">
                    <label for="supplierName">Tên NCC</label>
                    <input type="text" id="supplierName" name="supplierName" value="'.$nl[0]['tennl'].'" required>
                </div>
                <div class="form-group">
                    <label for="supplierPhone">SĐT NCC</label>
                    <input type="tel" id="supplierPhone" name="supplierPhone" required>
                    <p id="errorsupplierphone"></p>
                </div>
                <div class="form-group">
                    <label for="supplierEmail">Email NCC</label>
                    <input type="email" id="supplierEmail" name="supplierEmail" required>
                    <p id="erroremail"></p>
                </div>
                <button type="submit" class="btn-update">Sửa</button>
            </form>
        </div>';
    }

?>
