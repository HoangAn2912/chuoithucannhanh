<?php
    echo '<link rel="stylesheet" href="css/QLNL/ql.css">';
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script src="js/js_quanlynguyenlieu/quanlynguyenlieu.js?v=1.0"></script>';
    require_once('layout/navqlch.php');
    include_once("views/qlnlcuahang/vqlnl.php");
?>
<?php
    include_once('controllers/cKhoNguyenLieu.php');
    $nguyenlieu = new cKhoNguyenLieu();
    $history = new cLichSuNhapKho();               
    if (isset($_POST['nhapkho'])) {
        // Lấy danh sách số lượng nhập từ form
        $soluongNhap = $_POST['soluong'];

        if (!empty($soluongNhap)) {
            foreach ($soluongNhap as $manl => $soluong) {
                $nl = $nguyenlieu->getNguyenLieuByMaNL_CH($manl);
                if( $history ->updatehistory ($soluong,  $manl) && $nguyenlieu->updatequantity($soluong, $manl) && ($nguyenlieu->updateTinhTrangNguyenLieu($manl, 'Còn hàng'))){
                        echo 'window.location.href = "index.php?page=qlnlcuahang';
                }else{
                    echo '<script>
                            alert("Vui lòng nhập '.$nl[0]["tennl"].' đúng số lượng đã đề xuất là: ' . $nl[0]['SoLuongBoSung'] . '");
                            window.location.href = "index.php?page=qlnlcuahang/taodonnhaphang";
                          </script>';
                } 
            }
        } else {
            echo '<script>
                    alert("Không có nguyên liệu nào được nhập");
                    window.location.href = "index.php?page=qlnlcuahang/taodonnhaphang";
                    </script>';
        }
    
    }
?>
    <div class="content">
        <form action="" method="post">
            <h1 style="color: #db5a04; display: flex; justify-content: center; align-items: center; ">NHẬP NGUYÊN LIỆU</h1>
                <button type="submit" name="" style ="margin: 10px;" class ="filter"><a href="index.php?page=qlnlcuahang" style ="text-decoration:none; color: white;">Quay lại</a></button>
                <button type="submit" name="nhapkho" style ="margin: 10px;" class ="filter">Nhập kho</button>
            <div class="table-material">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <th>Mã NL</th>
                            <th>Hình ảnh</th>
                            <th>Tên Nguyên Liệu</th>
                            <th>Đơn giá (VND)</th>
                            <th>Số lượng</th>
                            <th>Đơn vị tính</th>
                            <th>Trạng thái</th>
                        </thead>
                        <?php
                            include_once ('controllers/cNguoiDung.php');
                            include_once ('controllers/cKhoNguyenLieu.php');
                            $nguyenlieu = new cKhoNguyenLieu();
                            $nguoidung = new cNguoiDung();
                            if(isset($_SESSION['dangnhap'])){
                                $taikhoan = $nguoidung->getNguoiDungByID($_SESSION["dangnhap"]);
                                $mach = $taikhoan[0]['mach'];
                                $DS = $nguyenlieu->getNguyenLieuByMaCH_TT($mach , "Đã duyệt");
                                if($DS){
                                    foreach($DS as $r) {
                                        echo 
                                        '
                                        <tr>
                                            <td>'.$r["manl"].'</td>
                                            <td><img src="image/'.$r['hinh'].'" width="50" height="50"></td>
                                            <td>'.$r["tennl"].'</td>
                                            <td>'.number_format($r['dongia'], 0, ',', '.') .'</td>
                                            <td><input type="number" name="soluong['.$r['NLCH_ID'].']"></td>
                                            <td>'.$r["donvitinh"].'</td>
                                            <td>'.$r["TinhTrang"].'</td>
                                        </tr>
                                        ';
                                    }
                                }else{
                                        echo '<tr><td colspan="8"> Không có nguyên liệu chờ nhập </td></tr>';
                                }
                                
                            }   
                        ?> 
                    </table>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

