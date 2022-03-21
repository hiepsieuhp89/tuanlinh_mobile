<?php 


//session_start();
//include("../../KETNOI/ketnoi.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../css/text.css"/>
<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
<link rel="stylesheet" type="text/css" href="../css/960.css"/>
<link rel="stylesheet" type="text/css" href="../css/blue.css"/>
<link rel="stylesheet" type="text/css" href="../css/smoothness/ui.css"/>
</head>

<body>
<div class="container_16" id="wrapper">
  <div id="tabs">
    <div class="container">
      <ul>
        <li><a href="?view=them" class="current"><span>Thay đổi chi tiết sản phẩm</span></a></li>
        <li><a href="#"><span>Thay đổi loại sản phẩm</span></a></li>
        <li><a href="#"><span>Thay đổi nhóm sản phẩm</span></a></li>
      </ul>
    </div>
  </div>
    <?php 
	 	$view = isset($_REQUEST["view"]) ? $_REQUEST["view"]: "" ;
		switch($view)
		{
			case "them":		
					include_once("thaydoisp/chitietsp.php");
				break;	
			default:
				include_once("thaydoisp/chitietsp.php");	
		}
	
	 ?>
</div>
</body>
</html>