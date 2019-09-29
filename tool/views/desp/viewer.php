        <div class="modal fade" id="modal-dep<? echo $stt; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mã tài sản: <? echo $row['mataisan']; ?></h4>
              </div>
              <div class="modal-body">
	            <div class="box-body">
	              <dl class="dl-horizontal">
	              	<dt>License Key 1</dt>
	                <dd><? echo $row['licensekey1']; ?></dd>  
	                <dt>License Key 2</dt>
	                <dd><? echo $row['licensekey2']; ?></dd> 
	                <dt>License Key 3</dt>
	                <dd><? echo $row['licensekey3']; ?></dd> 
	                <dt>Serial No.</dt>
	                <dd><? echo $row['serial']; ?></dd>
	                <dt>Phân loại</dt>
	                <dd><? echo $row['phanloai']; ?></dd>
	                <dt>Tên Tài Sản</dt>
	                <dd><? echo $row['tentaisan']; ?> - <? echo $row['hieu']; ?></dd>
	                <dt>Người Sử Dụng</dt>
	                <dd><? echo $row['nguoisudung']; ?></dd>	           
	                <dt>Người Quản Lý</dt>
	                <dd><? echo $row['nguoiquanly']; ?></dd>
	                <dt>Người Chủ</dt>
	                <dd><? echo $row['nguoichu']; ?></dd>	   
	                <dt>Cấu Hình</dt>
	                <dd><? echo $row['cauhinh']; ?></dd>
	                <dt>Tình Trạng</dt>
	                <dd><? echo $row['tinhtrang']; ?></dd>	   
	                <dt>Tình Trạng Chi Tiết</dt>
	                <dd><? echo $row['chitiet']; ?></dd>
	                <dt>Bộ Phận</dt>
	                <dd><? echo $row['bophan']; ?></dd>	                 
	                <dt>Ngày Mua</dt>
	                <dd><? echo $row['ngaymua']; ?></dd>	
	                <dt>Hạn Bảo Hành</dt>
	                <dd><? echo $row['hanbaohanh']; ?></dd>
	                <dt>Tuổi</dt>
	                <dd><? echo $row['tuoi']; ?></dd>
	                <dt>Tuổi (Count</dt>
	                <dd><? echo $row['tuoicount']; ?></dd>
	                <dt>Giá Mua</dt>
	                <dd><? echo $row['giatien']; ?></dd>
	                <dt>Nhà Cung Cấp</dt>
	                <dd><? echo $row['nhacungcap']; ?></dd>
	                <dt>Ngày Sử Dụng Cuối</dt>
	                <dd><? echo $row['ngaysudungcuoi']; ?></dd>
	                <dt>Khấu Hao</dt>
	                <dd><? echo $row['khauhao']; ?></dd>
	                <dt>Giá Thanh Lý</dt>
	                <dd><? echo $row['giathanhly']; ?></dd> 
	                <dt>Bảo Trì Lần 1</dt>
	                <dd><? echo $row['lanmot']; ?></dd> 
	                <dt>Bảo Trì Lần 2</dt>
	                <dd><? echo $row['lanhai']; ?></dd> 	 
	                <dt>Bảo Trì Lần 3</dt>
	                <dd><? echo $row['lanba']; ?></dd> 
	                <dt>Thông Tin Sửa Chữa</dt>
	                <dd><? echo $row['suachua']; ?></dd> 
	                <dt>Lịch Sử Sử Dụng</dt>
	                <dd><? echo $row['lichsuthietbi']; ?></dd>  
	                <dt>Ghi Chú</dt>
	                <dd><? echo $row['ghichu']; ?></dd>  
	              </dl>
	            </div>                

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
              	<? lienketphanloai($row['phanloai'],$row['mataisan']); ?>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 