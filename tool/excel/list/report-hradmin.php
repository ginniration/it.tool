<?
//Khởi tạo đối tượng
$excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$excel->getActiveSheet()->setTitle("Report HR-ADMIN");

//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(50);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(50);
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
//Xét in đậm cho khoảng cột
$excel->getActiveSheet()->getStyle('A3:J3')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A4:J4')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true)->setSize(16);
// Xuống hàng trong cột đó ( NEW LINE ) + Canh chữ ngay giữa
$excel->getActiveSheet()->getStyle('A3:J3')->getAlignment()->setWrapText(true)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setvertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$excel->getActiveSheet()->getStyle('A4:J4')->getAlignment()->setWrapText(true)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setvertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
// TÔ MÀU TIÊU ĐỀ
$excel->getActiveSheet()
        ->getStyle('A3:J4')
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('D3D3D3');
//==============================
/// TẠO KHUNG CHO CỘT TIÊU ĐỀ
$styleArray = array(
      'borders' => array(
          'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
          )
      )
  );
$excel->getActiveSheet()->getStyle('A3:J4')->applyFromArray($styleArray);
//=============================================================================

//Tạo tiêu đề cho từng cột
//Vị trí có dạng như sau:
/**
 * |A1|B1|C1|..|n1|
 * |A2|B2|C2|..|n1|
 * |..|..|..|..|..|
 * |An|Bn|Cn|..|nn|
 */
// TIÊU ĐỀ CỦA EXCEL
$excel->getActiveSheet()->setCellValue('E1', 'Báo Cáo Sửa Chữa Thiết Bị & Dịch Vụ HR - ADMIN '.date("Y"));
//====================================================================================
$excel->getActiveSheet()->setCellValue('A3', 'STT');
$excel->getActiveSheet()->setCellValue('B3', 'Ticket');
$excel->getActiveSheet()->setCellValue('C3', 'Tiêu đề Ticket');
$excel->getActiveSheet()->setCellValue('D3', 'Phân loại');
$excel->getActiveSheet()->setCellValue('E3', 'Người gửi Ticket');
$excel->getActiveSheet()->setCellValue('F3', 'Bộ phận');
$excel->getActiveSheet()->setCellValue('G3', 'Lỗi');
$excel->getActiveSheet()->setCellValue('H3', 'Lỗi thực tế');
$excel->getActiveSheet()->setCellValue('I3', 'Cách xử lý');
$excel->getActiveSheet()->setCellValue('J3', 'Người xử lý');
// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
$numRow = 5;
$stt=1; 

$conn = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin ORDER BY stt ASC");
while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC)) 
{
    $excel->getActiveSheet()->setCellValue('A' . $numRow, $stt);
    $excel->getActiveSheet()->setCellValue('B' . $numRow, $row['ticket']);
    $excel->getActiveSheet()->setCellValue('C' . $numRow, $row['tenticket']);
    $excel->getActiveSheet()->setCellValue('D' . $numRow, $row['phanloai']);
    $excel->getActiveSheet()->setCellValue('E' . $numRow, $row['nguoiguiticket']);
    $excel->getActiveSheet()->setCellValue('F' . $numRow, $row['bophan']);
    $excel->getActiveSheet()->setCellValue('G' . $numRow, $row['loi']);
    $excel->getActiveSheet()->setCellValue('H' . $numRow, $row['loithucte']);
    $excel->getActiveSheet()->setCellValue('I' . $numRow, $row['giaiphap']);
    $excel->getActiveSheet()->setCellValue('J' . $numRow, $row['nguoixuly']);
    $numRow++;$stt++;
}
// ĐÓNG KHUNG TOÀN BỘ DỮ LIỆU +_ NUMBER FORMAT
$test = $numRow-1;
$excel->getActiveSheet()->getStyle('A5:J'. $test)->applyFromArray($styleArray);

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $db = mysqli_connect(HOST,USRNM,PSWD,DBNM) or die("Không thể kết nối database");
            $check = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin WHERE bophan='HR'");
            $rows = mysqli_num_rows($check);         
            $check1 = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin WHERE bophan='Admin'");
            $rows1 = mysqli_num_rows($check1); 
            $check2 = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin");
            $rows2 = mysqli_num_rows($check2);             
            $tongticket = "Tổng Ticket: ".$rows2;
            $admin = "Admin: ".$rows1; 
            $hr = "HR: ".$rows;      

              $test1 = $numRow+1;          
              $test2 = $test1+1;
              $test3 = $test2+1;  
              $excel->getActiveSheet()->getStyle('I' . $test1)->getFont()->setBold(true)->setSize(16);
              $excel->getActiveSheet()->getStyle('I' . $test2)->getFont()->setBold(true)->setSize(16);
              $excel->getActiveSheet()->getStyle('I' . $test3)->getFont()->setBold(true)->setSize(16);
              $excel->getActiveSheet()->setCellValue('I' . $test1, $tongticket);
              $excel->getActiveSheet()->setCellValue('I' . $test2, $admin);
              $excel->getActiveSheet()->setCellValue('I' . $test3, $hr);
// Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
// ở đây mình lưu file dưới dạng excel2007
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Bao cao sua chua thiet bi va dich vu HR - ADMIN '.date('Y').'.xlsx');
PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');   
?>