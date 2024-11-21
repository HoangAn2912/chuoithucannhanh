<?php
include_once("models/mLichSuNhapKho.php");

class cLichSuNhapKho {
    
    public function updatehistory ($soluongnhap, $id){
        
        $sql = "INSERT INTO lichsunhapkho(StoreIngredientID, ngaynhapkho, soluongnhapkho)
                VALUES ($id, NOW(),'$soluongnhap')";
        $history = new mLichSuNhapKho();
        if ($soluongnhap <= 0){
            echo '<script> alert("Số lượng nhập không được nhỏ hơn 0") </script>';
            return false;
            exit();
        }else{
            $history->updateLichSuNhapKho($sql);
            return true;
            exit();
        }
    }
}
?>