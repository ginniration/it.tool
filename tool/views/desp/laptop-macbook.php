<?
//================================================================ THAY GIÁ TRỊ Ở ĐÂY NẾU TẠO TRANG KHÁC ===================
      $csdl = mysqli_query($db,"SELECT * FROM cp_devices WHERE phanloai='Laptop' OR phanloai='Macbook'");
      $row = mysqli_fetch_array($csdl,MYSQLI_ASSOC); 
//=========================================================================================================================      
if(isset($_GET['chinhsua'])){
      $getit = $_GET['chinhsua'];
      $ketnoi = mysqli_query($db,"SELECT * FROM cp_devices WHERE mataisan='$getit'");
      $chon = mysqli_fetch_array($ketnoi,MYSQLI_ASSOC); 
    if($_GET['chinhsua'] ==  NULL || $_GET['chinhsua'] == "") {
      thongbao('Giá trị không được để trống , vui lòng thử lại !');
      chuyentrang('area.php?page=kekhai/thietbi&title=laptop-macbook');
    }else if($getit != $chon['mataisan']){
      thongbao('Thông tin bạn tìm không tồn tại, vui lòng thử lại !');
      chuyentrang('area.php?page=kekhai/thietbi&title=laptop-macbook');    
     }
if(isset($_POST['save'])){
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
    $lss1 = $_POST['lss1'];
    $lss2 = $_POST['lss2'];
    $lss3 = $_POST['lss3'];
    
    $check = mysqli_query($db,"SELECT * FROM cp_keylicenses WHERE keylicense='$lss1'");
    $row9 = mysqli_fetch_assoc($check);
    $check1 = mysqli_query($db,"SELECT * FROM cp_keylicenses WHERE keylicense='$lss2'");
    $row91 = mysqli_fetch_assoc($check1);   
    $check2 = mysqli_query($db,"SELECT * FROM cp_keylicenses WHERE keylicense='$lss3'");
    $row92 = mysqli_fetch_assoc($check2);
    if($row9['count'] == 5 || $row91['count'] == 5 || $row92['count'] == 5){
      thongbao('License : '.$lss1.''.$lss2.''.$lss3.' \r\n Đã đủ số lượng người dùng ! Không thể Thêm được !');
      chuyentrang('area.php?page=kekhai/thietbi&title=laptop-macbook&chinhsua='.$getit);
    }

    $kt = mysqli_query($db,"UPDATE cp_devices SET serial='$serial' WHERE mataisan='$getit'");

    if($kt){
      mysqli_query($db,"UPDATE cp_devices SET phanloai='$phanloai' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET hieu='$hieu' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET tentaisan='$tentaisan' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET nguoisudung='$nguoisudung' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET nguoiquanly='$nguoiquanly' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET nguoichu='$nguoichu' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET cauhinh='$cauhinh' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET tinhtrang='$tinhtrang' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET chitiet='$tinhtrangchitiet' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET bophan='$bophan' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET ngaymua='$ngaymua' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET hanbaohanh='$hanbaohanh' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET giatien='$giatien' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET nhacungcap='$nhacungcap' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET ngaysudungcuoi='$ngaysudungcuoi' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET khauhao='$khauhao' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET giathanhly='$giathanhly' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET lanmot='$lanmot' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET lanhai='$lanhai' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET lanba='$lanba' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET suachua='$suachua' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET lichsuthietbi='$lichsusudung' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET ghichu='$noted' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET licensekey1='$lss1' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET licensekey2='$lss2' WHERE mataisan='$getit'");
      mysqli_query($db,"UPDATE cp_devices SET licensekey3='$lss3' WHERE mataisan='$getit'");
if($row['licensekey1'] == NULL || $row['licensekey1'] == "" || $row['licensekey1'] != $lss1 ){
      mysqli_query($db,"UPDATE cp_keylicenses SET count=count+1 WHERE keylicense='$lss1'");
}
if($row['licensekey2'] == NULL || $row['licensekey2'] == "" || $row['licensekey2'] != $lss2 ){
      mysqli_query($db,"UPDATE cp_keylicenses SET count=count+1 WHERE keylicense='$lss2'");
} 
if($row['licensekey3'] == NULL || $row['licensekey3'] == "" || $row['licensekey3'] != $lss3 ){
      mysqli_query($db,"UPDATE cp_keylicenses SET count=count+1 WHERE keylicense='$lss3'");
}     
      
      
      
      thongbao('Cập nhật dữ liệu mới thành công !');
      chuyentrang('area.php?page=kekhai/thietbi&title=laptop-macbook&chinhsua='.$getit);
    }else{
      thongbao('Đã có lỗi xảy ra ! vui lòng liên hệ người tạo Tool');
      chuyentrang('area.php?page=kekhai/thietbi&title=laptop-macbook');
    }
}      
     include('chinhsua.php');
}else if(isset($_GET['download'])){
    $chonfile = $_GET['download'];
    $ketnoi = mysqli_query($db,"SELECT * FROM cp_devices WHERE phanloai='$chonfile'");
    $chon = mysqli_fetch_array($ketnoi,MYSQLI_ASSOC); 
      if($_GET['download'] == NULL || $_GET['download'] == ""){
        thongbao('Giá trị tìm kiếm không được để trống !');
        chuyentrang('area.php?page=kekhai/thietbi&title=laptop-macbook');    
      }else if($chonfile != $chon['phanloai']){
        thongbao('Giá trị bạn tìm không đúng, vui lòng kiểm tra lại !');
        chuyentrang('area.php?page=kekhai/thietbi&title=laptop-macbook'); 
      }else {
        chuyentrang('./excel/export.php?choose='.$chonfile.'');

      }
    }
   

?>    


            <!-- /.box-header -->
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">
              <a href="area.php?page=add-kekhai/thietbi" class="btn btn-app"><i class="fa fa-plus"></i> THÊM THIẾT BỊ</a> 
                <a href="area.php?page=kekhai/thietbi&title=laptop-macbook&download=<? echo $row['phanloai']; ?>" class="btn btn-app"><i class="fa fa-download"></i> TẢI EXCEL</a> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="display" style="width:100%">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Mã Tài Sản</th>
                  <th>Serial</th>
                  <th>Tên Tài Sản</th>
                  <th>Người Sử Dụng</th>
                  <th>Cấu Hình</th>
                  <th>Tình Trạng</th>
                  <th>Tình Trạng Chi Tiết</th>
                  <th>Lịch Sử Người Dùng</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
            <?
              $c=0;
         	    $stt=1;	
              $conn = mysqli_query($db,"SELECT * FROM cp_devices WHERE phanloai='Laptop' OR phanloai='Macbook'");
              while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC))
              {
                         
            ?>                    
                <tr>
                  <td><? echo $stt; ?></td>
                  <td><? echo $row['mataisan']; ?></td>
                  <td><? echo $row['serial']; ?></td>
                  <td><? echo $row['phanloai']." "; echo $row['tentaisan']; ?></td>
                  <td width="14%"><? echo $row['nguoisudung']; ?></td>
                  <td><? echo $row['cauhinh']; ?></td>
                  <td><? tinhtrang($row['tinhtrang']); ?></td>
                  <td width="14%"><? echo $row['chitiet']; ?></td>
                  <td width="25%"><? echo $row['lichsuthietbi']; ?></td>
                  <td><a href="area.php?page=kekhai/thietbi&title=laptop-macbook&chinhsua=<? echo $row['mataisan']; ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-dep<? echo $stt; ?>">
                  <i class="fa fa-eye"></i>
                </button>
              </td>
                </tr>
            <?
              include ('viewer.php');
              $c++; $stt++; } 
            ?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->