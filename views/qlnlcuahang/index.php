<!-- Sidebar -->
<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
    require_once('layout/navqlch.php');
    include_once("views/qlnlcuahang/vqlnl.php");
?>
<div class="sidebar">
    
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
                    $ketnoi = new ketnoi();
                    $conn = $ketnoi->ketnoi();
                    if(isset($_SESSION['dangnhap'])){
                        $taikhoan = $nguoidung->getNguoiDungByID($_SESSION["dangnhap"]);
                        $mach = $taikhoan[0]['mach'];
                        $sql =
                        "SELECT * FROM khonguyenlieu k
                        JOIN nguyenlieu n ON k.manl = n.manl
                        WHERE k.mach = '$mach'";
                        $nl = $conn->query($sql);
                        if ($nl && $nl->num_rows > 0) {
                            while ($r = $nl->fetch_assoc()) {
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
                                                if ($r['TinhTrang'] == "Hết hàng" || $r['SoLuongHienCo'] <= "10" || $r['TinhTrang'] != "Chờ duyệt") {
                                                    echo '<button class="edit" name="btn-approve" value="' . $r['NLCH_ID'] . '">Đề xuất</button>';
                                                } else {
                                                    if ($r['TinhTrang'] == "Đã duyệt") {
                                                        echo '<button class="edit" name="add" value="' . $r['NLCH_ID'] . '">Nhập nguyên liệu</button>';
                                                    }
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
<script>
    function closeIgredient(){
        document.getElementById("ingredient").style.display = "none";
    }
</script>
</html>

