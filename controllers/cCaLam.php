<?php
include_once("models/mCaLam.php");

class cCaLam {
    
    public function addCaLam($tenca, $ngaylam, $manv) {
        $sql = "INSERT INTO calam (tenca, ngaylam, manvb) VALUES ('$tenca','$ngaylam','$manv')";
        $calam = new mCaLam();
        $calam->insertCaLam($sql);
    }
}

?>