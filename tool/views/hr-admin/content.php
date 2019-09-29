           <!-- /.box-header -->
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">  <? suachuahradmin(); ?> </h3> 
              <a href="area.php?page=bao-cao-sua-chua-hr-admin&them" class="btn btn-app"><i class="fa fa-plus"></i> THÊM BÁO CÁO</a>
              <a href="area.php?page=bao-cao-sua-chua-hr-admin&download=report-hr-admin" class="btn btn-app"><i class="fa fa-download"></i> TẢI BÁO CÁO </a>              
            </div>            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="display" style="width:100%">
                <thead>
                <tr>
                  <th>Ticket</th>
                  <th>Phân Loại</th>
                  <th>Tiêu Đề</th>                  
                  <th width="15%">Người Gửi Ticket</th>
                  <th>Bộ Phận</th>
                  <th>Lỗi</th>
                  <th>Lỗi Thực Tế / Giải Pháp</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
            <?
              $c=0;
         	  $stt=1;	
              $conn = mysqli_query($db,"SELECT * FROM cp_reports_hr_admin ORDER BY stt DESC");
              while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC))
              {
                         
            ?>                    
                <tr>
                  <td><? if($row['ticket'] == NULL || $row['ticket'] == "" || $row['ticket'] == "0"){echo "None";}else { echo "<a class='btn btn-block btn-info' href='http://support.imt-soft.com/issues/".$row['ticket']."' target='_blank'>".$row['ticket']."</a>"; }?></td>    
                  <td width="8%"><? echo $row['phanloai']; ?></td>
                  <td width="15%"><? if($row['ticket'] == NULL || $row['ticket'] == ""){echo $row['tenticket'];}else { echo "<a  href='http://support.imt-soft.com/issues/".$row['ticket']."' target='_blank'>".$row['tenticket']."</a>"; }?></td>                  
                  <td width="15%"><? echo $row['nguoiguiticket']; ?></td>
                  <td width="8%"><? chonbophan($row['bophan']); ?></td>                  
                  <td width="15%"><? echo $row['loi']; ?></td>
                  <td width="30%"><font color="red"><strong>Lỗi Thực Tế:</strong></font> <? echo $row['loithucte']; ?> <br><font color="green"><strong>Giải pháp:</strong></font> <? echo $row['giaiphap']; ?></td>
                  <td><a href="area.php?page=bao-cao-sua-chua-hr-admin&chinhsua=<? echo md5($row['stt']); ?>" class="btn btn-default"><i class="fa fa-edit"></i></a> </td>
                </tr>
            <? $c++; $stt++; } ?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->