<!-- Sidebar -->
<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
    require("layout/navqlchuoi.php");
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
                    <label for="unit">Loại món</label>
                    <input type="text" id="supplierName" name="supplierName" required>
                    </select>
                </div>
                <div class="form-group">
                    <label for="supplierName">Đơn giá</label>
                    <input type="text" id="supplierName" name="supplierName" required>
                </div>
                <div class="form-group">
                    <label for="supplierPhone">Công thức</label>
                    <input type="tel" id="supplierPhone" name="supplierPhone" required>
                </div>
                <div class="form-group">
                    <label for="supplierEmail">Nguyên liệu</label>
                    <input type="email" id="supplierEmail" name="supplierEmail" required>
                </div>
            </div>
            <button class="btn-update">Sửa</button>
        </div>';
    }
?>
<div class="sidebar">
    <form action=""  method="post">
        <h4>Trạng thái</h4>
            <a href=""><label><input type="checkbox" name="trangthai"> Còn</label></a>
            <a href=""><label><input type="checkbox" name="trangthai"> Hết</label></a>
            <a href=""><label><input type="checkbox" name="trangthai"> Ẩn</label></a>
            
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
        <form action="" method="post">
            <table>
            <tr>
                <th>Mã MA</th>
                <th>Tên Món Ăn</th>
                <th>Loại món</th>
                <th>Đơn giá (VND)</th>
                <th>Trạng thái</th>
                <th>Tùy Chọn</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Gà rán giòn</td>
                <td>Gà rán</td>
                <td>76,000</td>
                <td>Còn</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete" onclick="return confirm('Ban co chac muon xoa sp nay khong?')" type="submit">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Gà rán cay</td>
                <td>Gà rán</td>
                <td>80,000</td>
                <td>Hết</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete" onclick="return confirm('Ban co chac muon xoa sp nay khong?')" type="submit">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            
                <!-- Add more rows as needed -->
            </table>
        </form>
        <div class="pagination">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">Tiếp theo</a>
        </div>
    </div>
</body>
<script>
    function closeUpdates() {
        document.getElementById("ingredient").style.display = "none";
    }
</script>
</html>

