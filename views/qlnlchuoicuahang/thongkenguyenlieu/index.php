<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
    echo require("layout/navqlchuoi.php");
?>
<div class="sidebar">
    <form action=""  method="post">
        <h3>Cửa hàng <button type="submit" style ="background-color: rgba(0, 0, 0, 0); border: none; color: white" name="filter"><i class="fas fa-filter" style="margin-left: 80px;"></i></button></h3>
            <div>
                <?php
                    include_once("controllers/cCuaHang.php");
                    $cuaHang = new cCuaHang();
                    $DScuaHang = $cuaHang->getCuaHang();
                    foreach($DScuaHang as $i){
                        echo '<input style ="margin-bottom: 30px;" type="checkbox" name="cuahang[]" value="'.$i['mach'].'"> '.$i['tench'].'<br>';
                    }
                ?>
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