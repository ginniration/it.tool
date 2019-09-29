
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm báo cáo sửa chữa HR - ADMIN </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" class="form-horizontal">
              <div class="box-body">

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Ticket</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="ticket" id="ticket">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Tiêu đề</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tenticket" id="tenticket">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Phân loại</label>
                  <div class="col-sm-10">
                    <select name="pl" id="pl" class="form-control" >
                      <? phanloaihradmin(""); ?>
                    </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Người gửi Ticket</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nguoiguiticket" id="nguoiguiticket">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Bộ phận</label>
                  <div class="col-sm-10">
                    <select name="bp" id="bp" class="form-control" >
                      <? bophanhradmin(""); ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Người Xử Lý</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nguoixuly" id="nguoixuly">
                  </div>
                </div>  
              </div>
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
                  <label class="col-sm-2 control-label">Lỗi</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="loi" id="loi"></textarea> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Lỗi Thực Tế</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="loithucte" id="loithucte"></textarea> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Giải Pháp</label>
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
    <div class="col-md-12">   
     <div id="results"> </div>
    </div>        
 </div>
  <script>
    function SubmitFormData() {
        var ticket = $("#ticket").val();
        var tenticket = $("#tenticket").val();
        var nguoiguiticket = $("#nguoiguiticket").val();
        var nguoixuly = $("#nguoixuly").val();
        var loi = $("#loi").val();
        var loithucte = $("#loithucte").val();
        var giaiphap = $("#giaiphap").val();
        var pl = $("#pl").children(":selected").val();
        var bp = $("#bp").children(":selected").val();

        $.post("../ajax/addhradmin.php", { ticket: ticket, tenticket: tenticket, nguoiguiticket: nguoiguiticket, nguoixuly: nguoixuly, loi: loi, loithucte: loithucte, giaiphap: giaiphap, pl: pl, bp: bp},
        function(data) {
       $('#results').html(data);
        });
    }
  </script> 