<?php
include_once("models/mThongKeDoanhThu.php");
class cThongKe
{
    public function cGetAllOrderCompleteByStore($storeID)
    {
        $p = new mThongKe();
        if ($p->mGetAllOrderCompleteByStore($storeID)) {
            return $p->mGetAllOrderCompleteByStore($storeID);
        } else 
            return false;
    }    
}
?>