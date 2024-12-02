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
                    <label>Đơn giá</label>
                    <input type="number" id="price" name="price" value="'.htmlspecialchars($nl[0]['dongia']).'" required>
                    <p id="errorprice"></p>
                </div>
                <div class="form-group">
                    <label>Đơn vị tính</label>
                    <input type="text" id="unit" name="unit" value="'.htmlspecialchars($nl[0]['donvitinh']).'" required>
                </div>
                <div class="form-group" style="position: relative;">
                    <label>Tên NCC</label>
                    <input type="text" id="supplierName" name="supplierName" value="'.htmlspecialchars($nl[0]['ten_ncc']).'" required>
                </div>
                <div class="form-group">
                    <label >SĐT NCC</label>
                    <input type="tel" id="supplierPhone" name="supplierPhone" value="'.htmlspecialchars($nl[0]['sodienthoai_ncc']).'" required>
                    <p id="errorsupplierphone"></p>
                </div>
                <div class="form-group">
                    <label>Email NCC</label>
                    <input type="email" id="supplierEmail" name="supplierEmail" value="'.htmlspecialchars($nl[0]['email_ncc']).'" required>
                    <p id="erroremail"></p>
                </div>
                <button type="submit" id="btn-update" class="btn-update" value="'.htmlspecialchars($_POST["edit"]).'">Sửa</button>
            </form>
        </div>';
    }

?>
<div id="confirmUpdate" class="modal" style="display: none;">
        <form action="" method="post">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h4>Xác nhận sửa nguyên liệu</h4>
                <p>Bạn có chắc muốn sửa nguyên liệu không?</p>
                <button onclick="confirm()" value="<?php echo $_POST["edit"]?>" name="confirm">Có</button>
                <button onclick="closeModal()">Không</button>
            </div>
        </form>
    </div>

    <script>
        const btnupdate = document.getElementById('btn-update');
        const confirmModel = document.getElementById('confirmUpdate');

        // Hiển thị modal xác nhận
        if (btnupdate) {
            btnupdate.onclick = function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định
                confirmModel.style.display = 'block';
            };
        }

        function closeModal() {
            confirmModel.style.display = 'none';

        }
        window.onclick = function(event) {
            if (event.target ===  confirmModel) {
                closeModal();
            }
        }
</script>
<?php
    if (isset($_POST['confirm'])) {
        include_once("controllers/cNguyenLieu.php");
        include_once("controllers/cLichSuCapNhat.php");
        
        $history_update = new clichsucapnhat();
        $nguyenlieu = new cNguyenLieu();
        
        // Làm sạch dữ liệu đầu vào để ngăn chặn SQL injection
        $unit = htmlspecialchars($_POST["unit"]);
        $supplierName = htmlspecialchars($_POST["supplierName"]);
        $supplierEmail = htmlspecialchars($_POST["supplierEmail"]);
        $supplierPhone = htmlspecialchars($_POST["supplierPhone"]);
        $price = htmlspecialchars($_POST["price"]);
        $ingredientId = htmlspecialchars($_POST["ingredientId"]);
        
        if ($nguyenlieu->updateNguyenLieu($unit, $supplierName, $supplierEmail, $supplierPhone, $price, $ingredientId)
            && $history_update->updateLichSuCapNhat($ingredientId, $supplierName, $supplierPhone, $supplierEmail, $price, $unit)) {
            
            echo 'window.location.href = "index.php?page=qlnlcuahang";</script>';
        }
    }
?>