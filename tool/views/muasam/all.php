<?
if(isset($_GET['them'])){
  include('add.php');
  include('content.php');
}else if(isset($_GET['chinhsua'])){  
    include('chinhsua.php');
    include('content.php');
}else if(isset($_GET['download'])){
    $chonfile = $_GET['download'];
      if($_GET['download'] == NULL || $_GET['download'] == ""){
        thongbao('Giá trị tìm kiếm không được để trống !');
        chuyentrang('area.php?page=bao-cao-mua-sam');    
      }else if($chonfile != "reports_b"){
        thongbao('Giá trị bạn tìm không đúng, vui lòng kiểm tra lại !');
        chuyentrang('area.php?page=bao-cao-mua-sam'); 
      }else {
        chuyentrang('./excel/export.php?choose='.$chonfile.'');

      }
}else {
  include('content.php');
 } 
 ?>          