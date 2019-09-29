<?
//Khởi tạo đối tượng
$excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$excel->getActiveSheet()->setTitle("Sheet");

//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(13);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(24);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(24);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(3);
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(3);
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(3);
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(40);
$excel->getActiveSheet()->getColumnDimension('O')->setWidth(24);
$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('AB')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('AC')->setWidth(60);
$excel->getActiveSheet()->getColumnDimension('AE')->setWidth(80);
//Xét in đậm cho khoảng cột
$excel->getActiveSheet()->getStyle('A3:AF3')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A4:AF4')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true)->setSize(16);

// Xuống hàng trong cột đó ( NEW LINE ) + Canh chữ ngay giữa
$excel->getActiveSheet()->getStyle('A3:AF3')->getAlignment()->setWrapText(true)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setvertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$excel->getActiveSheet()->getStyle('A4:AF4')->getAlignment()->setWrapText(true)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setvertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
// TÔ MÀU TIÊU ĐỀ
$excel->getActiveSheet()
        ->getStyle('A3:AF4')
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
$excel->getActiveSheet()->getStyle('A3:AF4')->applyFromArray($styleArray);
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
$excel->getActiveSheet()->setCellValue('G1', 'IMT SOLUTIONS -  ASSET LIST - 2019');
//====================================================================================
$excel->getActiveSheet()->setCellValue('A3', 'STT');
$excel->getActiveSheet()->setCellValue('B3', 'Mã Tài Sản');
$excel->getActiveSheet()->setCellValue('C3', 'Serial Number/ Sevice Tag');
$excel->getActiveSheet()->setCellValue('D3', 'Loại tài sản');
$excel->getActiveSheet()->setCellValue('E3', 'Hiệu');
$excel->getActiveSheet()->setCellValue('F3', 'Tên tài sản');
$excel->getActiveSheet()->setCellValue('G3', 'Người sử dụng');
$excel->getActiveSheet()->setCellValue('H3', 'Người quản lý');
$excel->getActiveSheet()->setCellValue('I3', 'Người chủ');
$excel->getActiveSheet()->mergeCells('J3:L3');
$excel->getActiveSheet()->setCellValue('J3', 'Thuộc tính');
//======================= CỘT RIÊNG CỦA THUỘC TÍNH ==========================
$excel->getActiveSheet()->setCellValue('J4', 'C');
$excel->getActiveSheet()->setCellValue('K4', 'I');
$excel->getActiveSheet()->setCellValue('L4', 'A');
//============================================================================
$excel->getActiveSheet()->setCellValue('M3', 'Cấu hình');
$excel->getActiveSheet()->setCellValue('N3', 'Tình trạng');
$excel->getActiveSheet()->setCellValue('O3', 'Tình trạng chi tiết');
$excel->getActiveSheet()->setCellValue('P3', 'Bộ phận');
$excel->getActiveSheet()->mergeCells('Q3:Y3');
$excel->getActiveSheet()->setCellValue('Q3', 'Thông tin mua hàng');
//======================= CỘT RIÊNG CỦA THÔNG TIN MUA HÀNG ===================
$excel->getActiveSheet()->setCellValue('Q4', 'Ngày mua');
$excel->getActiveSheet()->setCellValue('R4', 'Hạn bảo hành');
$excel->getActiveSheet()->setCellValue('S4', 'Tuổi');
$excel->getActiveSheet()->setCellValue('T4', 'Tuổi (count)');
$excel->getActiveSheet()->setCellValue('U4', 'Giá tiền');
$excel->getActiveSheet()->setCellValue('V4', 'Nhà cung cấp');
$excel->getActiveSheet()->setCellValue('W4', 'Ngày sử dụng cuối');
$excel->getActiveSheet()->setCellValue('X4', 'Khấu hao');
$excel->getActiveSheet()->setCellValue('Y4', 'Giá thanh lý');
//=============================================================================
$excel->getActiveSheet()->mergeCells('Z3:AB3');
$excel->getActiveSheet()->setCellValue('Z3', 'Thông tin bảo trì');
//======================= CỘT RIÊNG CỦA THÔNG TIN BẢO TRÌ =====================
$excel->getActiveSheet()->setCellValue('Z4', 'Lần 1');
$excel->getActiveSheet()->setCellValue('AA4', 'Lần 2');
$excel->getActiveSheet()->setCellValue('AB4', 'Lần 3');
//=============================================================================
$excel->getActiveSheet()->setCellValue('AC3', 'Sửa chữa');
$excel->getActiveSheet()->setCellValue('AD3', 'Số lần sửa chữa');
$excel->getActiveSheet()->setCellValue('AE3', 'Lịch sử sử dụng');
$excel->getActiveSheet()->setCellValue('AF3', 'Ghi chú');

// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
$numRow = 5;
$stt=1; 
$conn = mysqli_query($db,"SELECT * FROM cp_devices");
while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC)) 
{
    $excel->getActiveSheet()->setCellValue('A' . $numRow, $stt);
    $excel->getActiveSheet()->setCellValue('B' . $numRow, $row['mataisan']);
    $excel->getActiveSheet()->setCellValue('C' . $numRow, $row['serial']);
    $excel->getActiveSheet()->setCellValue('D' . $numRow, $row['phanloai']);
    $excel->getActiveSheet()->setCellValue('E' . $numRow, $row['hieu']);
    $excel->getActiveSheet()->setCellValue('F' . $numRow, $row['tentaisan']);
    $excel->getActiveSheet()->setCellValue('G' . $numRow, $row['nguoisudung']);
    $excel->getActiveSheet()->setCellValue('H' . $numRow, $row['nguoiquanly']);
    $excel->getActiveSheet()->setCellValue('I' . $numRow, $row['nguoichu']);
    $excel->getActiveSheet()->setCellValue('J' . $numRow, $row['C']);
    $excel->getActiveSheet()->setCellValue('K' . $numRow, $row['I']);
    $excel->getActiveSheet()->setCellValue('L' . $numRow, $row['A']);
    $excel->getActiveSheet()->setCellValue('M' . $numRow, $row['cauhinh']);
    $excel->getActiveSheet()->setCellValue('N' . $numRow, $row['tinhtrang']);
    $excel->getActiveSheet()->setCellValue('O' . $numRow, $row['chitiet']);
    $excel->getActiveSheet()->setCellValue('P' . $numRow, $row['bophan']);
    $excel->getActiveSheet()->setCellValue('Q' . $numRow, $row['ngaymua']);
    $excel->getActiveSheet()->setCellValue('R' . $numRow, $row['hanbaohanh']);
    $excel->getActiveSheet()->setCellValue('S' . $numRow, $row['tuoi']);
    $excel->getActiveSheet()->setCellValue('T' . $numRow, $row['tuoicount']);
    $excel->getActiveSheet()->setCellValue('U' . $numRow, $row['giatien']);
    $excel->getActiveSheet()->setCellValue('V' . $numRow, $row['nhacungcap']);
    $excel->getActiveSheet()->setCellValue('W' . $numRow, $row['ngaysudungcuoi']);
    $excel->getActiveSheet()->setCellValue('X' . $numRow, $row['khauhao']);
    $excel->getActiveSheet()->setCellValue('Y' . $numRow, $row['giathanhly']);
    $excel->getActiveSheet()->setCellValue('Z' . $numRow, $row['lanmot']);
    $excel->getActiveSheet()->setCellValue('AA' . $numRow, $row['lanhai']);
    $excel->getActiveSheet()->setCellValue('AB' . $numRow, $row['lanba']);
    $excel->getActiveSheet()->setCellValue('AC' . $numRow, $row['suachua']);
    $excel->getActiveSheet()->setCellValue('AD' . $numRow, $row['solansuachua']);
    $excel->getActiveSheet()->setCellValue('AE' . $numRow, $row['lichsuthietbi']);
    $excel->getActiveSheet()->setCellValue('AF' . $numRow, $row['ghichu']);
    $numRow++;$stt++;
}
// ĐÓNG KHUNG TOÀN BỘ DỮ LIỆU +_ NUMBER FORMAT
$test = $numRow-1;
$excel->getActiveSheet()->getStyle('A5:AF'. $test)->applyFromArray($styleArray);
$excel->getActiveSheet()->getStyle('U5:U'.$test)->getNumberFormat()->setFormatCode('#,##0');  


// Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
// ở đây mình lưu file dưới dạng excel2007
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Ke khai tai san phan cung- IT-ISO-'.date('M').'-'.date('Y').'.xlsx');
PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');   
?>