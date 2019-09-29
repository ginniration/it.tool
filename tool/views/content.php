<? if(!isset($_SESSION['user'])){ header('Location: ../index.php'); } ?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user-secret"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng Truy Cập Trang IT</span>
              <span class="info-box-number"> <? tongtruycap($_SESSION['user']); ?> <small>Lần</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng Nhân Viên</span>
              <span class="info-box-number"><? tongnhanvien(); ?> <small> Nhân Viên </small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng Thiết Bị ( Trừ Mobile )</span>
              <span class="info-box-number"><? tongthietbi(); ?> <small>Thiết bị</small></span>
              <span class="info-box-text">ĐANG DÙNG : <? dangsudung(); ?></span>
              <span class="info-box-text"><small>[ <? huhong(); ?> Hư hỏng ]</small></span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-tablet"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng Thiết Bị Mobile</span>
              <span class="info-box-number"><? tongthietbimobile(); ?> <small>Thiết bị </small></span>
              <span class="info-box-text">ĐANG DÙNG : <? dangsudungmobile(); ?></span>
              <span class="info-box-text"><small>[ <? huhongmobile(); ?> Hư hỏng ]</small></span>              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->