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
    include_once("controllers/cKhoNguyenLieu.php");
    include_once("controllers/cCuaHang.php");
    $nguyenlieu = new cKhoNguyenLieu();
    $cuaHang = new cCuaHang();
    if (isset($_POST["btn-detail"])) {

        $list = $nguyenlieu->getNguyenLieuByMaNL_CH($_POST["btn-detail"]);
        echo '<form method = "post">
                <div class="container" id="ingredient">
                        
                    <div class="header">
                        <span>Mã nguyên liệu: ' . $list[0]["manl"] . '</span>
                        <span><button class="close-btn" onclick="closeAdd()">✖</button></span>
                    </div>
                    
                    <h3 style="color: #db5a04;">Chi tiết nguyên liệu</h3>
                    
                    <div class="details">
                        <div>
                            <p>Tên nguyên liệu: ' . $list[0]['tennl'] . '</p>
                            <p>Đơn vị tính: ' . $list[0]['donvitinh'] . '</p>
                            <p>Đơn giá: ' . $list[0]['dongia'] . ' VND</p>
                            <p>Trạng thái: ' . $list[0]['TinhTrang'] . '</p>
                        </div>
                        <div>
                            <p>Tên NCC: ' . $list[0]['ten_ncc'] . '</p>
                            <p>SDT nhà cung cấp: ' . $list[0]['sodienthoai_ncc'] . '</p>
                            <p>Email NCC: ' . $list[0]['email_ncc'] . '</p>
                            <p>Số lượng bổ sung: ' . $list[0]['SoLuongBoSung'] . '</p>
                        </div>
                    </div>';

                if ($list[0]['TinhTrang'] == "Hết hàng") {
                echo '<button class="btn-approve" name="btn-approve" value="' . $list[0]['NLCH_ID'] . '">Đề xuất</button>';
                }
            echo '</div>';
        echo '</form>';
    }
    if  (isset($_POST["btn-approve"])) {
       $nguyenlieu->updateTinhTrangNguyenLieu($_POST["btn-approve"], 'Chờ duyệt');
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
                <?php
                    include_once ('controllers/cNguoiDung.php');
                    include_once ('controllers/cKhoNguyenLieu.php');
                    $nguyenlieu = new cKhoNguyenLieu();
                    $nguoidung = new cNguoiDung();
                    if(isset($_SESSION['dangnhap'])){
                        $taikhoan = $nguoidung->getNguoiDungByID($_SESSION["dangnhap"]);
                        $mach = $taikhoan[0]['mach'];
                        $dsnl = $nguyenlieu-> getNguyenLieuByMaCH($mach);
                        foreach($dsnl as $i){
                            echo 
                            '
                            <tr>
                                <td>'.$i["manl"].'</td>
                                <td>'.$i["tennl"].'</td>
                                <td>'.$i["donvitinh"].'</td>
                                <td>'.$i["dongia"].'</td>
                                <td>'.$i["TinhTrang"].'</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="option" style="text-decoration: none;">Tùy chọn <i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown-content" style="background-color: white; min-width: 30px; border-radius: 10px; border: 1px solid black;  ">
                                            <ul type=none>
                                                <li><button class="edit" name="add" value="'.$i['NLCH_ID'].'">Nhập nguyên liệu</button></li>
                                                <li><button class="edit" name="btn-detail" value="'.$i['NLCH_ID'].'">Xem chi tiêt</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                            ';
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
    function closeAdd(){
        document.getElementById("ingredient").style.display = "none";
    }
</script>
</html>

