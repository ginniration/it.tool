<?
// SHEET THỨ 1 

//Chọn trang cần ghi (là số từ 0->n)
$excel->setActiveSheetIndex(0)
// TIÊU ĐỀ CỦA EXCEL
->setCellValue('G1', 'IMT SOLUTIONS -  LAPTOP & MACBOOK ASSET - 2019')
->setCellValue('A3', 'STT')
->setCellValue('B3', 'Mã Tài Sản')
->setCellValue('C3', 'Serial Number/ Sevice Tag')
->setCellValue('D3', 'Loại tài sản')
->setCellValue('E3', 'Hiệu')
->setCellValue('F3', 'Tên tài sản')
->setCellValue('G3', 'Người sử dụng')
->setCellValue('H3', 'Người quản lý')
->setCellValue('I3', 'Người chủ')
->mergeCells('J3:L3')
->setCellValue('J3', 'Thuộc tính')
//======================= CỘT RIÊNG CỦA THUỘC TÍNH ==========================
->setCellValue('J4', 'C')
->setCellValue('K4', 'I')
->setCellValue('L4', 'A')
//===========================================================================
->setCellValue('M3', 'Cấu hình')
->setCellValue('N3', 'Tình trạng')
->setCellValue('O3', 'Tình trạng chi tiết')
->setCellValue('P3', 'Bộ phận')
->mergeCells('Q3:Y3')
->setCellValue('Q3', 'Thông tin mua hàng')
//======================= CỘT RIÊNG CỦA THÔNG TIN MUA HÀNG ==================
->setCellValue('Q4', 'Ngày mua')
->setCellValue('R4', 'Hạn bảo hành')
->setCellValue('S4', 'Tuổi')
->setCellValue('T4', 'Tuổi (count)')
->setCellValue('U4', 'Giá tiền')
->setCellValue('V4', 'Nhà cung cấp')
->setCellValue('W4', 'Ngày sử dụng cuối')
->setCellValue('X4', 'Khấu hao')
->setCellValue('Y4', 'Giá thanh lý')
//=============================================================================
->mergeCells('Z3:AB3')
->setCellValue('Z3', 'Thông tin bảo trì')
//======================= CỘT RIÊNG CỦA THÔNG TIN BẢO TRÌ =====================
->setCellValue('Z4', 'Lần 1')
->setCellValue('AA4', 'Lần 2')
->setCellValue('AB4', 'Lần 3')
//=============================================================================
->setCellValue('AC3', 'Sửa chữa')
->setCellValue('AD3', 'Số lần sửa chữa')
->setCellValue('AE3', 'Lịch sử sử dụng')
->setCellValue('AF3', 'Ghi chú')
;
//====================================================================================

//Tạo tiêu đề cho trang. (có thể không cần)
$excel->getActiveSheet()->setTitle("Laptop-Macbook");
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

// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
$numRow = 5;
$stt=1; 
$conn = mysqli_query($db,"SELECT * FROM cp_devices WHERE phanloai='Laptop' OR phanloai='Macbook' ORDER BY phanloai");
while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC)) 
{

        $excel->getActiveSheet()->setCellValue('A' . $numRow, $stt)
                                ->setCellValue('B' . $numRow, $row['mataisan'])
                                ->setCellValue('C' . $numRow, $row['serial'])
                                ->setCellValue('D' . $numRow, $row['phanloai'])
                                ->setCellValue('E' . $numRow, $row['hieu'])
                                ->setCellValue('F' . $numRow, $row['tentaisan'])
                                ->setCellValue('G' . $numRow, $row['nguoisudung'])
                                ->setCellValue('H' . $numRow, $row['nguoiquanly'])
                                ->setCellValue('I' . $numRow, $row['nguoichu'])
                                ->setCellValue('J' . $numRow, $row['C'])
                                ->setCellValue('K' . $numRow, $row['I'])
                                ->setCellValue('L' . $numRow, $row['A'])
                                ->setCellValue('M' . $numRow, $row['cauhinh'])
                                ->setCellValue('N' . $numRow, $row['tinhtrang'])
                                ->setCellValue('O' . $numRow, $row['chitiet'])
                                ->setCellValue('P' . $numRow, $row['bophan'])
                                ->setCellValue('Q' . $numRow, $row['ngaymua'])
                                ->setCellValue('R' . $numRow, $row['hanbaohanh'])
                                ->setCellValue('S' . $numRow, $row['tuoi'])
                                ->setCellValue('T' . $numRow, $row['tuoicount'])
                                ->setCellValue('U' . $numRow, $row['giatien'])
                                ->setCellValue('V' . $numRow, $row['nhacungcap'])
                                ->setCellValue('W' . $numRow, $row['ngaysudungcuoi'])
                                ->setCellValue('X' . $numRow, $row['khauhao'])
                                ->setCellValue('Y' . $numRow, $row['giathanhly'])
                                ->setCellValue('Z' . $numRow, $row['lanmot'])
                                ->setCellValue('AA' . $numRow, $row['lanhai'])
                                ->setCellValue('AB' . $numRow, $row['lanba'])
                                ->setCellValue('AC' . $numRow, $row['suachua'])
                                ->setCellValue('AD' . $numRow, $row['solansuachua'])
                                ->setCellValue('AE' . $numRow, $row['lichsuthietbi'])
                                ->setCellValue('AF' . $numRow, $row['ghichu']);
    $numRow++;$stt++;
}
// ĐÓNG KHUNG TOÀN BỘ DỮ LIỆU +_ NUMBER FORMAT
$test = $numRow-1;

$excel->getActiveSheet()->getStyle('A5:AF'. $test)->applyFromArray($styleArray);
$excel->getActiveSheet()->getStyle('U5:U'.$test)->getNumberFormat()->setFormatCode('#,##0');  
// Set title row bold
?>