<?
// CP_DEVICES
function tongnhanvien(){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_employee");
            $rows = mysqli_num_rows($check);
            echo $rows;
}
function tongtruycap($admin){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_adminlog WHERE name='$admin'");
            $rows = mysqli_num_rows($check);
            echo $rows;
}
function tongthietbi(){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_devices");
          	$rows = mysqli_num_rows($check);         
            echo $rows;
}
function dangsudung(){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_devices WHERE tinhtrang='In-Use'");
            $rows = mysqli_num_rows($check);
            echo $rows;
}
function huhong(){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_devices WHERE tinhtrang='Damage'");
            $rows = mysqli_num_rows($check);
            echo $rows;
}
function tongthietbimobile(){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_mobiles");
          	$rows = mysqli_num_rows($check);         
            echo $rows;
}
function dangsudungmobile(){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_mobiles WHERE tinhtrang='In-Use'");
          	$rows = mysqli_num_rows($check);         
            echo $rows;
}
function huhongmobile(){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_mobiles WHERE tinhtrang='Damage'");
          	$rows = mysqli_num_rows($check);         
            echo $rows;
}
// END CP_DEVICES
function suachuahradmin(){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin WHERE bophan='HR'");
            $rows = mysqli_num_rows($check);         
            $check1 = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin WHERE bophan='Admin'");
            $rows1 = mysqli_num_rows($check1); 
            $check2 = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin");
            $rows2 = mysqli_num_rows($check2);             
            echo "<span class='btn btn-block btn-default'> Total Ticket : ".$rows2."</span>";
            echo "<small style='text-decoration: overline;' class='btn btn-block btn-primary'>Admin: ".$rows1. "</small>"; 
            echo "<small style='text-decoration: overline;' class='btn btn-block btn-success'>HR: ".$rows."</small>";             
            
}

// START CP_REPORTS_FIXED
function tongtiensuachua(){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
        // TỔNG TIỀN START    
            $check = mysqli_query($db,"SELECT SUM(chiphi) as total FROM cp_reports_fixed");
			$row = mysqli_fetch_assoc($check);
			echo "Tổng tiền sửa chữa: ".number_format($row['total'])." VNĐ";
        // END

        // Sóng Nam START
        	$check1 = mysqli_query($db,"SELECT SUM(chiphi) as total1 FROM cp_reports_fixed WHERE nhacungcap='11'");
			$row1 = mysqli_fetch_assoc($check1);
			echo "<br><small style='text-decoration: overline;'> Sóng Nam: ".number_format($row1['total1'])." VNĐ </small>";
        // END

        // Ánh Phương START
			$check2 = mysqli_query($db,"SELECT SUM(chiphi) as total2 FROM cp_reports_fixed WHERE nhacungcap='22'");	
			$row2 = mysqli_fetch_assoc($check2); 
			echo "|| <small style='text-decoration: overline;'> Ánh Phương: ".number_format($row2['total2'])." VNĐ </small>";				
		// END

        // Lan Anh START
			$check3 = mysqli_query($db,"SELECT SUM(chiphi) as total3 FROM cp_reports_fixed WHERE nhacungcap='33'");	
			$row3 = mysqli_fetch_assoc($check3); 
			echo "|| <small style='text-decoration: overline;'> Lan Anh: ".number_format($row3['total3'])." VNĐ </small>";	
		// END		

        // Hoàng Tuấn START
			$check4 = mysqli_query($db,"SELECT SUM(chiphi) as total4 FROM cp_reports_fixed WHERE nhacungcap='44'");	
			$row4 = mysqli_fetch_assoc($check4);
			echo "|| <small style='text-decoration: overline;'> Hoàng Tuấn: ".number_format($row4['total4'])." VNĐ </small>";
		// END		
        // Khác START
            $check5 = mysqli_query($db,"SELECT SUM(chiphi) as total5 FROM cp_reports_fixed WHERE nhacungcap=''"); 
            $row5 = mysqli_fetch_assoc($check5);
            echo "|| <small style='text-decoration: overline;'> Khác: ".number_format($row5['total5'])." VNĐ </small>";
        // END  
}

// END CP_REPORTS_FIXED

