<? if(!isset($_SESSION['user'])){ header('Location: ../index.php'); } ?> 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Advanced Tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="#">Thêm License Key</a></li>
        <li class="active">Tất cả</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="row">
        <!-- left column -->
        <div class="col-md-6">          
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm License Key</h3>
            </div>
            <!-- /.box-header -->
            <form method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Key License <font color="red" size="+1">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kl" name="kl" value ="">
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tên License <font color="red" size="+1">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tl" name="tl" value ="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Thời Gian Tạo <font color="red" size="+1">*</font></label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgt" name="tgt" value ="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Danh Mục <font color="red" size="+1">*</font></label>
                  <div class="col-sm-10">
                  <select id="danhmuc" name="danhmuc" class="form-control">
                      <option value="NULL" selected="selected">Chọn danh mục</option>
                      <option value="ms-win">MS Office WinOS</option>
                      <option value="ms-mac">MS Office MacOS</option>
                      <option value="ms-visio">MS Visio</option>
                      <option value="ms-project">MS Project 2013</option>
                      <option value="win-7">Windows 7</option>
                      <option value="win-10">Windows 10</option>
                      <option value="win-sv2012">Windows Server 2012</option>
                      <option value="win-sv2016">Windows Server 2016</option>
                  </select>
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tài Khoản License</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tkl" name="tkl" value ="">
                  </div>
                </div>
 
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Đặt Lại</button>
                <button type="button" id="submitFormData" onclick="SubmitFormData();" class="btn btn-info">Lưu</button>
              </div>
              <!-- /.box-footer -->
            </form>                    
              </div>
              <!-- /.box-body -->
          </div>
            <div id="results"></div>
    </div>
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List License Keys</h3>
            </div>
              <div class="box-body form-horizontal" >
              <table id="example1" class="display" style="width:100%">
                <thead>
                <tr>
                  <th>Key</th>
                  <th>Ngày Tạo</th>
                  <th>Tên License</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>      
            <?

              $stt=1; 
              $conn = mysqli_query($db,"SELECT * FROM cp_keylicenses ORDER BY getdate ASC");
              while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC))
              {
            ?>                    
                <tr>
                  <td width="50%"><? echo $row['keylicense']; ?></td>
                  <td><? echo date("d-m-Y",strtotime($row['getdate'])); ?></td>
                  <td width="25%"><? echo $row['namelicense']; ?></td>
                  <td ><a href="area.php?page=license-keys&edit=<? echo $row['coded']; ?>" class="btn btn-default"><i class="fa fa-edit"></i></a> </td>
                </tr>
            <?  $stt++; } ?> 
                </tbody>
              </table>                                            
              </div>
              <!-- /.box-body -->          
          </div>
  </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    function SubmitFormData() {
        var kl = $("#kl").val();
        var tl = $("#tl").val();
        var tgt = $("#tgt").val();
        var tkl = $("#tkl").val();
        var danhmuc = $("#danhmuc").children(":selected").val();

        $.post("../ajax/addkeys.php", { kl: kl, tl: tl, tgt: tgt, tkl: tkl, danhmuc: danhmuc },
        function(data) {
       $('#results').html(data);
        });
    }
  </script>