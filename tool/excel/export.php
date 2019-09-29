<?
require "Classes/PHPExcel.php";
require "../controls/settings.php";

if(isset($_GET['choose'])){
    $chon = $_GET['choose'];
    $mhmt = md5('Màn hình máy tính');
    if($chon == NULL || $chon == ""){
        thongbao('Yêu cầu không hợp lệ, vui lòng thử lại !');
        chuyentrangtruoc();
    }else if($chon == "Laptop" || $chon == "Macbook"){
        include('list/laptop-macbook.php');
    }else if($chon == "PC" || $chon == "MacMINI"){
        include('list/pc-macmini.php');
    }else if($chon == "alldeviced"){
        include('list/all.php');
    }else if($chon == "Chuột" || $chon == "Bàn phím"){
        include('list/mouse-keyboard.php');
    }else if($chon == $mhmt){
        include('list/monitor.php');
    }else if($chon == "report-fixed"){
        include('list/report-fixed.php');
    }else if($chon == "reports_b"){
        include('list/report-shoping.php');
    }else if($chon == "report-hr-admin"){
        include('list/report-hradmin.php');
    }else {
        thongbao('Yêu cầu không hợp lệ, vui lòng thử lại !');
        chuyentrang2truoc();      
    }
 
}else {
    chuyentrang('../area.php');
}

?>