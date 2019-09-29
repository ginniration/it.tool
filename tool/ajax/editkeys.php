
<?
require("../controls/settings.php");

date_default_timezone_set('Asia/Ho_Chi_Minh');
      		        $kl = $_POST['kl'];
                  $tl = $_POST['tl'];
                  $tgt = $_POST['tgt'];
                  $tkl = $_POST['tkl'];
                  $dm = $_POST['danhmuc'];
                  $mh = $_POST['mh'];
                  $md5kl = md5($kl);
                  
                  $check = mysqli_query($db,"SELECT * FROM cp_keylicenses WHERE coded='$mh'");
                        if($kl == NULL || $kl == "" || $tl == NULL || $tl == "" || $tgt == NULL || $tgt == "" || $dm == NULL || $dm == "NULL"){
                        	echo '
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                                        <font size="+2">Không được để trống Trường nào có dấu </font><font color="red" size="+3">*</font> !
                                    </div>
                                ';
                        }else if(strlen($kl) < 10){
                              echo '
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> ERROR !</h4>
                                        <font size="+2">Ký tự tối thiểu nhập Key License không hợp lệ !
                                    </div>
                                ';
                        }else if($check){
                              mysqli_query($db,"UPDATE cp_keylicenses SET keylicense='$kl' WHERE coded='$mh'");
                              mysqli_query($db,"UPDATE cp_keylicenses SET getdate='$tgt' WHERE coded='$mh'"); 
                              mysqli_query($db,"UPDATE cp_keylicenses SET namelicense='$tl' WHERE coded='$mh'"); 
                              mysqli_query($db,"UPDATE cp_keylicenses SET accountlicense='$tkl' WHERE coded='$mh'");    
                              mysqli_query($db,"UPDATE cp_keylicenses SET danhmuc='$dm' WHERE coded='$mh'");

                              echo '
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> SUCCESS !</h4>
                                        <font size="+2">Đã Cập nhật dữ liệu mới vào lúc '.date("d-m-Y | h:i:s a").' !<br> Nhấn [F5] để cập nhật thông tin trên.
                                     </div> 
                                ';                        	
                        }

?>