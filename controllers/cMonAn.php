<?php
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
    
    public function AddMonAn($name, $loai, $gia, $congthuc) {
        $sql = "INSERT INTO monan(tenma, maloaima, giaban, congthuc) VALUES ('$name','$loai','$gia','$congthuc')";
        $monan = new mMonAn();
        return  $monan->insertMonAn($sql);
        
    }
    

    
}
?>