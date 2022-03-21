<?php 

	$masp = (isset($_REQUEST["masp"])) ? $_REQUEST["masp"] : "0";	
	$sql = "SELECT * FROM sanpham  WHERE masp = '$masp'";
	
	$bang_sp = $pdo->query($sql);
	$sp = $bang_sp->fetch(PDO::FETCH_OBJ);
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
<form  method="post" action="?view=chitiet&action=capnhatsp" name="frmCapnhat" id="frmCapnhat">
<input name="masp" type="hidden" size="40" value="<?= $sp->masp; ?>" />
<h3>Sửa thông tin chi tiết sản phẩm</h3>
<table id="bang">
  <tr>
    <td>Tên sản phẩm:</td>
    <td><input name="tensp" type="text" id="tensp" value="<?= $sp->tensp; ?>" /></td>
  </tr>
  <tr>
    <td>Đơn giá:</td>
    <td><input name="dongia" type="text" id="tensp" value="<?= $sp->dongia; ?>" /></td>
  </tr>
  <tr>
    <td>Khuyến mại:</td>
    <td><input name="khuyenmai" type="text" id="tensp" value="<?= $sp->khuyenmai; ?>" /></td>
  </tr>
  <tr>
    <td>Mã loại:</td>
    <td>
    <select name="maloai"> 
    <?php foreach( $loai as $row) {?>
    		<?php if($row['maloai']==$sp->maloai){?>
    		<option value="<?=$row['maloai'] ?>" selected="selected"><?= $row['tenloai'];?> </option>
            <?php }else { ?>
            <option value="<?=$row['maloai'] ?>"><?= $row['tenloai'];?> </option>
           <?php }?> 
      <?php }?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mã nhà cung cấp:</td>
    <td><select name="mancc"> 
    		<?php foreach( $nhacc as $row) {?>
            <?php if($row['mancc']==$sp->mancc){?>
    		<option value="<?=$row['mancc'] ?>"  selected="selected">  <?= $row['tenncc'];?> </option>
            <?php }else { ?>
            <option value="<?=$row['mancc'] ?>">  <?= $row['tenncc'];?> </option>
           <?php }?> 
    		
            <?php }?>
    </select>
    </td>
  </tr>
   <tr>
    <td>Hình ảnh:</td>
    <td> <input name="hinhanh" type="text" id="hinhanh">
  <input type="button" name="Button" value="Upload" onClick="window.open('thaydoisp/Upload.php','','width=500,height=100, status=false')">
 </td>
  </tr>
   
  <tr>
    <td>Mô tả:</td>
    <td><textarea name="mota" cols="30" rows="3" id="mota" class="ckeditor"><?= $sp->mota; ?></textarea></td>
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