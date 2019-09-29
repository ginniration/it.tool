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
              $conn = mysqli_query($db,"SELECT * FROM cp_devices WHERE phanloai='Monitor'");
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
                  <td width="30%"><? echo $row['lichsuthietbi']; ?></td>
                  <td><a class="btn btn-default"><i class="fa fa-edit"></i> </a> </td>
                </tr>
            <? $c++; $stt++; } ?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->