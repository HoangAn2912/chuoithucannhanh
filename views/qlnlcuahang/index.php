<!-- Sidebar -->
<?php
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
if (!isset($_SESSION['mavaitro']) || $_SESSION['mavaitro'] != 2) {
    header("Refresh: 0; url=index.php"); 
    exit();
}
    echo '<link rel="stylesheet" href="css/QLNL/ql.css">';
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script src="js/js_quanlynguyenlieu/qlnl.js?v=1.0"></script>';
    require_once('layout/navqlch.php');
    include_once("views/qlnlcuahang/vqlnl.php");
?>
<div class="sidebar">
    <form action="" method="post">
        <h4>Trạng thái</h4>
            <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Đã duyệt"> Đã duyệt <br>
            <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Chờ duyệt"> Chờ duyệt <br>
            <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Hết hàng"> Hết hàng <br>
            <input type="checkbox" style ="margin-bottom: 30px;" name="trangthai[]" value= "Còn hàng"> Còn hàng <br>
        <button type="submit" class ="filter" name="filter">Lọc</button>
    </form>
</div>
    <div style="margin-left: 210px; padding: 20px;" class="content">

        <h1 style="color: #db5a04; display: flex; justify-content: center; align-items: center; ">DANH SÁCH NGUYÊN LIỆU</h1>
        <form action="" method="post" style ="display: flex; align-items: center; justify-content: center; margin: 20px; ">
            <button type="submit" name="" style ="margin: 10px;" class ="filter"><a href="index.php?page=qlnlcuahang/taodanhsachdexuat" style ="text-decoration:none; color: white;">Tạo danh sách đề xuất</a></button>
            <button type="submit" name="" style ="margin: 10px;" class ="filter"><a href="index.php?page=qlnlcuahang/taodonnhaphang" style ="text-decoration:none; color: white;">Tạo danh sách nhập kho</a></button>
        </form>
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
                        if($DS){
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
                                        <td>'.number_format($r['dongia'], 0, ',', '.') .'</td>
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
                    }else{
                        echo '<tr><td colspan="8">Không có dữ liệu</td></tr>';
                    }
                        
                ?> 
                </table>
            </form>
        </div>
    </div>
</body>
</html>

