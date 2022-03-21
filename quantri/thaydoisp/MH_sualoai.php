<?php 
	
	$maloai = (isset($_REQUEST["maloai"])) ? $_REQUEST["maloai"] : "0";	
	$sql = "SELECT * FROM loaisp  WHERE maloai = $maloai";
	$bang_loai = $pdo->query($sql);
	$loai = $bang_loai->fetch(PDO::FETCH_OBJ);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../css/text.css"/>
<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
<link rel="stylesheet" type="text/css" href="../css/960.css"/>
<link rel="stylesheet" type="text/css" href="../css/smoothness/ui.css"/>
<style>
*{
	margin:0;
	padding:0;}
.sua{
	margin:10px auto;
	padding:0;
	width:800px;
	height:auto;
	clear:both;}
.sua h3{
	background:#a80000;
	border-radius:5px;
	height:30px;
	text-align:center;
	line-height:30px;
	color:#fff;}
#bang{
	margin:10px auto;
	width:798px;
	border:1 solid #000;
	line-height:30px;
	}
#bang tr{
	border:1px solid #000;
	}
#bang td{
	padding:0 0 0 10px;
	}
</style>

</head>

<body>
<div class="sua">
<form  method="post" action="?view=loai&action=capnhatloai">
<input name="maloai" type="hidden" size="40" value="<?= $loai->maloai; ?>" />
<h3>Thay đổi thông tin loại sản phẩm</h3>
<table id="bang">
  <tr>
    <td>Tên nhóm:</td>
    <td><input name="tenloai" type="text" id="tensp" value="<?= $loai->tenloai; ?>" /></td>
  </tr>
  <tr>
    <td><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td><input name="hinhanh" type="submit" value="Sửa" /></td>
  </tr>
</table>


</form>
</div>
</body>
</html>