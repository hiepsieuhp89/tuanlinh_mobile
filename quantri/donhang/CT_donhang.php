<?php 

	$madh = (isset($_REQUEST["`madh`"])) ? $_REQUEST["`madh`"] : "0";	
	$sql = "SELECT ct.*,sp.tensp,ddh.tennguoinhan,ddh.dienthoai FROM ctdondathang ct inner JOIN sanpham sp ON ct.masp = sp.masp INNER JOIN dondathang ddh on ct.madh = ddh.madh";
	
	$bang_dh = $pdo->query($sql);
	$dh = $bang_dh->fetch(PDO::FETCH_OBJ);
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
</head>

<body>
<div class="sua">
<form  method="post" action="?view=donhang&view=capnhatdh">
<input name="madh" type="hidden" size="40" value="<?= $dh->madh; ?>" />
<h3>Chi tiết đơn hàng</h3>
<table id="bang">
  <tr>
    <td>Tên người nhận:</td>
    <td><input name="hoten" type="text" id="tensp" value="<?= $dh->tennguoinhan; ?>" /></td>
  </tr>
  <tr>
    <td>Tên sản phẩm:</td>
    <td>
    
    <textarea name="sanpham" cols="60" rows="5" id="mota"><?php
		$ds = $pdo->query("SELECT sp.tensp FROM ctdondathang ct inner JOIN sanpham sp ON ct.masp = sp.masp INNER JOIN dondathang ddh on ct.madh = ddh.madh WHERE ct.madh = {$dh->madh}");
		
		foreach($ds as $sp)
		echo $sp['tensp'].", ";
	 ?></textarea>
    </td>
  </tr>
  <tr>
    <td>Tổng cộng:</td>
    <td><input name="tong" type="text" value="<?= $dh->soluong*dongia ; ?>" /></td>
  </tr>
  <tr>
    <td>Số điện thoại:</td>
    <td><input name="sdt" type="text" value="<?= $dh->dienthoai; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="hinhanh" type="submit" value="Xong" /></td>
  </tr>
</table>


</form>
</div>
</body>
</html>