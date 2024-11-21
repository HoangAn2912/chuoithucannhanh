<?php
session_start();
include("models/mDeXuatMonMoi.php");

class cDeXuatMonMoi {
    public function createNewSuggestion($dish_name, $ingredients, $cooking_method, $preparation_steps, $description): bool {
        $mDeXuatMonMoi = new mDeXuatMonMoi();
        $date = new DateTime();
        $date = $date->format('Y-m-d');
        if(isset($_SESSION["dangnhap"])){
            $user_id = $_SESSION["dangnhap"];
        } else $user_id = 1;
        $status = $mDeXuatMonMoi->createNewSuggestion($user_id,$dish_name, $ingredients, $cooking_method, $preparation_steps, $description, $date);
        return $status;
    }
}

?>