    <section class="content">
      <div id="results"></div>
         <div class="row">
        <!-- left column -->
        <div class="col-md-12">          
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm License Key</h3>
            </div>
            <!-- /.box-header -->
            <form method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Key License <font color="red" size="+1">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kl" name="kl" value ="<? echo $row['keylicense']; ?>">
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tên License <font color="red" size="+1">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tl" name="tl" value ="<? echo $row['namelicense']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Thời Gian Tạo <font color="red" size="+1">*</font></label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgt" name="tgt" value ="<? echo $row['getdate']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Danh Mục <font color="red" size="+1">*</font></label>
                  <div class="col-sm-10">
                  <select id="danhmuc" name="danhmuc" class="form-control">
                      <? danhmuclicense($row['danhmuc']); ?>
                  </select>
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tài Khoản License</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tkl" name="tkl" value ="<? echo $row['accountlicense']; ?>">
                  </div>
                </div>
 
              <div class="box-footer">
                <input type="hidden" name="mh" id="mh" value="<? echo $mahoa; ?>"/>
                <button type="reset" class="btn btn-default">Đặt Lại</button>
                <button type="button" id="submitFormData" onclick="SubmitFormData();" class="btn btn-info">Lưu</button>
              </div>
              <!-- /.box-footer -->
            </form>                    
              </div>
              <!-- /.box-body -->
          </div>
            
    </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <script>
    function SubmitFormData() {
        var kl = $("#kl").val();
        var tl = $("#tl").val();
        var tgt = $("#tgt").val();
        var tkl = $("#tkl").val();
        var mh = $("#mh").val();
        var danhmuc = $("#danhmuc").children(":selected").val();

        $.post("../ajax/editkeys.php", { kl: kl, tl: tl, tgt: tgt, tkl: tkl, danhmuc: danhmuc, mh: mh},
        function(data) {
       $('#results').html(data);
        });
    }
  </script>    