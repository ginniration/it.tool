<?
if(isset($_GET['page']))
{
	if($_GET['page'] == 'kekhai/thietbi' && !isset($_GET['title'])) 
	{
			 $title ="Ke khai tai san phan cung- IT-ISO-".date('M')."-2019";
	} 
	else if($_GET['page'] == 'kekhai/thietbi' && $_GET['title'] == 'mobile') 
	{
			 $title ="Ke khai tai san Thiet bi di dong-".date('M')."-2019";
	} 
	else if($_GET['page'] == 'kekhai/thietbi' && $_GET['title'] == 'pc-macmini') 
	{
			$title ="Ke khai tai san phan cung- IT-ISO-".date('M')."-2019";
	}
	else if($_GET['page'] == 'kekhai/thietbi' && $_GET['title'] == 'ups') 
	{
			$title ="Ke khai tai san phan cung- IT-ISO-".date('M')."-2019";
	}	
	else if($_GET['page'] == 'kekhai/thietbi' && $_GET['title'] == 'man-hinh') 
	{
			$title ="Ke khai tai san phan cung- IT-ISO-".date('M')."-2019";
	}		
	else 
	{
	         $title ="AdminLTE 2 | Bảng Điều Khiển";
	}
}else 
	{
	         $title ="AdminLTE 2 | Bảng Điều Khiển";
	}
?>