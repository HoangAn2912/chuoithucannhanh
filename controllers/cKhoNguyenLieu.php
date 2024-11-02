<?php
include_once("models/mKhoNguyenLieu.php");

class cKhoNguyenLieu {
    public function getNguyenLieu() {

        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu();
        return $DanhSachNL;
    }

    public function getNguyenLieuByMaCH($mach) {

        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieuByMaCH($mach);
        return $DanhSachNL;
    }

    public function getNguyenLieuByTT($tinhtrang) {

        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieuByTT($tinhtrang);
        return $DanhSachNL;
    }
    public function getNguyenLieuByMaCH_TT($mach , $tinhtrang) {

        $nguyenlieu = new mKhoNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieuByMaCH_TT($mach, $tinhtrang);
        return $DanhSachNL;
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
                echo '<td><button class="btn-detail" name="btn-detail">Xem chi tiết</button></td>';
                echo '</tr>';
            }
        }
    }
}
?>