<?php

if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    session_start(); 
    session_destroy();
    header('Location: index.php?page=dangnhap');
    exit();
}
?>
