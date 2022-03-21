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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php 
	$sql="select *from loaisp ";
	$loai= $pdo->query($sql);

	$sql="select *from nhacungcap ";
	$nhacc= $pdo->query($sql);
?>
</head>

<body>
<div class="sua">
<form  method="post" action="?view=chitiet&action=themmoisp" name="frmCapnhat" id="frmCapnhat">
<h3>Thêm thông tin chi tiết sản phẩm</h3>
<table id="bang">
  <tr>
    <td >Tên sản phẩm:</td>
    <td><input name="tensp" type="text" id="tensp2" value="" size="50" width:="width:" px="px" /></td>
  </tr>
  <tr>
    <td>Đơn giá:</td>
    <td><input name="dongia" type="text" id="tensp3" /></td>
  </tr>
  <tr>
    <td>Khuyến mại:</td>
    <td><input name="khuyenmai" type="text" id="tensp" /></td>
  </tr>
  <tr>
    <td>tên loại:</td>
    <td>
    <select name="tenloai"> 
    <?php foreach( $loai as $row) {?>
    		<option value="<?=$row['maloai'] ?>"><?= $row['tenloai'];?> </option>
            <?php }?>
    </select></td>
  </tr>
  <tr>
    <td>tên nhà cung cấp:</td>
    <td><select name="tenncc"> 
    		<?php foreach( $nhacc as $row) {?>
    		<option value="<?=$row['mancc'] ?>"><?= $row['tenncc'];?> </option>
            <?php }?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mô tả:</td>
    <td><textarea name="mota" cols="30" rows="3" id="mota" class="ckeditor"></textarea></td>
  </tr>
  <tr>
    <td>Hình ảnh:</td>
    <td>    
     <input name="hinhanh" type="text" id="hinhanh">
  <input type="button" name="Button" value="Upload" onClick="window.open('thaydoisp/Upload.php','','width=500,height=100, status=false')">
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