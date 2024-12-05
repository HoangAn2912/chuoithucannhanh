<!-- Sidebar -->
<?php
    echo '<link rel="stylesheet" href="css/QLNL/ql.css">';
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script src="js/js_quanlynguyenlieu/quanlynguyenlieu.js?v=1.0"></script>';
    require_once('layout/navqlch.php');
    include_once("views/qlnlcuahang/vqlnl.php");
?>
<div class="sidebar">
    <form action="" method="post">
        <h4>Trạng thái <button type="submit" style ="background-color: rgba(0, 0, 0, 0); border: none; color: white" name="filter"><i class="fas fa-filter" style="margin-left: 80px;"></i></button></h4>
            <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Đã duyệt"> Đã duyệt <br>
            <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Chờ duyệt"> Chờ duyệt <br>
            <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Hết hàng"> Hết hàng <br>
            <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Còn hàng"> Còn hàng
    </form>
</div>
    <div style="margin-left: 210px; padding: 20px;" class="content">
        <h4 style="color: #db5a04">DANH SÁCH NGUYÊN LIỆU</h4>
        <div class="table-material">
            <form action="" method="post"  class="table-wrapper">
                <table>
                <thead>
                    <th>Mã NL</th>
                    <th>Hình ảnh</th>
                    <th>Tên Nguyên Liệu</th>
                    <th>Số lượng</th>
                    <th>Đơn vị tính</th>
                    <th>Đơn giá (VND)</th>
                    <th>Trạng thái</th>
                    <th>Tùy Chọn</th>
                </thead>
                <?php
                    include_once ('controllers/cNguoiDung.php');
                    include_once ('controllers/cKhoNguyenLieu.php');
                    $nguyenlieu = new cKhoNguyenLieu();
                    $nguoidung = new cNguoiDung();
                    $DS = array();
                    if(isset($_SESSION['dangnhap'])){
                        $taikhoan = $nguoidung->getNguoiDungByID($_SESSION["dangnhap"]);
                        $mach = $taikhoan[0]['mach'];
                        if (isset($_POST["trangthai"]) && isset($_POST["filter"])) {
                            foreach ($_POST["trangthai"] as $t) {
                                $DS = array_merge($DS, $nguyenlieu->getNguyenLieuByMaCH_TT($mach , $t));
                            }
                        }else{
                            $DS = $nguyenlieu->getDistanctNguyenLieuByMaCH($mach);
                        }
                        foreach($DS as $r) {
                                if ($r['trangthai'] !== 'Đã xóa') {
                                    echo 
                                    '
                                    <tr>
                                        <td>'.$r["manl"].'</td>
                                        <td><img src="image/'.$r['hinh'].'" width="50" height="50"></td>
                                        <td>'.$r["tennl"].'</td>
                                        <td>'.$r["SoLuongHienCo"].'</td>
                                        <td>'.$r["donvitinh"].'</td>
                                        <td>'.$r["dongia"].'</td>
                                        <td>'.$r["TinhTrang"].'</td>
                                        <td>
                                            <div class="dropdown">
                                                <span>Tùy chọn <i class="fas fa-caret-down"></i></span>
                                                <div class="dropdown-menu">';
                                                    if ($r['TinhTrang'] == "Đã duyệt") {
                                                        echo '<button class="edit" name="add" value="' . $r['NLCH_ID'] . '">Nhập nguyên liệu</button>';
                                                    }
                                                    else if ($r['TinhTrang'] == "Hết hàng" || $r['SoLuongHienCo'] <= "10") {
                                                        echo '<button class="edit" name="btn-approve" value="' . $r['NLCH_ID'] . '">Đề xuất</button>';
                                                    } 
                                                    echo'
                                                    <button class="edit" name="btn-detail" value="'.$r['NLCH_ID'].'">Xem chi tiết</button>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    ';
                                }
                            }   
                        }
                ?> 
                </table>
            </form>
        </div>
    </div>
</body>
</html>

