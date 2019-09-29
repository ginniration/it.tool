<? 
session_start();
require_once('./controls/settings.php');
Auth::protect();
if(!isset($_GET['page'])){ header('Location: area.php?page');}
if($_GET['page'] == 'logout'){Auth::logout();}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><? echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
<? if($_GET['page'] == "kekhai/laptop" || $_GET['page'] == "kekhai/thietbi" || $_GET['page'] == "bao-cao-sua-chua" || $_GET['page'] == "bao-cao-mua-sam" || $_GET['page'] == "license-keys" || $_GET['page'] == "bao-cao-sua-chua-hr-admin"){ ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">  
    <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
<? } else { ?>
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
<? } ?>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .dongho{
      color: white;
      line-height: 50px;
      font-size: 20px;
    }
  </style>        
</head>
<body onload="time()" class="hold-transition skin-blue <? if($_GET['page'] != "" || $_GET['page'] != NULL){ echo "sidebar-collapse"; } ?> sidebar-mini">
<div class="wrapper">
    <? 
        include('./views/header.php');
        include('./views/left.php'); 

            switch ($_GET['page']) {
      				case "kekhai/thietbi":
      					include("./views/stats.php");
      					break;
              case "add-kekhai/thietbi":
                include("./views/add.php");
                break;      
             case "add-licensekeys":
                include("./views/addkeys.php");
                break;        
             case "license-keys":
                include("./views/licensekey.php");
                break;                                         	       
              case "bao-cao-sua-chua":
                include("./views/suachua.php");
                break;  
              case "bao-cao-sua-chua-hr-admin":
                include("./views/hr-admin.php");
                break;                  
              case "bao-cao-mua-sam":
                include("./views/muasam.php");
                break;
              case "profile":
                include("./views/profile.php");
                break;
      				default:
                include('./views/content.php'); 
      				break;
            }

        include('./views/footer.php');
        include('./views/controlsidebar.php');
    ?>
</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<? if($_GET['page'] == "kekhai/laptop" || $_GET['page'] == "kekhai/thietbi" || $_GET['page'] == "bao-cao-sua-chua" || $_GET['page'] == "bao-cao-mua-sam" || $_GET['page'] == "license-keys" || $_GET['page'] == "bao-cao-sua-chua-hr-admin"){ ?>
 <!-- DataTables -->
 <script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<!-- page script -->
<script>
$(document).ready(function() {
    $('#example1').DataTable( {} 
    	);
} );
</script> 
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>
<? } else { ?>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<? } ?>
<script type="text/javascript">
function time() {
   var today = new Date();
   var weekday=new Array(7);
   weekday[0]="Chủ Nhật";
   weekday[1]="Thứ Hai";
   weekday[2]="Thứ Ba";
   weekday[3]="Thứ Tư";
   weekday[4]="Thứ Năm";
   weekday[5]="Thứ Sáu";
   weekday[6]="Thứ 7";
   var day = weekday[today.getDay()];
   var dd = today.getDate();
   var mm = today.getMonth()+1; //January is 0!
   var yyyy = today.getFullYear();
   var h=today.getHours();
   var m=today.getMinutes();
   var s=today.getSeconds();
   m=checkTime(m);
   s=checkTime(s);
   nowTime = h+":"+m+":"+s;
   if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day+', '+ dd+'/'+mm+'/'+yyyy;

   tmp='<span class="date">'+today+' | '+nowTime+'</span>';

   document.getElementById("clock").innerHTML=tmp;

   clocktime=setTimeout("time()","1000","JavaScript");
   function checkTime(i)
   {
      if(i<10){
     i="0" + i;
      }
      return i;
   }
}
</script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
