<?
if(isset($_GET['chinhsua'])){
      $getit = $_GET['chinhsua'];
      $ketnoi = mysqli_query($db,"SELECT * FROM cp_devices WHERE mataisan='$getit'");
      $chon = mysqli_fetch_array($ketnoi,MYSQLI_ASSOC); 
    if($_GET['chinhsua'] ==  NULL || $_GET['chinhsua'] == "") {
      thongbao('Giá trị không được để trống , vui lòng thử lại !');
      chuyentrang('area.php?page=kekhai/thietbi');
    }else if($getit != $chon['mataisan']){
      thongbao('Thông tin bạn tìm không tồn tại, vui lòng thử lại !');
      chuyentrang('area.php?page=kekhai/thietbi');    
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
    $tinhtrang = $_POST['tt'];
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

    $kt = mysqli_query($db,"UPDATE cp_devices SET serial='$serial' WHERE mataisan='$getit'");
    if($kt){
      thongbao('Cập nhật dữ liệu mới thành công !');
      chuyentrang('area.php?page=kekhai/thietbi&chinhsua='.$getit);
    }else{
      thongbao('Đã có lỗi xảy ra ! vui lòng liên hệ người tạo Tool');
      chuyentrang('area.php?page=kekhai/thietbi');
    }
}      
     include('chinhsua.php');
}
?>    


            <!-- /.box-header -->
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kê Khai Toàn Bộ Thiết Bị</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="display" style="width:100%">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Mã Tài Sản</th>
                  <th>Serial</th>
                  <th>Loại Tài Sản</th>
                  <th>Tên Tài Sản</th>
                  <th>Người Sử Dụng</th>
                  <th>Cấu Hình</th>
                  <th>Tình Trạng</th>
                  <th>Lịch Sử Người Dùng</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
            <?
              $c=0;
         	    $stt=1;	
              $conn = mysqli_query($db,"SELECT * FROM cp_devices");
              while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC))
              {
                         
            ?>                    
                <tr>
                  <td><? echo $stt; ?></td>
                  <td><? echo $row['mataisan']; ?></td>
                  <td><? echo $row['serial']; ?></td>
                  <td><? echo $row['phanloai']; ?></td>
                  <td><? echo $row['tentaisan']; ?></td>
                  <td width="14%"><? echo $row['nguoisudung']; ?></td>
                  <td><? echo $row['cauhinh']; ?></td>
                  <td><? echo $row['tinhtrang']; ?></td>
                  <td width="30%"><? echo $row['lichsuthietbi']; ?></td>
                  <td><a href="area.php?page=kekhai/thietbi&chinhsua=<? echo $row['mataisan']; ?>" class="btn btn-default"><i class="fa fa-edit"></i></a> </td>
                </tr>
            <? $c++; $stt++; } ?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->