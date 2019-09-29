<?
	session_start();
    require_once('../controls/settings.php');

if(isset($_POST['cnf'])){
    $user = $_POST['p-user'];
    $pass = $_POST['p-pass'];
	if($user == NULL || $user == "")
	{
		thongbao('Chưa nhập User \r\n Vui lòng kiểm tra lại ! ');	
		chuyentrang('../index.php');
    }else if($pass == NULL || $pass == "")	
    {
		thongbao('Chưa nhập Password \r\n Vui lòng kiểm tra lại ! ');	
		chuyentrang('../index.php');
	}else{
	$auth = new Auth($db);
	$auth->Pauth($user,$pass);
	} 
}else {
    chuyentrang('../index.php');
}

?>