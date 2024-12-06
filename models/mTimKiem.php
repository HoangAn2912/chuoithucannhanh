<?php
require_once 'models/mketnoi.php';

class mTimKiem {
    public function mGetAllDish() {
        $p = new ketnoi();
        $conn = $p->ketnoi();
        $sql = "SELECT * FROM monan WHERE soluong > 0";
        
        if ($conn->query($sql)->num_rows > 0)
            return $conn->query($sql);
        else 
            return false;
    }

    public function mGetDishByInput($input) {
        $p = new ketnoi();
        $conn = $p->ketnoi();
        
        if (!is_numeric($input)) #Kiểm tra giá trị nhập vào không phải số sẽ tìm tên
            $sql = "SELECT * FROM monan WHERE tenma LIKE '%".$input."%' AND soluong > 0";
        else $sql = "SELECT * FROM monan WHERE giaban = $input AND soluong > 0";
        
        if ($conn->query($sql)->num_rows > 0)
            return $conn->query($sql);
        else return false;
    }
}
?>
