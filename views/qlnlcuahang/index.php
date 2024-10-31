<!-- Sidebar -->
<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
    require_once('layout/navqlch.php');
?>
<?php
    if(isset($_POST["add"])){
        echo 
        '<div class="container" id="ingredient">
            <div class="header">
                <span><button class="close-btn" onclick="closeAdd()">✖</button></span>
            </div>
            <h3 style="color: #db5a04;">Thêm nguyên liệu</h3>
            <div class="themnguyenlieu">
                <div class="form-group">
                    <label for="name">Số lượng</label>
                    <input type="number" id="" name="quality" required>
                </div>
                <div class="form-group">
                    <label for="unit">Đơn giá</label>
                    <input type="number" id="" name="quality" required>
                </div>
            </div>
            <button class="btn-add">Nhập</button>
        </div>';
    }
?>
<?php
    if(isset($_POST["btn-detail"])){
        echo '<div class="container" id="ingredient">
            
            <div class="header">
                <span>Mã nguyên liệu: 2</span>
                <span>Mã cửa hàng: 1</span>
                <span><button class="close-btn" onclick="closeAdd()">✖</button></span>
            </div>
            
            <h3 style="color: #db5a04;">Chi tiết nguyên liệu</h3>
            
            <div class="details">
                <div>
                    <p>Tên nguyên liệu: thịt bò</p>
                    <p>Đơn vị tính: kg</p>
                    <p>Đơn giá: 280,000VND</p>
                    <p>Trạng thái: chờ duyệt</p>
                </div>
                <div>
                    <p>Tên NCC: tươi sống</p>
                    <p>SDT nhà cung cấp: 012345678</p>
                    <p>Email NCC: abc@gmail.com</p>
                    <p>Số lượng bổ sung: 20</p>
                </div>
            </div>
            
            <button class="btn-approve">Duyệt</button>
        </div>';
    }
?>
<div class="sidebar">
    
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li> 
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
                                    <li><button class="edit" name="add">Nhập nguyên liệu</button></li>
                                    <li><button class="edit" name="btn-detail">Xem chi tiêt</button></li>
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
    </div>
</body>
<script>
    function closeAdd(){
        document.getElementById("ingredient").style.display = "none";
    }
</script>
</html>