// START CP_REPORTS_SHOPING
function tongtienmuasam(){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
        // TỔNG TIỀN START    
            $check = mysqli_query($db,"SELECT SUM(giatien) as total FROM cp_reports_shoping");
            $row = mysqli_fetch_assoc($check);
            echo "Tổng tiền sửa chữa: ".number_format($row['total'])." VNĐ";
        // END

        // Sóng Nam START
            $check1 = mysqli_query($db,"SELECT SUM(giatien) as total1 FROM cp_reports_shoping WHERE nhacungcap='11'");
            $row1 = mysqli_fetch_assoc($check1);
            echo "<br><small style='text-decoration: overline;'> Sóng Nam: ".number_format($row1['total1'])." VNĐ </small>";
        // END

        // Ánh Phương START
            $check2 = mysqli_query($db,"SELECT SUM(giatien) as total2 FROM cp_reports_shoping WHERE nhacungcap='22'"); 
            $row2 = mysqli_fetch_assoc($check2); 
            echo "|| <small style='text-decoration: overline;'> Ánh Phương: ".number_format($row2['total2'])." VNĐ </small>";               
        // END

        // Lan Anh START
            $check3 = mysqli_query($db,"SELECT SUM(giatien) as total3 FROM cp_reports_shoping WHERE nhacungcap='33'"); 
            $row3 = mysqli_fetch_assoc($check3); 
            echo "|| <small style='text-decoration: overline;'> Lan Anh: ".number_format($row3['total3'])." VNĐ </small>";  
        // END      

        // Hoàng Tuấn START
            $check4 = mysqli_query($db,"SELECT SUM(giatien) as total4 FROM cp_reports_shoping WHERE nhacungcap='44'"); 
            $row4 = mysqli_fetch_assoc($check4);
            echo "|| <small style='text-decoration: overline;'> Hoàng Tuấn: ".number_format($row4['total4'])." VNĐ </small>";
        // END

        // Cửa hàng chuyên hàng xách tay Đình Cư START
            $check6 = mysqli_query($db,"SELECT SUM(giatien) as total6 FROM cp_reports_shoping WHERE nhacungcap='55'"); 
            $row6 = mysqli_fetch_assoc($check6);
            echo "|| <small style='text-decoration: overline;'> Cửa hàng chuyên hàng xách tay Đình Cư: ".number_format($row6['total6'])." VNĐ </small>";
        // END        

        // Mua bán điện thoại xách tay Thanh Hải START
            $check7 = mysqli_query($db,"SELECT SUM(giatien) as total7 FROM cp_reports_shoping WHERE nhacungcap='66'"); 
            $row7 = mysqli_fetch_assoc($check7);
            echo "|| <small style='text-decoration: overline;'> Mua bán điện thoại xách tay Thanh Hải: ".number_format($row7['total7'])." VNĐ </small>";
        // END   
 
         // Mua bán điện thoại xách tay Thanh Hải START
            $check8 = mysqli_query($db,"SELECT SUM(giatien) as total8 FROM cp_reports_shoping WHERE nhacungcap='77'"); 
            $row8 = mysqli_fetch_assoc($check7);
            echo "|| <small style='text-decoration: overline;'> OnePlus Viet.net: ".number_format($row8['total8'])." VNĐ </small>";
        // END   

        // Khác START
            $check5 = mysqli_query($db,"SELECT SUM(giatien) as total5 FROM cp_reports_shoping WHERE nhacungcap=''"); 
            $row5 = mysqli_fetch_assoc($check5);
            echo "|| <small style='text-decoration: overline;'> Khác: ".number_format($row5['total5'])." VNĐ </small>";
        // END             
}

function chonnhacungcap($admin){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            mysqli_set_charset($db,"utf8");
            $check = mysqli_query($db,"SELECT * FROM cp_nhacungcap WHERE codes='$admin'");
            $row=mysqli_fetch_array($check,MYSQLI_ASSOC);
            if($admin == NULL || $admin == ""){
                echo "NONE";
            }else {
                echo $row['tennhacungcap']; 
            }
            
}

function dmlicense($a){ 
            if($a == "ms-win"){
                echo "MS Office WinOS";
            }else if ($a == "ms-mac"){
                echo "MS Office MacOS";
            }else if ($a == "ms-visio"){
                echo "MS Visio";
            }else if ($a == "ms-project"){
                echo "MS Project 2013";
            }else if ($a == "win-7"){
                echo "Windows 7";
            }else if ($a == "win-10"){
                echo "Windows 10";
            }else if ($a == "win-sv2012"){
                echo "Windows Server 2012";
            }else if ($a == "win-sv2016"){
                echo "Windows Server 2016";
            }
}

