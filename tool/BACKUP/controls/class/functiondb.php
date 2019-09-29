<?
// CP_DEVICES
function lancuoidangnhap($admin){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_adminlog WHERE name='$admin' ORDER BY stt(-1) DESC");
            $row=mysqli_fetch_array($check,MYSQLI_ASSOC);
            echo $row['timelogin'];
}
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

// START CP_REPORTS_FIXED
function tongtiensuachua(){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
        // TỔNG TIỀN START    
            $check = mysqli_query($db,"SELECT SUM(chiphi) as total FROM cp_reports_fixed");
			while ($row = mysqli_fetch_assoc($check))
			{ 
			   echo "Tổng tiền sữa chửa: ".number_format($row['total'])." VNĐ";
			}            
        // END

        // Sóng Nam START
        	$check1 = mysqli_query($db,"SELECT SUM(chiphi) as total1 FROM cp_reports_fixed WHERE nhacungcap='11'");
			while ($row1 = mysqli_fetch_assoc($check1))
			{ 
			   echo "<br><small style='text-decoration: overline;'> Sóng Nam: ".number_format($row1['total1'])." VNĐ </small>";
			}	        	
        // END

        // Ánh Phương START
			$check2 = mysqli_query($db,"SELECT SUM(chiphi) as total2 FROM cp_reports_fixed WHERE nhacungcap='22'");	
			while ($row2 = mysqli_fetch_assoc($check2))
			{ 
			   echo "|| <small style='text-decoration: overline;'> Ánh Phương: ".number_format($row2['total2'])." VNĐ </small>";
			}				
		// END

        // Lan Anh START
			$check3 = mysqli_query($db,"SELECT SUM(chiphi) as total3 FROM cp_reports_fixed WHERE nhacungcap='33'");	
			while ($row3 = mysqli_fetch_assoc($check3))
			{ 
			   echo "|| <small style='text-decoration: overline;'> Lan Anh: ".number_format($row3['total3'])." VNĐ </small>";
			}				
		// END		

        // Hoàng Tuấn START
			$check4 = mysqli_query($db,"SELECT SUM(chiphi) as total4 FROM cp_reports_fixed WHERE nhacungcap='44'");	
			while ($row4 = mysqli_fetch_assoc($check4))
			{ 
			   echo "|| <small style='text-decoration: overline;'> Hoàng Tuấn: ".number_format($row4['total4'])." VNĐ </small>";
			}				
		// END				
}
function chonnhacungcap($admin){
	        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            mysqli_set_charset($db,"utf8");
            $check = mysqli_query($db,"SELECT * FROM cp_nhacungcap WHERE codes='$admin'");
            $row=mysqli_fetch_array($check,MYSQLI_ASSOC);
            echo $row['tennhacungcap'];
}
// END CP_REPORTS_FIXED
?>