<?
      $getit = $_GET['chinhsua'];
      $ketnoi = mysqli_query($db,"SELECT * FROM cp_reports_shoping WHERE codez='$getit'");
      $chon = mysqli_fetch_array($ketnoi,MYSQLI_ASSOC); 
      if($_GET['chinhsua'] ==  NULL || $_GET['chinhsua'] == "") {
        thongbao('Giá trị không được để trống , vui lòng thử lại !');
        chuyentrang('area.php?page=bao-cao-mua-sam');
      }
      else if($getit != $chon['codez']){
        thongbao('Thông tin bạn tìm không tồn tại, vui lòng thử lại !');
        chuyentrang('area.php?page=bao-cao-mua-sam');    
      }   
 if(isset($_POST['save'])){
    $ngayxuly = $_POST['ngayxl'];
    $tbdv = $_POST['tbdv'];
    $ncc = $_POST['ncc'];
    $ticket = $_POST['ticket'];
    $chiphi = $_POST['chiphi'];
    $nsd = $_POST['nsd'];
    $sl = $_POST['sl'];

    $kt = mysqli_query($db,"UPDATE cp_reports_shoping SET ngay='$ngayxuly' WHERE codez='$getit'");
    
     if($kt){
      
      mysqli_query($db,"UPDATE cp_reports_shoping SET tenthietbi='$tbdv' WHERE codez='$getit'");
      mysqli_query($db,"UPDATE cp_reports_shoping SET nhacungcap='$ncc' WHERE codez='$getit'");
      mysqli_query($db,"UPDATE cp_reports_shoping SET ticket='$ticket' WHERE codez='$getit'");
      mysqli_query($db,"UPDATE cp_reports_shoping SET giatien='$chiphi' WHERE codez='$getit'");
      mysqli_query($db,"UPDATE cp_reports_shoping SET nguoisudung='$nsd' WHERE codez='$getit'");
      mysqli_query($db,"UPDATE cp_reports_shoping SET soluong='$sl' WHERE codez='$getit'");
      thongbao('Cập nhật dữ liệu mới thành công !');
      chuyentrang('area.php?page=bao-cao-mua-sam&chinhsua='.$getit);      
    }else {
      thongbao('Đã có lỗi xảy ra ! vui lòng liên hệ người tạo Tool');
      chuyentrang('area.php?page=bao-cao-mua-sam&chinhsua='.$getit);
    }
 }
?>
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Chỉnh sửa báo cáo mua sắm thiết bị</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" class="form-horizontal">
              <div class="box-body">

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Ngày Xử Lý</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="ngayxl" value ="<? ngaythang($chon['ngay']); ?>">
                  </div>
                </div>  
                               
                <div class="form-group">
                  <label class="col-sm-2 control-label">Thiết bị - Dịch vụ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tbdv" value ="<? echo $chon['tenthietbi']; ?>">
                  </div>
                </div>  
                               
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nhà Cung Cấp</label>
                  <div class="col-sm-10">
                    <select name="ncc" class="form-control" >
                      <? nhacungcap($chon['nhacungcap']); ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Ticket</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="ticket" value ="<? echo $chon['ticket']; ?>">
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->

             
              <!-- /.box-body -->

          </div>
    </div>
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">#</h3>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body form-horizontal" >
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Chí phí</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="chiphi" value ="<? echo $chon['giatien']; ?>">
                  </div>
                </div>                      



                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Sử Dụng</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nsd" value ="<? echo $chon['nguoisudung']; ?>">
                  </div>
                </div>  
                               
                <div class="form-group">
                  <label class="col-sm-2 control-label">Số Lượng</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="sl" value ="<? echo $chon['soluong']; ?>">
                  </div>
                </div>

                  </div>
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Đặt Lại</button>
                <button type="submit" name="save" class="btn btn-info">Lưu</button>
              </div>
              <!-- /.box-footer -->
            </form>                     
             </div>
        </div>
 </div>