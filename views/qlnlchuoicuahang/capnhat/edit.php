<?php
    if(isset($_POST["edit"])){
        echo 
        '<div class="container" id="ingredient">
            <div class="header">
                <span><button class="close-btn" onclick="closeIngredient()">✖</button></span>
            </div>
            <h3 style="color: #db5a04;">Sửa nguyên liệu</h3>
            <div class="updateMaterial">
                <div class="form-group">
                    <label for="name">Tên nguyên liệu</label>
                    <input type="text" id="name" name="name" required>
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
            <button class="btn-update">Sửa</button>
        </div>';
    }
?>