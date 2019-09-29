<?
require("../controls/settings.php");

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
    $conn = mysqli_query($db,"SELECT * FROM cp_reports_fixed ORDER BY stt DESC");
    $row=mysqli_fetch_array($conn,MYSQLI_ASSOC);
    $code = $row['stt']+1;
    $code = md5($code);
      $addreport = mysqli_query($db,"INSERT INTO cp_reports_fixed (ngay,loai,thietbi-dichvu,nhacungcap,ticket,mataisan,nguoixuly,nguoisudung,mota,giaiphap,chiphi,codez) VALUES ('$ngayxuly',N'Sửa chữa',N'$tbdv',N'$ncc','$ticket','$mts',N'$nguoixuly',N'$nsd',N'$vande',N'$giaiphap','$chiphi','$code')"); 
          if($ngayxuly == NULL || $ngayxuly == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Ngày Xử Lý</font> !
                </div>
              ';  
          }else if($mts == NULL || $mts == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Mã Tài Sản</font> !
                </div>
              ';  
          }else if($tbdv == NULL || $tbdv == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Thiết bị - Dịch vụ</font> !
                </div>
              ';  
          }else if($ncc == NULL || $ncc == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Nhà Cung Cấp</font> !
                </div>
              ';  
          }else if($ticket == NULL || $ticket == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống số Ticket ! Nếu không có Ticket vui lòng để số 0</font> !
                </div>
              ';  
          }else if($nguoixuly == NULL || $nguoixuly == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Người Xử Lý</font> !
                </div>
              ';  
          }else if($nsd == NULL || $nsd == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Người Sử Dụng, nếu không có người sử dụng mặc định IT</font> !
                </div>
              ';  
          }else if($vande == NULL || $vande == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Vấn Đề</font> !
                </div>
              ';  
          }else if($giaiphap == NULL || $giaiphap == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Giải Pháp</font> !
                </div>
              ';  
          }else if(strlen($mts) > 13 || strlen($mts) < 13 ) {
                              echo '
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> ERROR !</h4>
                                        <font size="+2">Ký Tự Mã Tài Sản không hợp lệ, vui lòng xem lại Policy IMT !
                                    </div>
                                ';
          } else if($addreport){
                              echo '
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> SUCCESS !</h4>
                                        <font size="+2">Đã Thêm Báo Cáo : '.$tbdv.'!<br> Nhấn [F5] để Tải lại Trang !
                                     </div> 
                                ';    
          }else {
                              echo '
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> ERROR !</h4>
                                        <font size="+2">Đã có lỗi kết nối với CDSL ! Vui lòng liên hệ người tạo Tool !
                                    </div>
                                ';
          }
 
?>