       
            <!-- /.box-header -->
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">
              <a href="area.php?page=bao-cao-mua-sam&them" class="btn btn-app"><i class="fa fa-plus"></i> THÊM BÁO CÁO</a>               
                <a href="area.php?page=bao-cao-mua-sam&download=reports_b" class="btn btn-app"><i class="fa fa-download"></i> TẢI BÁO CÁO </a>
              </h3>
            </div>           
            <div class="box-header">
              <h3 class="box-title">
                <? tongtienmuasam(); ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="display" style="width:100%">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Thiết bị / Dịch vụ</th>
                  <th>Nhà cung cấp</th>
                  <th>Ticket</th>
                  <th>Thời gian</th>
                  <th>Người sử dụng</th>
                  <th>Số Lượng</th>
                  <th width="15%">Chi phí</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
            <?
              $c=0;
         	  $stt=1;	
              $conn = mysqli_query($db,"SELECT * FROM cp_reports_shoping");
              while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC))
              {
                         
            ?>                    
                <tr>
                  <td><? echo $stt; ?></td>
                  <td><? if($row['ticket'] == NULL || $row['ticket'] == ""){echo $row['tenthietbi'];}else { echo "<a href='http://support.imt-soft.com/issues/".$row['ticket']."' target='_blank'>".$row['tenthietbi']."</a>"; }?></td>
                  <td><? chonnhacungcap($row['nhacungcap']); ?></td>
                  <td><? if($row['ticket'] == NULL || $row['ticket'] == ""){echo "None";}else { echo "<a href='http://support.imt-soft.com/issues/".$row['ticket']."' target='_blank'>".$row['ticket']."</a>"; }?></td>
                  <td><? echo ngaythang($row['ngay']); ?></td>
                  <td><? echo $row['nguoisudung']; ?></td>
                  <td><? echo $row['soluong']; ?></td>
                  <td><? echo number_format($row['giatien']); ?></td>
                  <td><a href="area.php?page=bao-cao-mua-sam&chinhsua=<? echo md5($row['stt']); ?>" class="btn btn-default"><i class="fa fa-edit"></i></a> </td>
                </tr>
            <? $c++; $stt++; } ?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->