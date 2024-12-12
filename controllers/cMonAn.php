<?php
error_reporting(0);
include_once("models/mMonAn.php");

class cMonAn {
    public function getMonAn() {
        $sql = "SELECT * FROM monan";
        $monan = new mMonAn();

        $DanhSachMA = $monan->selectMonAn($sql);
        return $DanhSachMA;
    }
    public function displayMonAn($DS) {
        if (empty($DS)) {
            echo '<tr><td colspan="7">Không có dữ liệu</td></tr>';
        } else {
            foreach ($DS as $j) {
                echo '<tr>';
             
                echo '<td>'.$j['mama'].'</td>';
                echo '<td><img src="img/'.$j['hinhanh'].'" width="50" height="50"></td>';    
                echo '<td>'.$j['tenma'].'</td>';
                echo '<td>'.$j['maloaima'].'</td>';
                echo '<td>'.$j['giaban'].'</td>';
                echo '<td>'.$j['trangthai'].'</td>';
                echo '<td><button class="btn-detail" name="btn-detail" value="'.$j['mama'].'">Xem chi tiết</button></td>';
                echo '</tr>';
            }
        }
    }
    public function getMonAnByMaMonAn($mama) {
        $sql = "SELECT * FROM monan WHERE mama = '$mama'";
        $monan = new mMonAn();
        $DanhSachMA = $monan->selectMonAn($sql);
        return $DanhSachMA;
    }
    
    public function AddMonAn($name, $loai, $gia, $dinhluong, $hinhanh) {
        $sql = "INSERT INTO monan(tenma, maloaima, giaban, dinhluong, hinhanh) VALUES ('$name','$loai','$gia','$dinhluong','$hinhanh')";
        $monan = new mMonAn();
        return  $monan->insertMonAn($sql);
        
    }
    // public function getMonAnByTT($trangthai) {
    //     $sql = "SELECT * FROM monan as k join monan as n on k.mama=n.mama  WHERE TrangThai = '$trangthai'";
    //     $monan = new mMonAn();
    //     $DanhSachMA = $monan->selectMonAn($sql);
    //     return $DanhSachMA;
    // }

    public function getMonAnByTT($trangthai) {
        $sql = "SELECT * FROM monan  WHERE trangthai = '$trangthai'";
        $monan = new mMonAn();
        $DanhSachMA = $monan->selectMonAn($sql);
        return $DanhSachMA;
    }

    public function getMonAnByMaCH($i) {
        $sql = "SELECT m.*, k.soluong
                FROM monan m
                JOIN khomonan k ON m.mama = k.mama
                WHERE k.mach = $i;
                ";
        $monan = new mMonAn();
        $DanhSachMA = $monan->selectMonAn($sql);
        return $DanhSachMA;
    }

    public function getMonAnByMaCH_TT($i, $trangthai) {
        $sql = "SELECT m.*, k.soluong
                FROM monan m
                JOIN khomonan k ON m.mama = k.mama
                WHERE k.mach = $i and m.trangthai='$trangthai';
                ";
        $monan = new mMonAn();
        $DanhSachMA = $monan->selectMonAn($sql);
        return $DanhSachMA;
    }

    public function getMonAnByName($name){
        
        $sql = "SELECT * FROM monan WHERE tenma = '$name'";
        $monan = new mMonAn();

        $DanhSachMA = $monan->selectMonAn($sql);
        if(count($DanhSachMA) != 0) return false;

        return true;
    }
    

    public function updateMonAn($mama, $name, $loai, $gia, $congthuc) {
        $monan = new mMonAn();
        // if(empty($congthuc)) $congthuc = "null";
        // $sql = "UPDATE monan SET tenma = '$name', maloaima = '$loai', giaban = $gia, congthuc = '$congthuc' WHERE mama = $mama";
        return $monan->updateMonAn($mama, $name, $loai, $gia, $congthuc);
    }

    public function cDeleteMonAn($mama){
        $o=new mMonAn();
        $kq=$o->mDeleteMonAn($mama);
        return $kq;
    }
    
}
?>