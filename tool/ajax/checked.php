
<?
			$kiemtra = $_POST['mts'];
			DEFINE('HOST', 'localhost');
			DEFINE('USRNM', 'root');
			DEFINE('PSWD', '');
			DEFINE('DBNM', 'imt');
			$db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
			mysqli_set_charset($db,"utf8");
            $check = mysqli_query($db,"SELECT * FROM cp_devices WHERE mataisan='$kiemtra'");
            $row=mysqli_fetch_array($check,MYSQLI_ASSOC);

            if($kiemtra == NULL || $kiemtra == ""){
            	echo '<font color="red"> Không được để trống </font>';
            }else if(strlen($kiemtra) > 13 || strlen($kiemtra) < 13){
            	echo '<font color="red"> Mã tài sản bạn tạo không hợp lệ ( Xem lại Policy IMT ) </font>';
            }else if($row['mataisan'] == $kiemtra){
            	echo '<font color="red"> Mã này đã được sử dụng </font>';
            }else {
            	echo '<font color="green"> Bạn có thể sử dụng mã này </font>';
            }

?>