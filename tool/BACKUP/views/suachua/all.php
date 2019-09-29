       
            <!-- /.box-header -->
         <div class="box">
            <div class="box-header">
              <h3 class="box-title"><? tongtiensuachua(); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="display" style="width:100%">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Mã tài sản</th>
                  <th>Thiết bị / Dịch vụ</th>
                  <th >Nhà cung cấp</th>
                  <th>Ticket</th>
                  <th>Thời gian</th>
                  <th>Người xử lý</th>
                  <th>Người sử dụng</th>
                  <th>Vấn đề / Giải pháp</th>
                  <th width="7%">Chi phí</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
            <?
              $c=0;
         	  $stt=1;	
              $conn = mysqli_query($db,"SELECT * FROM cp_reports_fixed");
              while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC))
              {
                         
            ?>                    
                <tr>
                  <td><? echo $stt; ?></td>
                  <td><? echo $row['mataisan']; ?></td>
                  <td width="15%"><? if($row['ticket'] == NULL || $row['ticket'] == ""){echo $row['thietbi-dichvu'];}else { echo "<a href='http://support.imt-soft.com/issues/".$row['ticket']."' target='_blank'>".$row['thietbi-dichvu']."</a>"; }?></td>
                  <td><? chonnhacungcap($row['nhacungcap']); ?></td>
                  <td><? if($row['ticket'] == NULL || $row['ticket'] == ""){echo "None";}else { echo "<a href='http://support.imt-soft.com/issues/".$row['ticket']."' target='_blank'>".$row['ticket']."</a>"; }?></td>
                  <td><? echo $row['ngay']; ?></td>
                  <td><? echo $row['nguoixuly']; ?></td>
                  <td><? echo $row['nguoisudung']; ?></td>
                  <td width="20%"><font color="red">Vấn đề:</font> <? echo $row['mota']; ?> <br><font color="green">Giải pháp:</font> <? echo $row['giaiphap']; ?></td>
                  <td><? echo number_format($row['chiphi']); ?></td>
                  <td><a class="btn btn-default"><i class="fa fa-edit"></i></a> </td>
                </tr>
            <? $c++; $stt++; } ?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->