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
<div class="sidebar">
    <form action=""  method="post">
        <h4>Trạng thái</h4>
            <a href=""><label><input type="checkbox" name="trangthai"> Đã duyệt</label></a>
            <a href=""><label><input type="checkbox" name="trangthai"> Chờ duyệt</label></a>
            
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
        <h4 style="color: #db5a04">DANH SÁCH NGUYÊN LIỆU</h4>
        <form action="" method="post">
            <table>
            <tr>
                <th>Mã NL</th>
                <th>Tên Nguyên Liệu</th>
                <th>Đơn vị tính</th>
                <th>Đơn giá (VND)</th>
                <th>Trạng thái</th>
                <th>Tùy Chọn</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Ức gà</td>
                <td>Kg</td>
                <td>100,000</td>
                <td>Đã duyệt</td>
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
                <td>Thịt bò</td>
                <td>Kg</td>
                <td>280,000</td>
                <td>Chờ duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Cá phi lê</td>
                <td>Kg</td>
                <td>300,000</td>
                <td>Đã duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Trứng gà</td>
                <td>Quả</td>
                <td>4,000</td>
                <td>Đã duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Khoai tây</td>
                <td>Kg</td>
                <td>20,000</td>
                <td>Đã duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>  
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Hành tây</td>
                <td>Kg</td>
                <td>35,000</td>
                <td>Đã duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Cà chua</td>
                <td>Kg</td>
                <td>30,000</td>
                <td>Đã duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Rau xà lách</td>
                <td>Kg</td>
                <td>25,000</td>
                <td>Đã duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Dưa leo</td>
                <td>Kg</td>
                <td>25,000</td>
                <td>Đã duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Đùi gà</td>
                <td>Kg</td>
                <td>120,000</td>
                <td>Chờ duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Ớt chuông</td>
                <td>Kg</td>
                <td>60,000</td>
                <td>Đã duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
                                <li><button class="edit" name="edit">sửa</button></li>
                            </ul>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Phô mai lát</td>
                <td>Kg</td>
                <td>150,000</td>
                <td>Đã duyệt</td>
                <td>
                    <div class="dropdown">
                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                            <ul type=none>
                                <li><button class="delete" name="delete">xóa</button></li>
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

