            <!-- /.box-header -->
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kê Khai Màn Hình Máy Tính</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="display" style="width:100%">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Mã Tài Sản</th>
                  <th>Serial</th>
                  <th>Loại Tài Sản</th>
                  <th>Tên Tài Sản</th>
                  <th>Người Sử Dụng</th>
                  <th>Cấu Hình</th>
                  <th>Tình Trạng</th>
                  <th>Lịch Sử Người Dùng</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
            <?
              $c=0;
              $stt=1;
              $conn = mysqli_query($db,"SELECT * FROM cp_devices WHERE phanloai='UPS'");
              while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC))
              {
                         
            ?>                    
                <tr>
                  <td><? echo $stt; ?></td>
                  <td><? echo $row['mataisan']; ?></td>
                  <td><? echo $row['serial']; ?></td>
                  <td><? echo $row['phanloai']; ?></td>
                  <td><? echo $row['tentaisan']; ?></td>
                  <td><? echo $row['nguoisudung']; ?></td>
                  <td><? echo $row['cauhinh']; ?></td>
                  <td><? echo $row['tinhtrang']; ?></td>
                  <td>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default<? echo $c; ?>">
                      Nhấn Xem Chi Tiết
                    </button>
                  </td>
                  <td><a class="btn btn-default"><i class="fa fa-edit"></i> </a> </td>
                </tr>

                      <div class="modal fade" id="modal-default<? echo $c; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Lịch sử người dùng</h4>
                            </div>
                            <div class="modal-body">
                              <p><? echo $row['lichsuthietbi']; ?></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>                
                
            <? $c++; $stt++; } ?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->