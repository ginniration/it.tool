<?
require("../controls/settings.php");

    $ngayxuly = $_POST['ngayxl'];
    $tbdv = $_POST['tbdv'];
    $ncc = $_POST['ncc'];
    $ticket = $_POST['ticket'];
    $chiphi = $_POST['chiphi'];
    $nsd = $_POST['nsd'];
    $sl = $_POST['sl'];
    $conn = mysqli_query($db,"SELECT * FROM cp_reports_shoping ORDER BY stt DESC");
    $row=mysqli_fetch_array($conn,MYSQLI_ASSOC);
    $code = $row['stt']+1;
    $code = md5($code);
          if($ngayxuly == NULL || $ngayxuly == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Ngày Xử Lý</font> !
                </div>
              ';  exit();
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
          }else if($nsd == NULL || $nsd == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Người Sử Dụng, nếu không có người sử dụng mặc định IT</font> !
                </div>
              ';  
          }else if($sl == NULL){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Số lượng</font> !
                </div>
              ';  
          }else {
            mysqli_query($db,"INSERT INTO cp_reports_shoping(ngay,loai,tenthietbi,nhacungcap,ticket,nguoisudung,soluong,giatien,codez) VALUES ('$ngayxuly',N'Mua Sắm',N'$tbdv','$ncc','$ticket',N'$nsd','$sl','$chiphi','$code')"); 
                              echo '
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> SUCCESS !</h4>
                                        <font size="+2">Đã Thêm Báo Cáo : '.$tbdv.'!<br> Nhấn [F5] để Tải lại Trang !
                                     </div> 
                                ';    
          }
?>