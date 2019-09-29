<?
if(isset($_GET['edit'])){
  $mahoa = $_GET['edit'];
  $tt = mysqli_query($db,"SELECT * FROM cp_keylicenses WHERE coded='$mahoa'");
  $row = mysqli_fetch_array($tt,MYSQLI_ASSOC);

  if($tt){
    include('chinhsua.php');
  }else {
    thongbao('Không tìm thấy yêu cầu này !\r\n Về lại Trang chủ');
    chuyentrang('area.php');
  }
}
?>    
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">
              <a href="area.php?page=add-licensekeys" class="btn btn-app"><i class="fa fa-plus"></i> THÊM LICENSE</a> 
              </h3>
            </div>
              <div class="box-body">
              <table id="example1" class="display" style="width:100%">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Tên License</th>
                  <th>Key</th>
                  <th>Danh Mục</th>
                  <th>Ngày Tạo </th>
                  <th>Đã Sử Dụng </th>
                  <th></th>
                </tr>
                </thead>
                <tbody>      
            <?

              $stt=1; 
              $conn = mysqli_query($db,"SELECT * FROM cp_keylicenses ORDER BY getdate DESC");
              while($row=mysqli_fetch_array($conn,MYSQLI_ASSOC))
              {
            ?>                    
                <tr>
                  <td><? echo $stt; ?></td>
                  <td><? echo $row['namelicense']; ?></td>
                  <td><? echo $row['keylicense']; ?></td>
                  <td><? dmlicense($row['danhmuc']); ?> </td>
                  <td><? echo date("d-m-Y",strtotime($row['getdate'])); ?></td>
                  <td><? echo $row['count']; ?></td>
                  <td ><a href="area.php?page=license-keys&edit=<? echo $row['coded']; ?>" class="btn btn-default"><i class="fa fa-edit"></i></a> </td>
                </tr>
            <?  $stt++; } ?> 
                </tbody>
              </table>                                            
              </div>
              <!-- /.box-body -->          
          </div>