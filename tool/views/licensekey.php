<? if(!isset($_SESSION['user'])){ header('Location: ../index.php'); } ?> 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
<?
if (isset($_GET['title'])) {

                if($_GET['title'] == 'ms-office-win')
                {
                  echo 'Licenses Microsoft Office for Windows';
                }         
                else if($_GET['title'] == 'ms-office-mac')
                {
                  echo 'Licenses Microsoft Office for Mac';
                } 
                else if($_GET['title'] == 'ms-visio')
                {
                  echo 'Licenses Microsoft Visio';
                }   
                else if($_GET['title'] == 'windows-7')
                {
                  echo 'Licenses Windows 7';
                }      
                else if($_GET['title'] == 'windows-10')
                {
                  echo 'Licenses Windows 10';
                }

                } else 
                {
                  echo 'Licenses';
                }

?>        
        <small>Advanced Tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="#">License Keys</a></li>
        <li class="active">Tất cả</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
             <?  

if (isset($_GET['title'])) {
                if($_GET['title'] == 'ms-office-win')
        				{
        					include('license/officewin.php');
        				}         
                else if($_GET['title'] == 'ms-office-mac')
                {
                  include('license/officemac.php');
                } 
                else if($_GET['title'] == 'ms-visio')
                {
                  include('license/msvisio.php');
                }   
                else if($_GET['title'] == 'windows-7')
                {
                  include('license/win7.php');
                }      
                else if($_GET['title'] == 'windows-10')
                {
                  include('license/win10.php');
                }                                          
                else
                {
                  thongbao('Trang bạn tìm không tồn tại!\r\nVui lòng thử lại :)');
                  chuyentrang('area.php?page=license-keys');
                }
} else {
include('license/all.php');  
}
            ?>       	
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->