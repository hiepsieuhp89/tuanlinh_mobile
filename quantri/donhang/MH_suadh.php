<?php 

	$maadmin = (isset($_REQUEST["maadmin"])) ? $_REQUEST["maadmin"] : "0";	
	$sql = "SELECT * FROM admin  WHERE maadmin = '$maadmin';";
	
	$bang_ad = $pdo->query($sql);
	$ad = $bang_ad->fetch(PDO::FETCH_OBJ);
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
<form  method="post" action="../quanliad - Copy/?action=capnhatad">
<input name="masp" type="hidden" size="40" value="<?= $ad->maadmin; ?>" />
<h3>Thêm thông tin quản trị viên</h3>
<table id="bang">
  <tr>
    <td>Họ tên admin:</td>
    <td><input name="tenad" type="text" id="tensp" value="<?= $ad->hoten; ?>" /></td>
  </tr>
  <tr>
    <td>Tên đăng nhập:</td>
    <td><input name="tendn" type="text" id="tensp" value="<?= $ad->tendangnhap; ?>" /></td>
  </tr>
  <tr>
    <td>Mật khẩu:</td>
    <td><input name="mk" type="password" id="tensp" value="<?= $ad->matkhau; ?>" /></td>
  </tr>
  <tr>
    <td>Số điện thoại:</td>
    <td><input name="sdt" type="text" id="tensp" value="<?= $ad->dienthoai; ?>" /></td>
  </tr> 
  <tr>
    <td>Ngày sinh:</td>
    <td><input name="ngay" type="date" id="tensp" value="<?= $ad->ngaysinh; ?>" /></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input name="email" type="text" id="tensp" value="<?= $ad->email; ?>" /></td>
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