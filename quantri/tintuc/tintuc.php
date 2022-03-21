
<?php 


//session_start();
//include("../../KETNOI/ketnoi.php");



$kichthuoctrang=5;
$sql = "SELECT * FROM tintuc";
$bang_tt=$pdo->query($sql);
$tongsodong = $bang_tt->rowCount();
$tongsotrang = ceil($tongsodong/$kichthuoctrang);

$page = isset($_GET["page"]) ? $_GET["page"] : 1 ;
	$page = max($page, 1);	//Nếu số trang < 1 thì cho số trang là 1
	$page = min($page, $tongsotrang);	//Nếu số trang > tổng số trang, thì cho bằng tổng số trang
	
	//+ Tính vị trí của dòng bắt đầu
	$dongbatdau = ($page -1)*$kichthuoctrang;


	//include_once("../KETNOI/ketnoi.php");
	
	if(isset($_GET["manhinh"]) and $_GET["manhinh"]=="themmoitt")
		include_once("MH_themtin.php");		
	else if(isset($_GET["manhinh"]) and $_GET["manhinh"]=="manhinhsuatt")
		include_once("MH_suatin.php");

	
	include_once("XL_tintuc.php");
	

	$sql = "SELECT `matintuc`, `tieude`, `hinhanh`, `noidung`, `ngaythang` FROM `tintuc` LIMIT $dongbatdau, $kichthuoctrang";
$bang_tt=$pdo->query($sql);
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


<div class="grid_16" id="content">
<div class="portlet">
    <div class="portlet-header fixed"><img src="images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" />Thành viên quản trị website</div>
    <div class="portlet-content nopadding">
      <form action="" method="post">
        <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
          <thead>
            <tr>
              <th width="34" scope="col">&nbsp;</th>
              <th width="50" scope="col">Mã tin tức</th>
              <th width="100" scope="col">Tiêu đề</th>
              <th width="50" scope="col">Nội dung</th>
              <th width="50" scope="col">Ngày tháng</th>
              <th width="90" scope="col"><a href="?view=tintuc&manhinh=themmoitt">Thêm sản phẩm</a></th>
            </tr>
          </thead>
          <?php foreach($bang_tt as $row){?>
          <tbody>
            <tr>
              <td width="34"><label>
                  <input type="checkbox" name="checkbox" id="checkbox" />
                </label></td>
              <td><?php echo $row['matintuc']; ?></td>
              <td><?php echo $row['tieude']; ?></td>
              <td><?php echo $row['noidung']; ?></td>
              <td><?php echo $row['ngaythang']; ?></td>
              <td width="90"></a> <a href="?view=tintuc&manhinh=manhinhsuatt&matintuc=<?= $row['matintuc'];?>" class="edit_icon" title="Edit"></a> 
              <a href="?view=tintuc&action=xoatt&matintuc=<?= $row['matintuc'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa Tin Tức này không ?')" class="delete_icon" title="Delete"></a></td>
            </tr>
            <?php } ?>
            <tr class="footer">
              <td colspan="4"><a href="#" class="edit_inline">Sửa chữa</a><a href="#" class="delete_inline">Xóa</a></td>
              <td align="right">&nbsp;</td>
              <td colspan="3" align="right"><!--  PAGINATION START  -->
                
                <div class="pagination"> <a href="?view=tintuc&page=<?=$page-1;?>" class="next">&laquo; Previous</a> <span class="active">
                  <?php for($i=1; $i<=$tongsotrang; $i++) {?>
                  <a href="?view=tintuc&page=<?=$i; ?>" class="<?=($i==$page)? "tranghientai": "page"; ?>">
                  <?=$i; ?>
                  </a>
                  <?php } ?>
                  </span> <a href="?view=tintuc&page=<?=$page+1;?>" class="next">Next &raquo;</a> </div>
                
                <!--  PAGINATION END  --></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</body>
</html>