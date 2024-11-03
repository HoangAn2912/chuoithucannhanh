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

    public function updateTinhTrangNguyenLieu($manlch, $tinhtrang){
        $sql = "UPDATE khonguyenlieu SET TinhTrang = '$tinhtrang' WHERE NLCH_ID  = '$manlch'";
        $nguyenlieu = new mKhoNguyenLieu();
        return $nguyenlieu->updateNguyenLieu($sql);
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