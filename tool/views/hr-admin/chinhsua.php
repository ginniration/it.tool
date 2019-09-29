<?
      $getit = $_GET['chinhsua'];
      $ketnoi = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin WHERE md5='$getit'");
      $chon = mysqli_fetch_array($ketnoi,MYSQLI_ASSOC); 
      if($_GET['chinhsua'] ==  NULL || $_GET['chinhsua'] == "") {
        thongbao('Giá trị không được để trống , vui lòng thử lại !');
        chuyentrang('area.php?page=bao-cao-sua-chua-hr-admin');
      }
      else if($getit != $chon['md5']){
        thongbao('Thông tin bạn tìm không tồn tại, vui lòng thử lại !');
        chuyentrang('area.php?page=bao-cao-sua-chua-hr-admin');    
      }   
 if(isset($_POST['save'])){

    $ticket = $_POST['ticket'];
    $tenticket = $_POST['tenticket'];
    $pl = $_POST['pl'];
    $nguoiguiticket = $_POST['nguoiguiticket'];
    $bp = $_POST['bp'];
    $nguoixuly = $_POST['nguoixuly'];
    $loi = $_POST['loi'];
    $loithucte = $_POST['loithucte'];
    $giaiphap = $_POST['giaiphap'];

    $kt = mysqli_query($db,"UPDATE cp_reports_hr_admin SET ticket='$ticket' WHERE md5='$getit'");
    $kt1 = mysqli_query($db,"UPDATE cp_reports_hr_admin SET tenticket='$tenticket' WHERE md5='$getit'");
    $kt2 = mysqli_query($db,"UPDATE cp_reports_hr_admin SET phanloai='$pl' WHERE md5='$getit'");
    $kt3 = mysqli_query($db,"UPDATE cp_reports_hr_admin SET nguoiguiticket='$nguoiguiticket' WHERE md5='$getit'");
    $kt4 = mysqli_query($db,"UPDATE cp_reports_hr_admin SET bophan='$bp' WHERE md5='$getit'");
    $kt5 = mysqli_query($db,"UPDATE cp_reports_hr_admin SET loi='$loi' WHERE md5='$getit'");
    $kt6 = mysqli_query($db,"UPDATE cp_reports_hr_admin SET loithucte='$loithucte' WHERE md5='$getit'");
    $kt7 = mysqli_query($db,"UPDATE cp_reports_hr_admin SET giaiphap='$giaiphap' WHERE md5='$getit'");
    $kt8 = mysqli_query($db,"UPDATE cp_reports_hr_admin SET nguoixuly='$nguoixuly' WHERE md5='$getit'");    
    
    if($ticket == NULL || $ticket = "" || $tenticket == NULL || $tenticket = "" || $pl == NULL || $pl = "" || $nguoiguiticket == NULL || $nguoiguiticket = "" || $bp == NULL || $bp = "" || $nguoixuly == NULL || $nguoixuly = "" || $loi == NULL || $loi = "" || $loithucte == NULL || $loithucte = "" || $giaiphap == NULL || $giaiphap = "") {
      thongbao('Không được để trống bất kỳ giá trị nào!');
      chuyentrang('area.php?page=bao-cao-sua-chua-hr-admin&chinhsua='.$getit); 
    } else if($kt && $kt1 && $kt2 && $kt3 && $kt4 && $kt5 && $kt6 && $kt7 && $kt8){
      thongbao('Cập nhật dữ liệu mới thành công !');
      chuyentrang('area.php?page=bao-cao-sua-chua-hr-admin&chinhsua='.$getit);      
    }else {
      thongbao('Đã có lỗi xảy ra ! vui lòng liên hệ người tạo Tool');
      chuyentrang('area.php?page=bao-cao-sua-chua-hr-admin&chinhsua='.$getit);
    }
 }
?>
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"># : <? echo $chon['md5']; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" class="form-horizontal">
              <div class="box-body">

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Ticket</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="ticket" value ="<? echo $chon['ticket']; ?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Tiêu đề</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tenticket" value ="<? echo $chon['tenticket']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Phân loại</label>
                  <div class="col-sm-10">
                    <select name="pl" class="form-control" >
                      <? phanloaihradmin($chon['phanloai']); ?>
                    </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Người gửi Ticket</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nguoiguiticket" value ="<? echo $chon['nguoiguiticket']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Bộ phận</label>
                  <div class="col-sm-10">
                    <select name="bp" class="form-control" >
                      <? bophanhradmin($chon['bophan']); ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Xử Lý</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nguoixuly" value ="<? echo $chon['nguoixuly']; ?>">
                  </div>
                </div>  

              </div>
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
                  <label class="col-sm-2 control-label">Lỗi</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="loi"><? echo $chon['loi']; ?></textarea> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Lỗi Thực Tế</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="loithucte"><? echo $chon['loithucte']; ?></textarea> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Giải Pháp</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="giaiphap"><? echo $chon['giaiphap']; ?></textarea> 
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