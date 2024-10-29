<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
    echo require("layout/navqlchuoi.php");
?>
<div class="sidebar">
    <form action=""  method="post">
        <h3>Cửa hàng</h3>
            <div>
                <a href=""><label><input type="checkbox" name="cuahang1" value="1"> Cửa hàng 1</label></a>
                <a href=""><label><input type="checkbox" name="cuahang2" value="2"> Cửa hàng 2</label></a>
                <a href=""><label><input type="checkbox" name="cuahang3" value="3"> Cửa hàng 3</label></a>
                <a href=""><label><input type="checkbox" name="cuahang4" value="4"> Cửa hàng 4</label></a>
                <a href=""><label><input type="checkbox" name="cuahang5" value="5"> Cửa hàng 5</label></a>
            </div>
        <h3>Thời gian</h3>
        <div>
            <label>Từ:</label>
            <input type="date" value="getdate()" class="date-input">
            <label>Đến:</label>
            <input type="date" value="getdate()" class="date-input">
        </div>
    </form>
</div>
    <div style="margin-left: 210px; padding: 20px;" class="content">
        <div class="table-material">
            <h3>Thống kê nguyên liệu</h3>
            <form action="" method="post">
                <table>
                    <tr>
                        <th>MãNL</th>
                        <th>Tên Nguyên Liệu</th>
                        <th>Đơn vị tính</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Ức gà</td>
                        <td>Kg</td>
                        <td>100,000</td>
                        <td>5</td>
                        <td>200000</td>
                    </tr>
                </table>
            </form>
            <div class="pagination">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">Tiếp theo</a>
            </div>
        </div>
        <div>
            <h3>Sơ đồ so sánh các cửa hàng</h3>
            <div class="chart">
                
            </div>
        </div>
    </div>

</body>

</html>

