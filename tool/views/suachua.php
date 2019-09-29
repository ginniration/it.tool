<? if(!isset($_SESSION['user'])){ header('Location: ../index.php'); } ?> 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Báo Cáo Sửa Chữa Thiết Bị IT
        <small>Advanced Tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="#">Báo Cáo Sửa Chữa Thiết Bị</a></li>
        <li class="active">Tất cả</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
             <?  
                include('suachua/all.php');
            ?>       	
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->