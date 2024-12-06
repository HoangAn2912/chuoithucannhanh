<?php
session_start();
require_once("models/mTimKiem.php");

class cTimKiem {
    public function cGetAllDish() {
        $p = new mTimKiem;
        if ($p->mGetAllDish())
            return $p->mGetAllDish();
        else
            return false;
    }
    
    public function cGetDishByInput($input) {
        $p = new mTimKiem;
        if ($p->mGetDishByInput($input))
            return $p->mGetDishByInput($input);
        else
            return false;
    }
}
?>
