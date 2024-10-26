<!-- Sidebar -->
<?php
    require("layout/navqlchuoi.php");
?>
<div class="sidebar">
    <form action="post">
        <h4>Trạng thái</h4>
            <a href=""><label><input type="checkbox" name="trangthai"> Đã duyệt</label></a>
            <a href=""><label><input type="checkbox" name="trangthai"> Chờ duyệt</label></a>
            
        <h4>Cửa hàng</h4>
            <a href=""><label><input type="checkbox" name="cuahang" value="1"> Cửa hàng 1</label></a>
            <a href=""><label><input type="checkbox" name="cuahang" value="2"> Cửa hàng 2</label></a>
            <a href=""><label><input type="checkbox" name="cuahang" value="3"> Cửa hàng 3</label></a>
            <a href=""><label><input type="checkbox" name="cuahang" value="4"> Cửa hàng 4</label></a>
            <a href=""><label><input type="checkbox" name="cuahang" value="5"> Cửa hàng 5</label></a>
            <button class="themmoi" name="themmoi">Thêm mới</button>
            <button class="capnhat" namen="capnhat">Cập nhật</button>

    </form>
</div>
    <div style="margin-left: 210px; padding: 20px;" class="content">
        <h4 style="color: #db5a04">Quản lý đơn hàng</h4>
        <form action="post">
            <table>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <th>Tùy Chọn</th>
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
</html>

