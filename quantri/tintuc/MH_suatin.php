<?php 

	$matintuc = (isset($_REQUEST["matintuc"])) ? $_REQUEST["matintuc"] : "0";	
	$sql = "SELECT `matintuc`, `tieude`, `hinhanh`, `noidung`, `ngaythang` FROM `tintuc`  WHERE matintuc = $matintuc";
	
	$bang_tt = $pdo->query($sql);
	$tt = $bang_tt->fetch(PDO::FETCH_OBJ);
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
	width:600px;
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
	width:598px;
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
<div class="sua">
<form  method="post" action="?action=capnhattt">
<input name="matintuc" type="hidden" size="40" value="<?= $tt->matintuc; ?>" />
<h3>Sửa tin tức</h3>

<table id="bang">
  <tr>
    <td width="121">Tên sản phẩm:</td>
    <td width="465"><input name="tieude" type="text" id="tensp" value="<?= $tt->tieude; ?>" size="50" /></td>
  </tr>
  <tr>
    <td>Nội dung:</td>
    <td><textarea name="noidung" cols="30" rows="3" id="mota" class="ckeditor"><?= $tt->noidung; ?></textarea></td>
  </tr>
  <tr>
    <td>Ngày tháng:</td>
    <td><input name="date" type="date" value="<?= $tt->ngaythang; ?>" /></td>
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