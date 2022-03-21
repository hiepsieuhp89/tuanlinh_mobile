<?php 


session_start();
include("../KETNOI/ketnoi.php");

/*if (!isset($_SESSION["username"]))
	{
		
		header("location:dangnhap.php");	
	}
	
	if(isset($_POST["action"]) && $_POST["action"]=="dangxuat")
	{
		unset($_SESSION["usename"]);
		header("location:dangnhap.php");
		
	}*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trangquantri_cuahangdienthoaianhtuan</title>
<link rel="stylesheet" type="text/css" href="css/text.css"/>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/blue.css"/>
<link rel="stylesheet" type="text/css" href="css/960.css"/>
<link rel="stylesheet" type="text/css" href="css/smoothness/ui.css"/>
<style>
  #menu ul.group li {
    width: 112px;
}
</style>

<!--<script type="text/javascript" src="../../ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/blend/jquery.blend.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.sortable.js"></script>
<script type="text/javascript" src="js/ui.dialog.js"></script>
<script type="text/javascript" src="js/ui.datepicker.js"></script>
<script type="text/javascript" src="js/effects.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.pack.js"></script>
<!--[if IE]>
    <script language="javascript" type="text/javascript" src="js/flot/excanvas.pack.js"></script>
    <![endif]-->
<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
	<script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>        
   
<script id="source" language="javascript" type="text/javascript" src="js/graphs.js"></script>-->
<script type="text/javascript">

</script>


</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper"> 
  <!-- HIDDEN COLOR CHANGER -->
  <div style="position:relative;"> 
    <!----- <div id="colorchanger"><a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a> </div>----> 
  </div>
  <!--LOGO-->
  <div class="grid_8" id="logo">Quản lí website Tuấn Linh Mobile</div>
  <div class="grid_8"> 
    <!-- USER TOOLS START -->
    <div id="user_tools"><span><a href="#" class="mail">(1)</a> Welcome <a href="#">
<!--      --><?//=$_SESSION["hotenad"]; ?>
      </a> | <a href="#" onclick="btnDangxuat_onclick()">Logout</a></span></div>
  </div>
  <!-- USER TOOLS END -->
  <div class="grid_16" id="header"> 
    <!-- MENU START -->
    <div id="menu">
      <ul class="group" id="menu_group_main">
        <li class="item first" id="one"><a href="?view=trangchu" class="main current"><span class="outer"><span class="inner dashboard">Trang chủ</span></span></a></li>
        <li class="item middle" id="two"><a href="?view=chitiet" class="main"><span class="outer"><span class="inner content">Chi tiết sản phẩm</span></span></a></li>
		<li class="item middle" id="two"><a href="?view=loai" class="main"><span class="outer"><span class="inner content">Loại sản phẩm</span></span></a></li>
        <li class="item middle" id="two"><a href="?view=nhom" class="main"><span class="outer"><span class="inner content">Nhóm sản phẩm</span></span></a></li>
        <li class="item middle" id="four"><a href="?view=nguoidung" class="main"><span class="outer"><span class="inner users">Người dùng</span></span></a></li>
        <li class="item middle" id="seven"><a href="?view=donhang" class="main"><span class="outer"><span class="inner event_manager">Đơn hàng</span></span></a></li>
        <li class="item last" id="eight"><a href="?view=tintuc" class="main"><span class="outer"><span class="inner newsletter">Tin tức</span></span></a></li>
        <li class="item last" id="nine"><a href="?view=thongke" class="main"><span class="outer"><span class="inner content">Thống kê</span></span></a></li>
      </ul>
    </div>
    <!-- MENU END --> 
  </div>
  <div class="grid_16" id="content"> 
    <!-- TABS START -->
    <div class="grid_9">
      <h1 class="dashboard"><a href="?view=trangchu">Trang chủ</a></h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><a href="#" class="inline_calendar">Bạn có 0 đơn đặt hàng ngày hôm nay!</a>
      <div class="hidden_calendar"></div>
    </div>
    <!-- TABS END --> 
  </div> 
  
  <!-- CONTENT START -->
   <?php 
	 	$view = isset($_REQUEST["view"]) ? $_REQUEST["view"]: "" ;
		switch($view)
		{
			case "donhang":
					include_once("donhang/donhang.php");
				break;
			case "nguoidung":
					include_once("nguoidung/nguoidung.php");
				break;
			case "trangchu":
					include_once("quanliad/trangchuquantri.php");
				break;
			case "chitiet":
					include_once("thaydoisp/chitietsp.php");
				break;
			case "nhom":
					include_once("thaydoisp/nhomsp.php");
				break;
			case "loai":
					include_once("thaydoisp/loaisp.php");
				break;
			case "tintuc":
					include_once("tintuc/tintuc.php");
				break;	
      case "thongke":
				  include_once("thongke/thongke.php");
				break;	
			default:
				include_once("quanliad/trangchuquantri.php");	
		}
	
	 ?>
  <!-- END CONTENT--> 

<div class="clear"> </div>
</div>
<!-- This contains the hidden content for modal box calls -->
<div class='hidden'>
  <div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
    <p><strong>This content comes from a hidden element on this page.</strong></p>
    <p><strong>Try testing yourself!</strong></p>
    <p>You can call as many dialogs you want with jQuery UI.</p>
  </div>
</div>
</div>
<!-- WRAPPER END --> 
<!-- FOOTER START -->
<div class="container_16" id="footer"> Website Administration by <a href="../index.htm">Team 1.</a></div>
<!-- FOOTER END -->
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
	function btnDangnhap_onclick()
	{
		document.getElementById('action').value="dangnhap"
		document.getElementById('form1').submit();
	}
	
	function btnDangxuat_onclick()
	{
		document.getElementById('action').value="dangxuat"
		document.getElementById('form1').submit();
	}
</script>
<script>
  //chart theo loai san pham
const dmsp = document.getElementById('chartdmsanpham').getContext('2d');
<?php 

  $bang_dmsp=$pdo->query("SELECT tenloai, count(*) as tong from loaisp inner join sanpham on loaisp.maloai = sanpham.maloai
  group by loaisp.maloai, tenloai");
  $bang_dmsp_arr = [];
  foreach ($bang_dmsp as $key => $value) {
    $bang_dmsp_arr[$key] = $value['tong'];
  }

  $cacdmsp = $pdo->query("SELECT DISTINCT tenloai from loaisp");
  $cacdmsp_arr = [];
  foreach ($cacdmsp as $key => $value) {
    $cacdmsp_arr[$key] = $value['tenloai'];
  }
?>
new Chart(dmsp, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($cacdmsp_arr); ?>,
        datasets: [{
            label: 'Thống kê sản phẩm theo loại',
            data: <?php echo json_encode($bang_dmsp_arr); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(100, 102, 255, 0.7)',
                'rgba(100, 120, 30, 0.7)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
// chart theo so san pham ban ra theo loai
const spban = document.getElementById('chartdspban').getContext('2d');
<?php 

  $bang_dmsp=$pdo->query("SELECT loaisp.tenloai, loaisp.maloai, sum(`soluong`) as tongban
  from ctdondathang INNER join sanpham on ctdondathang.masp = sanpham.masp
  inner join loaisp on sanpham.maloai = loaisp.maloai
  group by loaisp.tenloai, loaisp.maloai");

  $bang_dmsp_arr = [];
  $cacdmsp_arr = [];
  foreach ($bang_dmsp as $key => $value) {
    $bang_dmsp_arr[$key] = $value['tongban'];
    $cacdmsp_arr[$key] = $value['tenloai'];
  }
?>
new Chart(spban, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($cacdmsp_arr); ?>,
        datasets: [{
            label: 'Thống kê sản phẩm bán ra',
            data: <?php echo json_encode($bang_dmsp_arr); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(100, 102, 255, 0.7)',
                'rgba(100, 120, 30, 0.7)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
// chart theo nhom san pham
const nhomsp = document.getElementById('chartnhomsp').getContext('2d');
<?php 

  $bang_dmsp=$pdo->query("SELECT nhomsp.tennhom, count(*) as tong
  from nhomsp INNER join loaisp on nhomsp.manhom = loaisp.maloai
  inner join sanpham on sanpham.maloai = loaisp.maloai
  group by nhomsp.tennhom");

  $bang_dmsp_arr = [];
  $cacdmsp_arr = [];
  foreach ($bang_dmsp as $key => $value) {
    $bang_dmsp_arr[$key] = $value['tong'];
    $cacdmsp_arr[$key] = $value['tennhom'];
  }
?>
new Chart(nhomsp, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($cacdmsp_arr); ?>,
        datasets: [{
            label: 'Thống kê số lượng sản phẩm theo nhóm',
            data: <?php echo json_encode($bang_dmsp_arr); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(100, 102, 255, 0.7)',
                'rgba(100, 120, 30, 0.7)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
