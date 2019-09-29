<?
session_start();
require("../controls/settings.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
      		   $trueuname = $_SESSION['user'];
             $oldpass = $_POST['oldpass'];
             $newpass = $_POST['newpass'];
             $rnewpass = $_POST['rnewpass'];
             $ooldpass = md5($oldpass);
             $nnewpass = md5($newpass);   
                  $check = mysqli_query($db,"SELECT * FROM cp_adminwb WHERE muser='$trueuname'");
                  $row=mysqli_fetch_array($check,MYSQLI_ASSOC);
                        if($oldpass == NULL || $oldpass == ""){
                        	echo '
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                                        <font size="+2">Vui lòng nhập mật khẩu hiện tại đang sử dụng !
                                    </div>
                                ';
                        }else if($newpass == NULL || $newpass == ""){
                          echo '
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                                        <font size="+2">Vui lòng nhập mật khẩu mới !
                                    </div>
                                ';
                        }else if($rnewpass == NULL || $rnewpass == ""){
                          echo '
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                                        <font size="+2">Vui lòng nhập xác nhận mật khẩu mới !
                                    </div>
                                ';
                        }else if($newpass != $rnewpass){
                          echo '
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> WARNING !</h4>
                                        <font size="+2">Mật khẩu mới & Xác nhận mật khẩu không trùng khớp nhau
                                    </div>
                                ';
                        }else if(strlen($newpass) < 10){
                              echo '
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> ERROR !</h4>
                                        <font size="+2">Mật khẩu mới phải trên 10 ký tự !
                                    </div>
                                ';
                        }else if($row['mdd5'] != $ooldpass){
                              echo '
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> ERROR !</h4>
                                        <font size="+2">Nhập mật khẩu cũ không đúng vui lòng thử lại !
                                    </div>
                                ';
                        }else if($check){
                              mysqli_query($db,"UPDATE cp_adminwb SET mdd5='$nnewpass' WHERE muser='$trueuname'");

                              echo '
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> SUCCESS !</h4>
                                        <font size="+2">Đã Cập nhật Mật khẩu mới vào lúc '.date("d-m-Y | h:i:s a").' !<br> Nhấn [F5] để cập nhật thông tin trên.
                                     </div> 
                                ';                          
                        }else {
                            echo mysqli_error($db);
                        }

?>