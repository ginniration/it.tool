<? if(!isset($_SESSION['user'])){ header('Location: ../index.php'); } ?> 
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
<?
if (isset($_GET['title'])) {
                if($_GET['title'] == 'man-hinh')
                {
                  echo 'Kê khai Màn hình máy tính';
                } 
                else if($_GET['title'] == 'mobile')
                {
                  echo 'Kê khai thiết bị Mobile';
                }
                else if($_GET['title'] == 'pc-macmini')
                {
                  echo 'Kê khai PC - Macmini';
                }                
                else if($_GET['title'] == 'thiet-bi-khac')
                {
                  echo 'Kê khai Thiết bị Khác';
                }
                else if($_GET['title'] == 'laptop-macbook')       
                {
                  echo 'Kê khai Laptop - Macbook';
                } 
                else if($_GET['title'] == 'chuot-banphim')
                {
                  echo 'Kê khai Chuột - Bàn phím';
                }else {
                  echo 'Kê Khai Tài sản IMT';
                } 
} else {
                  echo 'Kê Khai Tài sản IMT';
                }          
?>    <small>Advanced Tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="#">Kê Khai Thiết Bị</a></li>
        <li class="active">Tất cả</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
             <?  

if (isset($_GET['title'])) {
                if($_GET['title'] == 'man-hinh')
        				{
        					include('desp/monitors.php');
        				} 
                else if($_GET['title'] == 'mobile')
                {
                  include('desp/mobiles.php');
                }
                else if($_GET['title'] == 'pc-macmini')
                {
                  include('desp/pc-macmini.php');
                }                
                else if($_GET['title'] == 'thiet-bi-khac')
                {
                  include('desp/ups.php');
                }
                else if($_GET['title'] == 'laptop-macbook')       
                {
                  include('desp/laptop-macbook.php');
                } 
                else if($_GET['title'] == 'chuot-banphim')
                {
                  include('desp/mouse-keyboard.php');
                }         
                else 
                {
                  thongbao('Trang bạn tìm không tồn tại!\r\nVui lòng thử lại :)');
                  chuyentrang('area.php?page=kekhai/thietbi');
                }
} else {
include('desp/alldevices.php');  
}
            ?>       	
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->