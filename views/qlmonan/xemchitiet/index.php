<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
    require_once("layout/navqlchuoi.php");
    
?>
<?php
if(isset($_POST["btn-detail"])){
    echo '<div class="container" id="ingredient-details">
        
        <div class="header">
            <span>Mã món: 1</span>
            <span>Mã cửa hàng: 1</span>
            <span><button class="close-btn" onclick="closeDetails()">✖</button></span>
        </div>
        
        <h3 style="color: #db5a04;">Chi tiết món ăn</h3>
        
        <div class="details">
            <div>
                <p>Tên món: Gà rán cay</p>
                <p>Loại món: Gà rán</p>
                <p>Tên nguyên liệu: Gà, bột.</p>
                <p>Đơn giá: 80,000VND</p>
                <p>Trạng thái: Hết</p>
            </div>
            <div>
                <p>Giảm giá: 0VND</p>
                <p>Mô tả: ...</p>
                <p>Công thức: ...</p>
            </div>
        </div>
    </div>';
}
?>
<?php
    if(isset($_POST["update"])){
        header("Location:index.php?page=qlmonan/capnhat");
    }
?>
<?php
    if(isset($_POST["add"])){
        echo 
        '<div class="container" id="ingredient-details">
            <div class="header">
                <span><button class="close-btn" onclick="closeDetails()">✖</button></span>
            </div>
            <h3 style="color: #db5a04;">Thêm món ăn</h3>
            <div class="themnguyenlieu">
                <div class="form-group">
                    <label for="name">Tên món ăn</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="unit">Loại món</label>
                    <input type="text" id="supplierName" name="supplierName" required>
                </div>
                <div class="form-group">
                    <label for="supplierName">Đơn giá</label>
                    <input type="text" id="supplierName" name="supplierName" required>
                </div>
                <div class="form-group">
                    <label for="supplierPhone">Nguyên liệu</label>
                    <input type="tel" id="supplierPhone" name="supplierPhone" required>
                </div>
                <div class="form-group">
                    <label for="supplierEmail">Công thức</label>
                    <input type="email" id="supplierEmail" name="supplierEmail" required>
                </div>
            </div>
            <button class="btn-add">Thêm</button>
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
        <h4 style="color: #db5a04">Quản lý món ăn</h4>
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
                <td>75,000</td>
                <td>Còn</td>
                <td><button class="btn-detail" name="btn-detail">Xem chi tiết</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Gà rán cay</td>
                <td>Gà rán</td>
                <td>80,000</td>
                <td>Hết</td>
                <td><button class="btn-detail">Xem chi tiết</button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Khoai tây chiên</td>
                <td>Khoai tây chiên</td>
                <td>30,000</td>
                <td>Ẩn</td>
                <td><button class="btn-detail">Xem chi tiết</button></td>
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
    function closeDetails() {
        document.getElementById("ingredient-details").style.display = "none";
    }
</script>
</html>
