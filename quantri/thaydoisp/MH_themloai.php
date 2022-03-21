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

<?php 
$sql="select *from nhomsp ";
	$nhom= $pdo->query($sql);
?>
</head>

<body>
<div class="sua">
<form  method="post" action="?view=loai&action=themmoiloai">
<h3>Thêm thông tin loại sản phẩm</h3>
<table id="bang">
  <tr>
    <td>Tên loai:</td>
    <td><input name="tenloai" type="text" id="tensp" /></td>
  </tr>
  <tr>
    <td>Mã loai:</td>
    <td><input name="maloai" type="text" id="tensp" /></td>
  </tr>
  <tr>
    <td>Tên nhóm:</td>
    <td>
    
    <select name="manhom"> 
    <?php foreach( $nhom as $row) {?>
    		<option value="<?=$row['manhom'] ?>"><?= $row['tennhom'];?> </option>
            <?php }?>
    </select></td>
    
    
    </td>
  </tr>
  <tr>
    <td><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td><input name="hinhanh" type="submit" value="Thêm" /></td>
  </tr>
</table>


</form>
</div>
</body>
</html>