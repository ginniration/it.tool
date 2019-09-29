<?
require("../controls/settings.php");
    $ticket = $_POST['ticket'];
    $tenticket = $_POST['tenticket'];
    $pl = $_POST['pl'];
    $nguoiguiticket = $_POST['nguoiguiticket'];
    $bp = $_POST['bp'];
    $nguoixuly = $_POST['nguoixuly'];
    $loi = $_POST['loi'];
    $loithucte = $_POST['loithucte'];
    $giaiphap = $_POST['giaiphap'];
    $conn = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin ORDER BY stt DESC");
    $row=mysqli_fetch_array($conn,MYSQLI_ASSOC);
    $code = $row['stt']+1;
    $code = md5($code);
      
          if($ticket == NULL || $ticket == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Số Ticket</font> !
                </div>
              ';  
          }else if($tenticket == NULL || $tenticket == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Tên của Ticket</font> !
                </div>
              ';  
          }else if($pl == NULL || $pl == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Bạn chưa chọn Phân loại</font> !
                </div>
              ';  
          }else if($nguoiguiticket == NULL || $nguoiguiticket == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Vui lòng điền tên người gửi Ticket </font> !
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
          }else if($bp == NULL || $bp == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Vui lòng chọn Bộ phận cho người gửi Ticket</font> !
                </div>
              ';  
          }else if($loi == NULL || $loi == "" || $loithucte == NULL || $loithucte == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống Lỗi - Lỗi Thực Tế</font> !
                </div>
              ';  
          }else if($giaiphap == NULL || $giaiphap == ""){
              echo '
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                  <font size="+2">Không được để trống hướng xử lý ( Giải pháp )</font> !
                </div>
              ';  
          }else {
            mysqli_query($db,"INSERT INTO cp_reports_hr_admin (ticket,tenticket,phanloai,nguoiguiticket,bophan,loi,loithucte,giaiphap,nguoixuly,md5) VALUES ('$ticket',N'$tenticket',N'$pl','$nguoiguiticket',N'$bp',N'$loi',N'$loithucte',N'$giaiphap','$nguoixuly','$code')"); 
                              echo '
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> SUCCESS !</h4>
                                        <font size="+2">Đã Thêm Báo Cáo HR- ADMIN : '.$ticket.'!<br> Nhấn [F5] để Tải lại Trang !
                                     </div> 
                                ';    
          }
 
?>