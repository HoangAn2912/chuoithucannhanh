<?php
include_once("models/mKhoNguyenLieu.php");

class cKhoNguyenLieu {
    public function getNguyenLieu() {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function getNguyenLieuByMaCH($mach) {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl  WHERE mach = '$mach'";
        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
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

    public function getNguyenLieuByDate($dateFrom, $dateTo){
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu  as n on k.manl=n.manl  WHERE NgayNhap BETWEEN '$dateFrom' AND  '$dateTo'";
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

    public function getNguyenLieuByDate_MaCH($dateFrom, $dateTo, $mach){
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu  as n on k.manl=n.manl  WHERE NgayNhap BETWEEN '$dateFrom' AND  '$dateTo' AND  mach = '$mach'";

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

    public function updateTinhTrangNguyenLieu($manlch, $tinhtrang){
        $sql = "UPDATE khonguyenlieu SET TinhTrang = '$tinhtrang' WHERE NLCH_ID  = '$manlch'";
        $nguyenlieu = new mKhoNguyenLieu();
        return $nguyenlieu->updateNguyenLieu($sql);
    }

    public function getDistinctIngredients() {
        $sql = "SELECT DISTINCT n.manl, n.tennl FROM nguyenlieu n JOIN khonguyenlieu k ON n.manl = k.manl ORDER BY n.tennl";
        $nguyenlieu = new mKhoNguyenLieu();
        return $nguyenlieu->selectNguyenLieu($sql);
    }

    public function getIngredientQuantityByStoreAndMonth($store, $ingredientId, $month) {
        $sql = "SELECT COALESCE(SUM(SoLuongNhapKho), 0) as quantity 
                FROM khonguyenlieu 
                WHERE mach = '$store' 
                AND manl = '$ingredientId' 
                AND MONTH(NgayNhap) = $month 
                AND YEAR(NgayNhap) = YEAR(CURDATE())";
        $nguyenlieu = new mKhoNguyenLieu();
        $result = $nguyenlieu->selectNguyenLieu($sql);
        return $result[0]['quantity'] ?? 0;
    }
    public function getIngredientQuantityByStoreAndWeek($store, $ingredientId, $month) {
        $sql = "SELECT WEEK(NgayNhap, 1) as week, COALESCE(SUM(SoLuongNhapKho), 0) as quantity 
                FROM khonguyenlieu 
                WHERE mach = '$store' 
                AND manl = '$ingredientId' 
                AND MONTH(NgayNhap) = $month 
                AND YEAR(NgayNhap) = YEAR(CURDATE())
                GROUP BY week
                ORDER BY week";
        $nguyenlieu = new mKhoNguyenLieu();
        return $nguyenlieu->selectNguyenLieu($sql);
    }
    public function displayNguyenLieu($DS) {
        if (empty($DS)) {
            echo '<tr><td colspan="7">Không có dữ liệu</td></tr>';
        } else {
            foreach ($DS as $j) {
                echo '<tr>';
                echo '<td>'.$j['mach'].'</td>';
                echo '<td>'.$j['manl'].'</td>';
                echo '<td>'.$j['tennl'].'</td>';
                echo '<td>'.$j['donvitinh'].'</td>';
                echo '<td>'.$j['dongia'].'</td>';
                echo '<td>'.$j['TinhTrang'].'</td>';
                echo '<td><button class="btn-detail" name="btn-detail" value="'.$j['NLCH_ID'].'">Xem chi tiết</button></td>';
                echo '</tr>';
            }
        }
    }
}
?>