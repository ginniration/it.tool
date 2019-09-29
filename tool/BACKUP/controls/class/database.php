<?
DEFINE('HOST', 'localhost');
DEFINE('USRNM', 'root');
DEFINE('PSWD', '');
DEFINE('DBNM', 'imt');
$db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
mysqli_set_charset($db,"utf8");
?>