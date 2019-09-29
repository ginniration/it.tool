<div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Chỉnh sửa: <? echo $chon['tentaisan']; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mã Tài Sản</label>
                  <div class="col-sm-10">
                    <input class="form-control" value ="<? echo $chon['mataisan']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Serial / Service Tag</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="srial" value ="<? echo $chon['serial']; ?>">
                  </div>
                </div>          

                <div class="form-group">
                  <label class="col-sm-2 control-label">Phân Loại</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pl" value ="<? echo $chon['phanloai']; ?>">
                  </div>
                </div>  

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Hiệu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="model" value ="<? echo $chon['hieu']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tên Tài Sản</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tts" value ="<? echo $chon['tentaisan']; ?>">
                  </div>
                </div>          

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Sử Dụng</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nsd" value ="<? echo $chon['nguoisudung']; ?>">
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Quản Lý</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nql" value ="<? echo $chon['nguoiquanly']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Chủ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nc" value ="<? echo $chon['nguoichu']; ?>">
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 control-label">Cấu Hình</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ch" value ="<? echo $chon['cauhinh']; ?>">
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tình Trạng</label>
                  <div class="col-sm-10">

                  <select name="ttrang" class="form-control" >
                    <? 
// TẠO SỰ LỰA CHỌN CỦA THIẾT BỊ 
                    if($chon['tinhtrang'] == "Spare"){
                        echo '
                            <option value="Spare" selected="selected">Spare</option>
                            <option value="In-Use">In-Use</option>
                            <option value="Damage">Damage</option>
                        ';
                        } else if($chon['tinhtrang'] == "In-Use"){
                        echo '
                            <option value="Spare">Spare</option>
                            <option value="In-Use" selected="selected">In-Use</option>
                            <option value="Damage">Damage</option>
                        ';
                        }else if($chon['tinhtrang'] == "Damage"){
                        echo '
                            <option value="Spare">Spare</option>
                            <option value="In-Use">In-Use</option>
                            <option value="Damage" selected="selected">Damage</option>
                        ';                          
                        }else {
                         echo '
                            <option value="Spare" selected="selected">Spare</option>
                            <option value="In-Use">In-Use</option>
                            <option value="Damage">Damage</option>
                        ';                         
                        }
                    ?>

                  </select>

                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tình Trạng Chi Tiết</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ttct" value ="<? echo $chon['chitiet']; ?>">
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 control-label">Bộ Phận</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bp" value ="<? echo $chon['bophan']; ?>">
                  </div>
                </div> 
<? 
if (isset($_GET['title'])) { 
  if($_GET['title'] == 'pc-macmini' || $_GET['title'] == 'laptop-macbook')
                {           
?>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">License 1</label>
                  <div class="col-sm-10">
                <select class="form-control select2" name="lss1" style="width: 100%;">
                  <? dlicense($chon['licensekey1']); ?>
                </select>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-2 control-label">License 2</label>
                  <div class="col-sm-10">
                <select class="form-control select2" name="lss2" style="width: 100%;">
                  <? dlicense($chon['licensekey2']); ?>
                </select>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 control-label">License 3</label>
                  <div class="col-sm-10">
                <select class="form-control select2" name="lss3"style="width: 100%;">
                  <? dlicense($chon['licensekey3']); ?>
                </select>
                  </div>
                </div>  

<? }} ?>
              </div>
              <!-- /.box-body -->
          </div>
    </div>
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">#</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body form-horizontal" >
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ngày Mua</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nm" value ="<? echo $chon['ngaymua']; ?>">
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-2 control-label">Hạn Bảo Hành</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="hbh" value ="<? echo $chon['hanbaohanh']; ?>">
                  </div>
                </div>                 
                <div class="form-group">
                  <label class="col-sm-2 control-label">Giá Tiền</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gt" value ="<? echo $chon['giatien']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nhà Cung Cấp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ncc" value ="<? echo $chon['nhacungcap']; ?>">
                  </div>
                </div>          

                <div class="form-group">
                  <label class="col-sm-2 control-label">Ngày Sử Dụng Cuối</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nsdc" value ="<? echo $chon['ngaysudungcuoi']; ?>">
                  </div>
                </div>  

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Khấu Hao</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kh" value ="<? echo $chon['khauhao']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Giá Thanh Lý</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gtl" value ="<? echo $chon['giathanhly']; ?>">
                  </div>
                </div>          

                <div class="form-group">
                  <label class="col-sm-2 control-label">Lần Một</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lm" value ="<? echo $chon['lanmot']; ?>">
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Lần Hai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lh" value ="<? echo $chon['lanhai']; ?>">
                  </div>
                </div>        

               <div class="form-group">
                  <label class="col-sm-2 control-label">Lần Ba</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lb" value ="<? echo $chon['lanba']; ?>">
                  </div>
                </div> 

               <div class="form-group">
                  <label class="col-sm-2 control-label">Sửa Chữa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sc" value ="<? echo $chon['suachua']; ?>">
                  </div>
                </div>   

               <div class="form-group">
                  <label class="col-sm-2 control-label">Ghi Chú</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gc" value ="<? echo $chon['ghichu']; ?>">
                  </div>
                </div>  
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Lịch Sử Sử Dụng</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" rows="2" name="lssd" placeholder="Enter ..."><? echo $chon['lichsuthietbi']; ?></textarea>
                  </div>
                </div>                                                   
                                                        
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Đặt Lại</button>
                <button type="submit" name="save" class="btn btn-info">Lưu</button>
              </div>
              <!-- /.box-footer -->
            </form>              
          </div>
  </div>
</div>