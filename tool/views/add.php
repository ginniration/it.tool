<? if(!isset($_SESSION['user'])){ header('Location: ../index.php'); } ?> 
<?
if(isset($_POST['save'])){
    $mataisan = $_POST['mts'];
    $serial = $_POST['srial'];
    $phanloai = $_POST['pl'];
    $hieu = $_POST['model'];
    $tentaisan = $_POST['tts'];
    $nguoisudung = $_POST['nsd'];
    $nguoiquanly = $_POST['nql'];
    $nguoichu = $_POST['nc'];
    $cauhinh = $_POST['ch'];
    $tinhtrang = $_POST['ttrang'];
    $tinhtrangchitiet = $_POST['ttct'];
    $bophan = $_POST['bp'];
    $ngaymua = $_POST['nm'];
    $hanbaohanh = $_POST['hbh'];
    $giatien = $_POST['gt'];
    $nhacungcap = $_POST['ncc'];
    $ngaysudungcuoi = $_POST['nsdc'];
    $khauhao = $_POST['kh'];
    $giathanhly = $_POST['gtl'];
    $lanmot = $_POST['lm'];
    $lanhai = $_POST['lh'];
    $lanba = $_POST['lb'];
    $suachua = $_POST['sc'];
    $lichsusudung = $_POST['lssd'];
    $noted = $_POST['gc'];
            $check1 = mysqli_query($db,"SELECT * FROM cp_devices WHERE mataisan='$mataisan'");
            $row1=mysqli_fetch_array($check1,MYSQLI_ASSOC);

    if($phanloai == NULL || $phanloai == "" || $phanloai == "NONE" || $phanloai == "Chọn phân loại"){
      thongbao('Vui lòng chọn phân loại !');
      chuyentrang('area.php?page=add-kekhai/thietbi&error=pl');
    }else if(strlen($mataisan) > 13 || strlen($mataisan) < 13 ) {
		thongbao('Mã tài sản bạn tạo không hợp lệ ( Xem lại Policy IMT ) !');
        chuyentrang('area.php?page=add-kekhai/thietbi&error=mts');
    }else if($mataisan == $row1['mataisan']){ 
      thongbao('Mã tài sản đã tồn tại, Vui lòng kiểm tra lại !');
      chuyentrang('area.php?page=add-kekhai/thietbi&error=mts');
    }else if($mataisan != $row1['mataisan']){
    	   mysqli_query($db,"INSERT INTO cp_devices (mataisan, serial, phanloai, hieu, tentaisan, nguoisudung, nguoiquanly, nguoichu, I, A, cauhinh, tinhtrang, chitiet, bophan, ngaymua, hanbaohanh, giatien, nhacungcap, ngaysudungcuoi, khauhao, giathanhly, lanmot, lanhai, lanba, suachua, lichsuthietbi, ghichu) VALUES ('$mataisan','$serial',N'$phanloai','$hieu',N'$tentaisan',N'$nguoisudung',N'$nguoiquanly',N'$nguoichu','x','x',N'$cauhinh','$tinhtrang',N'$tinhtrangchitiet','$bophan','$ngaymua','$hanbaohanh','$giatien',N'$nhacungcap','$ngaysudungcuoi','$khauhao','$giathanhly','$lanmot','$lanhai','$lanba','$suachua',N'$lichsusudung',N'$noted')");
      		thongbao('Dữ liệu đã cập nhật thành công !');
        	chuyentrang('area.php?page=add-kekhai/thietbi');   		

    }else{
      thongbao('Đã có lỗi xảy ra ! vui lòng liên hệ người tạo Tool\r\n '. mysqli_error($db));
      chuyentrang('area.php?page=add-kekhai/thietbi');
    }
}      
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Advanced Tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="#">Thêm Thiết Bị</a></li>
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
              <h3 class="box-title">Thêm thiết bị IT</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" class="form-horizontal">
              <div class="box-body">
                <? if(isset($_GET['error'])){ if($_GET['error'] == 'pl'){  ?>
                <div class="form-group has-error">
                <? } else { echo '<div class="form-group">';} }else { echo '<div class="form-group">';} ?>
                  <label class="col-sm-2 control-label" ">Mã Tài Sản</label>
                  <div class="col-sm-10">
              <div class="input-group input-group-sm">
                <input type="text" style="text-transform:uppercase" id="mts" name="mts" class="form-control" value="COP0">
                    <span class="input-group-btn">
                      <button type="button" id="submitFormData" onclick="SubmitFormData();" class="btn btn-info btn-flat">
                        <i class="fa fa-check"></i> Nhấn để Kiểm Tra
                      </button>
                    </span>
              </div>
               <span class="help-block" id="results"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Serial / Service Tag</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="srial" value ="">
                  </div>
                </div>          
                <? if(isset($_GET['error'])){ if($_GET['error'] == 'pl'){  ?>
                <div class="form-group has-error">
                <? } else { echo '<div class="form-group">';} }else { echo '<div class="form-group">';} ?>
                  <label class="col-sm-2 control-label">Phân Loại</label>
                  <div class="col-sm-10">
                  <select name="pl" class="form-control" >
                      <? phanloai(); ?>
                  </select>                    
                  </div>
                </div>  

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Hiệu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="model" value ="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tên Tài Sản</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tts" value ="">
                  </div>
                </div>          

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Sử Dụng</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nsd" value ="">
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Quản Lý</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nql" value ="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Chủ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nc" value ="Phòng IT" disabled>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 control-label">Cấu Hình</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ch" value ="">
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tình Trạng</label>
                  <div class="col-sm-10">

                  <select name="ttrang" class="form-control" >
                      <option value="Spare" selected="selected">Spare</option>
                      <option value="In-Use">In-Use</option>
                      <option value="Damage">Damage</option>
                  </select>

                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tình Trạng Chi Tiết</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ttct" value ="">
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 control-label">Bộ Phận</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bp" value ="">
                  </div>
                </div> 

              </div>
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
                  <label class="col-sm-2 control-label">Ngày Mua</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="nm" value ="">
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-2 control-label">Hạn Bảo Hành</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="hbh" value ="">
                  </div>
                </div>                 
                <div class="form-group">
                  <label class="col-sm-2 control-label">Giá Tiền</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gt" value ="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nhà Cung Cấp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ncc" value ="">
                  </div>
                </div>          

                <div class="form-group">
                  <label class="col-sm-2 control-label">Ngày Sử Dụng Cuối</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nsdc" value ="">
                  </div>
                </div>  

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Khấu Hao</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kh" value ="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Giá Thanh Lý</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gtl" value ="">
                  </div>
                </div>          

                <div class="form-group">
                  <label class="col-sm-2 control-label">Lần Một</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lm" value ="">
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Lần Hai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lh" value ="">
                  </div>
                </div>        

               <div class="form-group">
                  <label class="col-sm-2 control-label">Lần Ba</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lb" value ="">
                  </div>
                </div> 

               <div class="form-group">
                  <label class="col-sm-2 control-label">Sửa Chữa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sc" value ="">
                  </div>
                </div>   

               <div class="form-group">
                  <label class="col-sm-2 control-label">Ghi Chú</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gc" value ="">
                  </div>
                </div>  
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Lịch Sử Sử Dụng</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" rows="2" name="lssd" placeholder="Enter ..."></textarea>
                  </div>
                </div>                                                   
                                                        
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Đặt Lại</button>
                <button type="submit" name="save" class="btn btn-info">Lưu</button>
              </div>
              <!-- /.box-footer -->
            </form>              
          </div>
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
        var mts = $("#mts").val();
        $.post("/../ajax/checked.php", { mts: mts },
        function(data) {
       $('#results').html(data);
        });
    }
  </script>