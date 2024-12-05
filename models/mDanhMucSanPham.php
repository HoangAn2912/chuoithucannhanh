<?php
include_once("mketnoi.php");
class mDanhMuc
{ 
    public function mGetCategories()
    {
        $p = new ketnoi();
        $conn = $p->ketnoi();
        $sql = "SELECT * FROM loaimonan";
        if ($conn->query($sql)->num_rows > 0) {
            return $conn->query($sql);
        } else 
            return false;
    }
    
    public function mGetAllCategories()
    {
        $p = new ketnoi();
        $conn = $p->ketnoi();
        $sql = "SELECT * FROM loaimonan AS LMA JOIN monan AS MA ON LMA.maloaima = MA.maloaima";
        if ($conn->query($sql)->num_rows > 0) {
            return $conn->query($sql);
        } else 
            return false;
    }
    
    public function mGetAllCategoriesByID($id)
    {
        $p = new ketnoi();
        $conn = $p->ketnoi();
        $sql = "SELECT * FROM loaimonan AS LMA JOIN monan AS MA ON LMA.maloaima = MA.maloaima WHERE MA.maloaima = $id";
        if ($conn->query($sql)->num_rows > 0) {
            return $conn->query($sql);
        } else 
            return false;
    }
}
?>