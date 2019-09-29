 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kê Khai Thiết Bị IMT
        <small>Advanced Tables</small>
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
                else if($_GET['title'] == 'ups')
                {
                  include('desp/ups.php');
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