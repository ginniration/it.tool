<?
      $getit = $_GET['chinhsua'];
      $ketnoi = mysqli_query($db,"SELECT * FROM cp_reports_fixed WHERE mataisan='$getit'");
      $chon = mysqli_fetch_array($ketnoi,MYSQLI_ASSOC); 
      if($_GET['chinhsua'] ==  NULL || $_GET['chinhsua'] == "") {
        thongbao('Giá trị không được để trống , vui lòng thử lại !');
        chuyentrang('area.php?page=bao-cao-sua-chua');
      }
      else if($getit != $chon['mataisan']){
        thongbao('Thông tin bạn tìm không tồn tại, vui lòng thử lại !');
        chuyentrang('area.php?page=bao-cao-sua-chua');    
      }   
 if(isset($_POST['save'])){
    $cus = $_POST['cus'];
    $ngayxuly = $_POST['ngayxl'];
    $mts = $_POST['mts'];
    $tbdv = $_POST['tbdv'];
    $ncc = $_POST['ncc'];
    $ticket = $_POST['ticket'];
    $chiphi = $_POST['chiphi'];
    $nguoixuly = $_POST['nguoixl'];
    $nsd = $_POST['nsd'];
    $vande = $_POST['vande'];
    $giaiphap = $_POST['giaiphap'];


    $kt = mysqli_query($db,"UPDATE cp_reports_fixed SET ngay='$ngayxuly' WHERE stt='$cus'");
    
    if(strlen($mts) > 13 || strlen($mts) < 13 ) {
      thongbao('Mã tài sản bạn tạo không hợp lệ ( Xem lại Policy IMT ) !');
      chuyentrang('area.php?page=bao-cao-sua-chua&chinhsua='.$mts); 
    } else if($kt){
      
      mysqli_query($db,"UPDATE cp_reports_fixed SET mataisan='$mts' WHERE stt='$cus'");
      mysqli_query($db,"UPDATE cp_reports_fixed SET thietbi-dichvu='$tbdv' WHERE stt='$cus'");
      mysqli_query($db,"UPDATE cp_reports_fixed SET nhacungcap='$ncc' WHERE stt='$cus'");
      mysqli_query($db,"UPDATE cp_reports_fixed SET ticket='$ticket' WHERE stt='$cus'");
      mysqli_query($db,"UPDATE cp_reports_fixed SET chiphi='$chiphi' WHERE stt='$cus'");
      mysqli_query($db,"UPDATE cp_reports_fixed SET nguoixuly='$nguoixuly' WHERE stt='$cus'");
      mysqli_query($db,"UPDATE cp_reports_fixed SET nguoisudung='$nsd' WHERE stt='$cus'");
      mysqli_query($db,"UPDATE cp_reports_fixed SET mota='$vande' WHERE stt='$cus'");
      mysqli_query($db,"UPDATE cp_reports_fixed SET giaiphap='$giaiphap' WHERE stt='$cus'");
      thongbao('Cập nhật dữ liệu mới thành công !');
      chuyentrang('area.php?page=bao-cao-sua-chua&chinhsua='.$mts);      
    }else {
      thongbao('Đã có lỗi xảy ra ! vui lòng liên hệ người tạo Tool');
      chuyentrang('area.php?page=bao-cao-sua-chua&chinhsua='.$getit);
    }
 }
?>
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">md5 : #<? echo md5($chon['stt']); ?></h3>
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
                  <label class="col-sm-2 control-label">Mã Tài Sản</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mts" value ="<? echo $chon['mataisan']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Thiết bị - Dịch vụ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tbdv" value ="<? echo $chon['thietbi-dichvu']; ?>">
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
                    <input type="text" class="form-control" name="chiphi" value ="<? echo $chon['chiphi']; ?>">
                  </div>
                </div>                      

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Xử Lý</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nguoixl" value ="<? echo $chon['nguoixuly']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Sử Dụng</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nsd" value ="<? echo $chon['nguoisudung']; ?>">
                  </div>
                </div>  
                               
                <div class="form-group">
                  <label class="col-sm-2 control-label">Vấn Đề</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="vande"><? echo $chon['mota']; ?></textarea> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Giải pháp</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="giaiphap"><? echo $chon['giaiphap']; ?></textarea> 
                  </div>
                </div>
                  </div>
              <div class="box-footer">
                <input type="hidden" name="cus" value="<? echo $chon['stt']; ?>">
                <button type="reset" class="btn btn-default">Đặt Lại</button>
                <button type="submit" name="save" class="btn btn-info">Lưu</button>
              </div>
              <!-- /.box-footer -->
            </form>                     
             </div>
        </div>
 </div>