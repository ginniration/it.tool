<?
require "Classes/PHPExcel.php";
require "../controls/settings.php";

if(isset($_GET['choose'])){
    $chon = $_GET['choose'];
    $mhmt = md5('Màn hình máy tính');
     if($chon == "Laptop" || $chon == "Macbook"){
        include('list/laptop-macbook.php');
    }else if($chon == "PC" || $chon == "MacMINI"){
        include('list/pc-macmini.php');
    }else if($chon == "alldeviced"){
        include('list/all.php');
    }else if($chon == "Chuột" || $chon == "Bàn phím"){
        include('list/mouse-keyboard.php');
    }else if($chon == $mhmt){
        include('list/monitor.php');
    }
 
}else {
    chuyentrang('../area.php');
}

?>