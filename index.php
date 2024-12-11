<?php
    error_reporting(0);
    session_start();
    require("layout/header.php");
    if(isset($_GET["page"]))
        $page=$_GET["page"];
    else
        $page='dangnhap';
    
    if(isset($_GET["cate"]))
        $cate=$_GET["cate"];
    if(file_exists("views/".$page."/index.php"))
        include("views/".$page."/index.php");
    else
    include("views/404/index.php");
?>