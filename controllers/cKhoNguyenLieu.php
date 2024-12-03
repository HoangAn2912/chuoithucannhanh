<?php
include_once("models/mKhoNguyenLieu.php");

class cKhoNguyenLieu {
    public function getDistanctNguyenLieu() {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function getNguyenLieu() {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl join lichsunhapkho as l on k.NLCH_ID =l.StoreIngredientID";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function getDistanctNguyenLieuByMaCH($mach) {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl WHERE mach = '$mach'";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }
    
    public function getNguyenLieuByMaCH($mach) {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl join lichsunhapkho as l on k.NLCH_ID =l.StoreIngredientID WHERE mach = '$mach'";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function getNguyenLieuByDate($dateFrom, $dateTo){
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu  as n on k.manl=n.manl join lichsunhapkho as l on k.NLCH_ID =l.StoreIngredientID  WHERE ngaynhapkho BETWEEN '$dateFrom' AND  '$dateTo'";
        $nguyenlieu = new mKhoNguyenLieu();
        $date = new DateTime();
        if(!$dateFrom||!$dateTo||$dateFrom > $date ||  $dateTo < $dateFrom ){
            echo '<script> alert("vui long  nhap ngay nhap va ngay het hop le") </script>';
            return false;
        }else{
            $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
            return $DanhSachNL;
        }
        
    }

    public function getNguyenLieuByMaNL($manl) {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl join lichsunhapkho as l on k.NLCH_ID =l.StoreIngredientID  WHERE n.manl = '$manl'";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function getNguyenLieuByMaCHandMaNL($mach, $manl){
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl join lichsunhapkho as l on k.NLCH_ID =l.StoreIngredientID WHERE n.manl = '$manl' and mach = '$mach';";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function getNguyenLieuByDate_MaCH($dateFrom, $dateTo, $mach){
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu  as n on k.manl=n.manl join lichsunhapkho as l on k.NLCH_ID =l.StoreIngredientID  WHERE ngaynhapkho BETWEEN '$dateFrom' AND  '$dateTo' AND  mach = '$mach'";

        $nguyenlieu = new mKhoNguyenLieu();
        $dateFromObj = new DateTime($dateFrom);
        $dateToObj = new DateTime($dateTo);
        $currentDate = new DateTime();
        if ($dateFromObj > $currentDate || $dateToObj < $dateFromObj) {
            echo '<script>alert("Vui lòng nhập ngày nhập và ngày hết hợp lệ.")</script>';
            return false;
        }else{
            $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
            return $DanhSachNL;
        }
        
    }

    public function getNguyenLieuByDateandMaNL($ingredient, $dateFrom, $dateTo){
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu  as n on k.manl=n.manl join lichsunhapkho as l on k.NLCH_ID =l.StoreIngredientID  WHERE ngaynhapkho BETWEEN '$dateFrom' AND  '$dateTo' AND n.manl = '$ingredient'";
        $nguyenlieu = new mKhoNguyenLieu();
        $date = new DateTime();
        if(!$dateFrom||!$dateTo||$dateFrom > $date ||  $dateTo < $dateFrom ){
            echo '<scrip> alert("vui long  nhap ngay nhap va ngay het hop le") </script>';
            return false;
        }else{
            $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
            return $DanhSachNL;
        }
    }

    public function getNguyenLieuByDate_MaCH_MaNL($dateFrom, $dateTo, $mach ,$ingredient){
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu  as n on k.manl=n.manl join lichsunhapkho as l on k.NLCH_ID =l.StoreIngredientID WHERE ngaynhapkho BETWEEN '$dateFrom' AND  '$dateTo' AND n.manl = '$ingredient' and mach = '$mach'";
        $nguyenlieu = new mKhoNguyenLieu();
        $date = new DateTime();
        if(!$dateFrom||!$dateTo||$dateFrom > $date ||  $dateTo < $dateFrom ){
            echo '<scrip> alert("vui long  nhap ngay nhap va ngay het hop le") </script>';
            return false;
        }else{
            $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
            return $DanhSachNL;
        }
    }

    public function getNguyenLieuByTT($tinhtrang) {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl  WHERE TinhTrang = '$tinhtrang'";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function getNguyenLieuByMaCH_TT($mach , $tinhtrang) {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl  WHERE mach = '$mach' and TinhTrang = '$tinhtrang'";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function getNguyenLieuByMaNL_CH($manlch) {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl  WHERE NLCH_ID = '$manlch'";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function updateTinhTrangNguyenLieu($manlch, $tinhtrang){
        $sql = "UPDATE khonguyenlieu SET TinhTrang = '$tinhtrang' WHERE NLCH_ID  = '$manlch'";
        $nguyenlieu = new mKhoNguyenLieu();
        return $nguyenlieu->updateNguyenLieu($sql);
    }

    public function displayNguyenLieu($DS) {
        if (empty($DS)) {
            echo '<tr><td colspan="8">Không có dữ liệu</td></tr>';
        } else {
            foreach ($DS as $j) {
                if ($j['trangthai'] !== 'Đã xóa') {
                    echo '<tr>';
                    echo '<td>'.$j['mach'].'</td>';
                    echo '<td>'.$j['manl'].'</td>';
                    echo '<td><img src="image/'.$j['hinh'].'" width="50" height="50"></td>';
                    echo '<td>'.$j['tennl'].'</td>';
                    echo '<td>'.$j['donvitinh'].'</td>';
                    echo '<td>'.number_format($j['dongia'], 0, ',', '.') . '</td>';
                    echo '<td>'.$j['TinhTrang'].'</td>';
                    echo '<td><button class="btn-detail" name="btn-detail" value="'.$j['NLCH_ID'].'">Xem chi tiết</button></td>';
                    echo '</tr>';
                }
            }
        }
    }

    public function updatequantity($soluongnhap, $id){
        $sql = "UPDATE khonguyenlieu SET SoLuongHienCo = SoLuongHienCo + $soluongnhap, NgayNhap = CURRENT_TIMESTAMP, SoLuongBoSung= 0 WHERE NLCH_ID ='$id'";
        $nguyenlieu = new mKhoNguyenLieu();
        if($nguyenlieu->updateNguyenLieu($sql)){
            echo '<script>
                    alert("Cập nhật thành công");
                    window.location.href = "index.php?page=qlnlcuahang";
                  </script>';
            return true;
        } else {
            echo '<script>
                    alert("Cập nhật thất bại");
                    window.location.href = "index.php?page=qlnlcuahang";
                  </script>';
            return false;
        }
    }

    public function addNguyenLieu($manl,$mach){
        $sql = "INSERT INTO khonguyenlieu (mach, manl) VALUES ('$mach', '$manl')";
        $nguyenlieu = new mKhoNguyenLieu();
        return $nguyenlieu->insertNguyenLieu($sql);
    }
    public function updatequantityadd($soluongbosung, $id){
        $sql = "UPDATE khonguyenlieu SET SoLuongBoSung = $soluongbosung WHERE NLCH_ID ='$id'";
        $nguyenlieu = new mKhoNguyenLieu();
        if($nguyenlieu->updateNguyenLieu($sql)){
            $this->updateTinhTrangNguyenLieu( $id, 'Chờ duyệt');
            echo '<script>
                    alert("Đề xuất thành công");
                    window.location.href = "index.php?page=qlnlcuahang";
                  </script>';
            return true;
        } else {
            echo '<script>
                    alert("Đề xuất thất bại thất bại");
                    window.location.href = "index.php?page=qlnlcuahang";
                  </script>';
            return false;
        }
    }
}
?>