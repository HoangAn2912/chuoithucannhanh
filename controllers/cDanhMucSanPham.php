<?php
include_once("models/mDanhMucSanPham.php");
class cDanhMuc
{
    public function cGetCategories()
    {
        $p = new mDanhMuc();
        if ($p->mGetCategories()) {
            return $p->mGetCategories();
        } else 
            return false;
    }  
    
    public function cGetAllCategories()
    {
        $p = new mDanhMuc();
        if ($p->mGetAllCategories()) {
            return $p->mGetAllCategories();
        } else 
            return false;
    }  
    
    public function cGetAllCategoriesByID($id)
    {
        $p = new mDanhMuc();
        if ($p->mGetAllCategoriesByID($id)) {
            return $p->mGetAllCategoriesByID($id);
        } else 
            return false;
    }  
}
?>