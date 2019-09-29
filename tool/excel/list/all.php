<?
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
//Khởi tạo đối tượng
$excel = new PHPExcel();

include('all/pc-macmini.php');

include('all/monitors.php');

include('all/keyboard-mouse.php');

include('all/ocamdien.php');

include('all/others.php');

include('all/laptop-macbook.php');

// Set title row bold
// Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
// ở đây mình lưu file dưới dạng excel2007
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Ke khai tai san phan cung- IT-ISO-'.date('M').'-'.date('Y').'.xlsx');
PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');   
?>