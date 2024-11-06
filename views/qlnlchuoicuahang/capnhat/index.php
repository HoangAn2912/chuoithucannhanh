<!-- Sidebar -->
<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
    require_once('layout/navqlchuoi.php');
?>
<?php
    if(isset($_POST["edit"])){
        echo 
        '<div class="container" id="ingredient">
            <div class="header">
                <span><button class="close-btn" onclick="closeUpdates()">✖</button></span>
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
<?php
    include_once("controllers/cNguyenLieu.php");
    $nguyenlieu = new cNguyenLieu();
    if(isset($_POST["add"])){
        echo 
        '<form method="post">
            <div class="container" id="ingredient">
                <div class="header">
                    <span><button class="close-btn" onclick="closeUpdates()">✖</button></span>
                </div>
                <h3 style="color: #db5a04;">Thêm nguyên liệu</h3>
                <div class="themnguyenlieu">
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

        $nguyenlieu->addNguyenLieu($name, $donvitinh, $supplierName, $supplierEmail, $supplierPhone);
    }
?>
<div class="sidebar">
    <form action=""  method="post">
        <button class="add" name="add">Thêm mới</button>
        <button class="update" name="update">Cập nhật</button>

    </form>
</div>
    <div style="margin-left: 210px; padding: 20px;" class="content">
        <h4 style="color: #db5a04">DANH SÁCH NGUYÊN LIỆU</h4>
        <div class="table-material">
            <form action="" method="post">
                <table>
                    <tr>
                        <th>Mã NL</th>
                        <th>Tên Nguyên Liệu</th>
                        <th>Đơn vị tính</th>
                        <th>Đơn giá (VND)</th>
                        <th>Tùy Chọn</th>
                    </tr>
                    <?php
                        include_once("controllers/cNguyenLieu.php");
                        $nguyenlieu = new cNguyenLieu ();
                        $DSNguyelieu=$nguyenlieu->getNguyenLieu();
                        echo '<tr>';
                        if($DSNguyelieu){
                            foreach($DSNguyelieu as $i){
                                echo '<td>'.$i['manl'].'</td>';
                                echo '<td>'.$i['tennl'].'</td>';
                                echo '<td>'.$i['donvitinh'].'</td>';
                                echo '<td>'.$i['dongia'].'</td>';
                                
                                echo '<td>';
                                echo '<div class="dropdown">';
                                    echo '<a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>';
                                    echo '<div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">';
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
            </form>
            <div class="pagination">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">Tiếp theo</a>
            </div>
        </div>
    </div>
</body>
<script>
    function closeUpdates() {
        document.getElementById("ingredient").style.display = "none";
    }
</script>
</html>

