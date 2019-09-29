<?
    class Auth{
        private $db;
        private $pass;
         function Pauth($login,$pass){

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $logpass = md5($pass);
            $ip = ipCheck();
            $idate = date('H:i:s d-m-Y');
            $check = mysqli_query($db,"SELECT * FROM cp_adminwb WHERE muser='$login' AND mdd5='$logpass'");
            $rows = mysqli_num_rows($check);
    		$row1= mysqli_fetch_array($check,MYSQLI_ASSOC);

			$stats = mysqli_query($db,"SELECT * FROM cp_adminlog WHERE name='$login' ORDER BY stt DESC");
			$status = mysqli_num_rows($stats);  
			$status1= mysqli_fetch_array($stats,MYSQLI_ASSOC);
			$ldate = $status1['timelogin'];

            $user_agent = $_SERVER['HTTP_USER_AGENT'];	
			$user_os        = getOS();
			$user_browser   = getBrowser();	
			$device_destails = "Dùng trình duyệt : ".$user_browser." <br> Hệ thống : ".$user_os."  <br> Đầy đủ : ".$user_agent."";
			$device_destail = "Dùng trình duyệt : ".$user_browser." <br> Hệ thống : ".$user_os;		

            if($rows){
                mysqli_query($db,"UPDATE cp_adminwb SET ip_login='$ip' WHERE muser='$login'");
                mysqli_query($db,"UPDATE cp_adminwb SET lastlogin='$ldate' WHERE muser='$login'");

                $_SESSION['user'] = $login;
                $_SESSION['date'] = $ldate;
                $_SESSION['ip'] = $ip;
                $_SESSION['quyentruycap'] = $row1['permission'];
                $_SESSION['fullname'] = $row1['tenhienthi'];
                $_SESSION['infomation'] = $device_destail;
                if($status){
                thongbao('Welcome Back, '.$_SESSION['user'].'');
                mysqli_query($db,"INSERT INTO cp_adminlog(name,ip,timelogin,infomation) VALUES ('$login','$ip','$idate',N'$device_destails')");
                chuyentrang('../area.php');
                }else {
                thongbao('Welcome To Control Panel, '.$_SESSION['user'].'');
                mysqli_query($db,"INSERT INTO cp_adminlog(name,ip,timelogin,infomation) VALUES ('$login','$ip','$idate',N'$device_destails')");
                chuyentrang('../area.php');
                }

            }else{
                session_destroy();
                thongbao('Sai tên đăng nhập hoặc mật khẩu không đúng !\r\n REASON : '.mysqli_error($db));
                chuyentrang('../index.php');
            }

         }
         function ipCheck() {
			if (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
			}
			
			elseif (getenv('HTTP_X_REAL_IP')) {
			$ip = getenv('HTTP_X_REAL_IP');
			}
			
			else {
			$ip = $_SERVER['REMOTE_ADDR'];
			}
			
			return $ip;
		}
			
		function getOS() { 
			$user_agent = $_SERVER['HTTP_USER_AGENT'];	
			global $user_agent;
	
			$os_platform  = "Unknown OS Platform";
	
			$os_array     = array(
														'/windows nt 10/i'      =>  'Windows 10',
														'/windows nt 6.3/i'     =>  'Windows 8.1',
														'/windows nt 6.2/i'     =>  'Windows 8',
														'/windows nt 6.1/i'     =>  'Windows 7',
														'/windows nt 6.0/i'     =>  'Windows Vista',
														'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
														'/windows nt 5.1/i'     =>  'Windows XP',
														'/windows xp/i'         =>  'Windows XP',
														'/windows nt 5.0/i'     =>  'Windows 2000',
														'/windows me/i'         =>  'Windows ME',
														'/win98/i'              =>  'Windows 98',
														'/win95/i'              =>  'Windows 95',
														'/win16/i'              =>  'Windows 3.11',
														'/macintosh|mac os x/i' =>  'Mac OS X',
														'/mac_powerpc/i'        =>  'Mac OS 9',
														'/linux/i'              =>  'Linux',
														'/ubuntu/i'             =>  'Ubuntu',
														'/iphone/i'             =>  'iPhone',
														'/ipod/i'               =>  'iPod',
														'/ipad/i'               =>  'iPad',
														'/android/i'            =>  'Android',
														'/blackberry/i'         =>  'BlackBerry',
														'/webos/i'              =>  'Mobile'
											);
	
			foreach ($os_array as $regex => $value)
					if (preg_match($regex, $user_agent))
							$os_platform = $value;
	
			return $os_platform;
        }
	
        function getBrowser() {
            
                    global $user_agent;
            
                    $browser        = "Unknown Browser";
            
                    $browser_array = array(
                                                                    '/msie/i'      => 'Internet Explorer',
                                                                    '/firefox/i'   => 'Firefox',
                                                                    '/safari/i'    => 'Safari',
                                                                    '/chrome/i'    => 'Chrome',
                                                                    '/edge/i'      => 'Edge',
                                                                    '/opera/i'     => 'Opera',
                                                                    '/netscape/i'  => 'Netscape',
                                                                    '/maxthon/i'   => 'Maxthon',
                                                                    '/konqueror/i' => 'Konqueror',
                                                                    '/mobile/i'    => 'Handheld Browser'
                                                    );
            
                    foreach ($browser_array as $regex => $value)
                            if (preg_match($regex, $user_agent))
                                    $browser = $value;
            
                    return $browser;
        }	 
		public static function isLogged(){
			if(isset($_SESSION['user'])){
				return true;
			}else{
				return false;
			}
		}

		public static function protect(){
			if(Auth::isLogged() == false){
				header('Location: '.$_SERVER['SERVER_HOST'].'/');
				exit();
			}
		}

		public static function logout(){
			unset($_SESSION);
			session_destroy();
			header('Location: '.$_SERVER['SERVER_HOST'].'/');
			exit();
		}                
    }
?>