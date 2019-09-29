<?
require("../controls/settings.php");

      		        $kl = $_POST['kl'];
                  $tl = $_POST['tl'];
                  $tgt = $_POST['tgt'];
                  $tkl = $_POST['tkl'];
                  $dm = $_POST['danhmuc'];
                  $md5kl = md5($kl);
                  $check = mysqli_query($db,"SELECT * FROM cp_keylicenses WHERE keylicense='$kl'");
                  $row=mysqli_fetch_array($check,MYSQLI_ASSOC);
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
                                        <font size="+2">Ký tự tối thiểu nhập License không hợp lệ !
                                    </div>
                                ';
                        }else if($row['keylicense'] == $kl){
                              echo '
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> ERROR !</h4>
                                        <font size="+2">Key đã tồn tại, vui lòng nhập Key khác !
                                    </div>
                                ';
                        }else {
                              mysqli_query($db,"INSERT INTO cp_keylicenses (keylicense,getdate,namelicense,accountlicense,coded,danhmuc) VALUES ('$kl','$tgt',N'$tl',N'$tkl','$md5kl','$dm')");                             
                              echo '
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> SUCCESS !</h4>
                                        <font size="+2">Đã thêm License Key: '.$kl.'!<br> Nhấn [F5] để cập nhật List Key License
                                     </div> 
                                ';                        	
                        }

?>