function chonbophan($a){
    if($a == 'HR'){
       echo "<span class='btn btn-block btn-success'>".$a."</span>";
    }else if ($a == 'Admin'){
         echo "<span class='btn btn-block btn-primary'>".$a."</span>";
    }else {
         echo "<span class='btn btn-block btn-default'>".$a."</span>";
    }
}

// END CP_REPORTS_SHOIPING
function tinhtrang($a){
            if($a == "In-Use"){
                echo '<button type="button" class="btn btn-block btn-success btn-sm">In-Use</button>';
            }else if($a == "Spare"){
                echo '<button type="button" class="btn btn-block btn-default btn-sm">Spare</button>';
            }else if($a == "Damage"){
                echo'<button type="button" class="btn btn-block btn-danger btn-sm">Damage</button>';
            }
}

// START THÊM THIẾT BỊ
function phanloai(){
            echo '<option value="NONE" selected="selected">Chọn phân loại</option>';
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");mysqli_set_charset($db,"utf8");
            $check = mysqli_query($db,"SELECT * FROM cp_devices GROUP BY phanloai");
            $check1 = mysqli_query($db,"SELECT * FROM cp_mobiles GROUP BY phanloai");

            while($row=mysqli_fetch_array($check,MYSQLI_ASSOC))
              {
                echo '<option value="'.$row['phanloai'].'">'.$row['phanloai'].'</option>';
              } 
            while($row1=mysqli_fetch_array($check1,MYSQLI_ASSOC))
              {
                echo '<option value="'.$row1['phanloai'].'">'.$row1['phanloai'].'</option>';
              }                     
}
// END THÊM THIẾT BỊ

function nhacungcap($admin){

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            mysqli_set_charset($db,"utf8");
            $check = mysqli_query($db,"SELECT * FROM cp_reports_fixed WHERE nhacungcap='$admin'");
            $row=mysqli_fetch_array($check,MYSQLI_ASSOC);
            $choosen = $row['nhacungcap'];
            $check1 = mysqli_query($db,"SELECT * FROM cp_nhacungcap");
                 if($admin == NULL || $admin == ""){
                    echo '<option value="NULL" selected>Chọn Nhà Cung Cấp</option>'; 
                    }else {
                         echo '<option value="NULL">Chọn Nhà Cung Cấp</option>'; 
                    }           
            while($row1=mysqli_fetch_array($check1,MYSQLI_ASSOC)){

                 echo '<option value="'.$row1['codes'].'" ';
                 if($row['nhacungcap'] == $row1['codes']){ echo "selected"; }
                 echo  ' >'.$row1['tennhacungcap'].'</option>';
            }

                                        
}

function phanloaihradmin($admin){

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            mysqli_set_charset($db,"utf8");
            $check = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin WHERE phanloai='$admin'");
            $row=mysqli_fetch_array($check,MYSQLI_ASSOC);
            $choosen = $row['phanloai'];
            $check1 = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin GROUP BY phanloai");
                 if($admin == NULL || $admin == ""){
                    echo '<option value="NULL" selected>Chọn Phân Loại</option>'; 
                    }else {
                         echo '<option value="NULL">Chọn Phân Loại</option>'; 
                    }           
            while($row1=mysqli_fetch_array($check1,MYSQLI_ASSOC)){

                 echo '<option value="'.$row1['phanloai'].'" ';
                 if($choosen == $row1['phanloai']){ echo "selected"; }
                 echo  ' >'.$row1['phanloai'].'</option>';
            }

                                        
}

function bophanhradmin($admin){

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            mysqli_set_charset($db,"utf8");
            $check = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin WHERE bophan='$admin'");
            $row=mysqli_fetch_array($check,MYSQLI_ASSOC);
            $choosen = $row['bophan'];
            $check1 = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin GROUP BY bophan");
                 if($admin == NULL || $admin == ""){
                    echo '<option value="NULL" selected>Chọn Bộ Phận</option>'; 
                    }else {
                         echo '<option value="NULL">Chọn Bộ Phận</option>'; 
                    }           
            while($row1=mysqli_fetch_array($check1,MYSQLI_ASSOC)){

                 echo '<option value="'.$row1['bophan'].'" ';
                 if($choosen == $row1['bophan']){ echo "selected"; }
                 echo  ' >'.$row1['bophan'].'</option>';
            }

                                        
}
function danhmuclicense($admin){

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            mysqli_set_charset($db,"utf8");
            $check = mysqli_query($db,"SELECT * FROM cp_keylicenses WHERE danhmuc='$admin'");
            $row=mysqli_fetch_array($check,MYSQLI_ASSOC);
            $check1 = mysqli_query($db,"SELECT * FROM cp_keylicenses GROUP BY danhmuc");

                 if($admin == NULL || $admin == ""){
                    echo '<option value="" selected>Chọn Danh Mục</option>'; 
                    }else {
                         echo '<option value="">Chọn Danh Mục</option>'; 
                    }           
            while($row1=mysqli_fetch_array($check1,MYSQLI_ASSOC)){

                 echo '<option value="'.$row1['danhmuc'].'"  ';
                 if($row['danhmuc'] == $row1['danhmuc']){ echo 'selected>'; }else { echo ">";}
                echo  ' '.dmlicense($row1['danhmuc']).'</option>';
            }                       
}

