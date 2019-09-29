
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm báo cáo sửa chữa thiết bị - dịch vu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" class="form-horizontal">
              <div class="box-body">

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Ngày Xử Lý</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="ngayxl" name="ngayxl">
                  </div>
                </div>  
                               
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mã Tài Sản</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="mts" name="mts">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Thiết bị - Dịch vụ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tbdv"  name="tbdv" >
                  </div>
                </div>  
                               
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nhà Cung Cấp</label>
                  <div class="col-sm-10">
                    <select name="ncc" id="ncc" class="form-control" >
                      <? nhacungcap(""); ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Ticket</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="ticket" id="ticket" >
                  </div>
                </div>
 
              </div>              
              <!-- /.box-body -->   
                
          </div>
          <div id="results"></div>    
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
                  <label class="col-sm-2 control-label">Chí phí</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="chiphi" id="chiphi" >
                  </div>
                </div>                      

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Xử Lý</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nguoixl" id="nguoixl">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Sử Dụng</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nsd" id="nsd">
                  </div>
                </div>  
                               
                <div class="form-group">
                  <label class="col-sm-2 control-label">Vấn Đề</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="vande" id="vande"></textarea> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Giải pháp</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="giaiphap" id="giaiphap"></textarea> 
                  </div>
                </div> 
               </div>
             <div class="box-footer">
                <button type="reset" class="btn btn-default">Đặt Lại</button>
                <button type="button" id="submitFormData" onclick="SubmitFormData();" class="btn btn-info">Lưu</button>
              </div>
              <!-- /.box-footer -->
            </form>   
             </div>
        </div>
 </div>
  <script>
    function SubmitFormData() {
        var ngayxl = $("#ngayxl").val();
        var mts = $("#mts").val();
        var tbdv = $("#tbdv").val();
        var ncc = $("#ncc").children(":selected").val();
        var ticket = $("#ticket").val();
        var chiphi = $("#chiphi").val();
        var nguoixl = $("#nguoixl").val();
        var nsd = $("#nsd").val();
        var vande = $("#vande").val();
        var giaiphap = $("#giaiphap").val();

        $.post("../ajax/addreportsfixed.php", { ngayxl: ngayxl, mts: mts, tbdv: tbdv, ncc: ncc, ticket: ticket, chiphi: chiphi, nguoixl: nguoixl, nsd: nsd, vande: vande, giaiphap: giaiphap },
        function(data) {
       $('#results').html(data);
        });
    }
  </script> 