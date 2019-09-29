<?
//Khởi tạo đối tượng
$excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$excel->getActiveSheet()->setTitle("Purchased Device");

//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(45);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(8);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(8);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
//Xét in đậm cho khoảng cột
$excel->getActiveSheet()->getStyle('A3:I3')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A4:I4')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true)->setSize(16);
// Xuống hàng trong cột đó ( NEW LINE ) + Canh chữ ngay giữa
$excel->getActiveSheet()->getStyle('A3:I3')->getAlignment()->setWrapText(true)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setvertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$excel->getActiveSheet()->getStyle('A4:I4')->getAlignment()->setWrapText(true)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setvertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
// TÔ MÀU TIÊU ĐỀ
$excel->getActiveSheet()
        ->getStyle('A3:I4')
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
 $stylez = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
$excel->getActiveSheet()->getStyle('A3:I4')->applyFromArray($styleArray);
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
$excel->getActiveSheet()->setCellValue('E1', 'Báo Cáo Sửa Chữa Mua Sắm Thiết Bị IT '.date("Y"));
//====================================================================================
$excel->getActiveSheet()->setCellValue('A3', 'STT');
$excel->getActiveSheet()->setCellValue('B3', 'Ngày');
$excel->getActiveSheet()->setCellValue('C3', 'Loại');
$excel->getActiveSheet()->setCellValue('D3', 'Thiết Bị & Dịch Vụ');
$excel->getActiveSheet()->setCellValue('E3', 'Nhà Cung Cấp');
$excel->getActiveSheet()->setCellValue('F3', 'Ticket');
$excel->getActiveSheet()->setCellValue('G3', 'Người Sử Dụng');
$excel->getActiveSheet()->setCellValue('H3', 'Số Lượng');
$excel->getActiveSheet()->setCellValue('I3', 'Thành tiền (VND)');
// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
$numRow = 5;
$stt=1; 

$conn = mysqli_query($db,"SELECT * FROM cp_reports_shoping ORDER BY stt ASC");
while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC)) 
{
    $cungcap = $row['nhacungcap'];
    $check2 = mysqli_query($db,"SELECT * FROM cp_nhacungcap WHERE codes='$cungcap'");
    $row2 =mysqli_fetch_array($check2,MYSQLI_ASSOC); 

    $excel->getActiveSheet()->setCellValue('A' . $numRow, $stt);
    $excel->getActiveSheet()->setCellValue('B' . $numRow, $row['ngay']);
    $excel->getActiveSheet()->setCellValue('C' . $numRow, $row['loai']);
    $excel->getActiveSheet()->setCellValue('D' . $numRow, $row['tenthietbi']);
    $excel->getActiveSheet()->setCellValue('E' . $numRow, $row2['tennhacungcap']);
    $excel->getActiveSheet()->setCellValue('F' . $numRow, $row['ticket']);
    $excel->getActiveSheet()->setCellValue('G' . $numRow, $row['nguoisudung']);
    $excel->getActiveSheet()->setCellValue('H' . $numRow, $row['soluong']);
    $excel->getActiveSheet()->setCellValue('I' . $numRow, number_format($row['giatien']));
    $numRow++;$stt++;
}
// ĐÓNG KHUNG TOÀN BỘ DỮ LIỆU +_ NUMBER FORMAT
$test = $numRow-1;
$excel->getActiveSheet()->getStyle('A5:I'. $test)->applyFromArray($styleArray);
$excel->getActiveSheet()->getStyle('F5:I'. $test)->applyFromArray($stylez);
// Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
// ở đây mình lưu file dưới dạng excel2007
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Bao cao mua sam thiet bi IT '.date('Y').'.xlsx');
PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');   
?>