function dlicense($admin){

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            mysqli_set_charset($db,"utf8");
            $check = mysqli_query($db,"SELECT * FROM cp_keylicenses WHERE keylicense='$admin'");
            $row=mysqli_fetch_array($check,MYSQLI_ASSOC);
            $check1 = mysqli_query($db,"SELECT * FROM cp_keylicenses");

                 if($admin == NULL || $admin == ""){
                    echo '<option value="" selected>Chọn License Key</option>'; 
                    }else {
                         echo '<option value="">Chọn License Key</option>'; 
                    }           
            while($row1=mysqli_fetch_array($check1,MYSQLI_ASSOC)){

                 echo '<option value="'.$row1['keylicense'].'"  ';
                 if($row['keylicense'] == $row1['keylicense']){ echo 'selected>'; }else { echo ">";}
                echo  dmlicense($row1['danhmuc']).' => '.$row1['keylicense'].'</option>';
            }                       
}
function lienketphanloai($a,$b){

        if($a == "Laptop" || $a == "Macbook"){
            echo '<a href="area.php?page=kekhai/thietbi&title=laptop-macbook&chinhsua='.$b.'" class="btn btn-primary"> Chỉnh Sửa </a>';
        }else if($a == "Bàn phím" || $a == "Chuột"){
            echo '<a href="area.php?page=kekhai/thietbi&title=chuot-banphim&chinhsua='.$b.'" class="btn btn-primary"> Chỉnh Sửa </a>';
        }else if($a == "PC" || $a == "MacMINI"){
            echo '<a href="area.php?page=kekhai/thietbi&title=chuot-banphim&chinhsua='.$b.'" class="btn btn-primary"> Chỉnh Sửa </a>';
        }else if($a == "DVD external" || $a == "Điện thoại bàn" || $a == "Máy FAX" || $a == "Máy hút bụi" || $a == "Máy huỷ giấy" || $a == "Máy in" || $a == "Máy Scan" || $a == "Ổ cắm điện" || $a == "Ổ cứng di động" || $a == "Tai Nghe" || $a == "Tivi" || $a == "UPS" || $a == "USB"){
            echo '<a href="area.php?page=kekhai/thietbi&title=thiet-bi-khac&chinhsua='.$b.'" class="btn btn-primary"> Chỉnh Sửa </a>';
        }else {
            echo '<a href="area.php?page=kekhai/thietbi&chinhsua='.$b.'" class="btn btn-primary"> Chỉnh Sửa </a>';
        }
                      
}
function lienketphanloaialldevice($a,$b){

        if($a == "Laptop" || $a == "Macbook"){
            echo '<a href="area.php?page=kekhai/thietbi&title=laptop-macbook&chinhsua='.$b.'" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
        }else if($a == "Bàn phím" || $a == "Chuột"){
            echo '<a href="area.php?page=kekhai/thietbi&title=chuot-banphim&chinhsua='.$b.'" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
        }else if($a == "PC" || $a == "MacMINI"){
            echo '<a href="area.php?page=kekhai/thietbi&title=chuot-banphim&chinhsua='.$b.'" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
        }else if($a == "DVD external" || $a == "Điện thoại bàn" || $a == "Máy FAX" || $a == "Máy hút bụi" || $a == "Máy huỷ giấy" || $a == "Máy in" || $a == "Máy Scan" || $a == "Ổ cắm điện" || $a == "Ổ cứng di động" || $a == "Tai Nghe" || $a == "Tivi" || $a == "UPS" || $a == "USB"){
            echo '<a href="area.php?page=kekhai/thietbi&title=thiet-bi-khac&chinhsua='.$b.'" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
        }else {
            echo '<a href="area.php?page=kekhai/thietbi&chinhsua='.$b.'" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
        }
                      
}
?>