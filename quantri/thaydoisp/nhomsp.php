<?php 


//session_start();
//include("../../KETNOI/ketnoi.php");



$kichthuoctrang=5;
$sql = "SELECT manhom, tennhom FROM nhomsp";
$bang_nhom=$pdo->query($sql);
$tongsodong = $bang_nhom->rowCount();
$tongsotrang = ceil($tongsodong/$kichthuoctrang);

$page = isset($_GET["page"]) ? $_GET["page"] : 1 ;
	$page = max($page, 1);	//Nếu số trang < 1 thì cho số trang là 1
	$page = min($page, $tongsotrang);	//Nếu số trang > tổng số trang, thì cho bằng tổng số trang
	
	//+ Tính vị trí của dòng bắt đầu
	$dongbatdau = ($page -1)*$kichthuoctrang;
	
	
	
	//include_once("../KETNOI/ketnoi.php");
	
	if(isset($_GET["manhinh"]) and $_GET["manhinh"]=="themmoinhom")
		include_once("MH_themnhom.php");		
	else if(isset($_GET["manhinh"]) and $_GET["manhinh"]=="manhinhsuanhom")
		include_once("MH_suanhom.php");

	
	include_once("XL_nhomsp.php");
$sql = "SELECT `manhom`, `tennhom` FROM `nhomsp` LIMIT $dongbatdau, $kichthuoctrang";
$bang_nhom=$pdo->query($sql);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
              <th width="50" scope="col">Mã nhóm</th>
              <th width="100" scope="col">Tên nhóm</th>
              <!--<th width="50" scope="col">Mã nhóm</th>
              <th width="50" scope="col">Mã nhà cung cấp</th>
              <th width="100" scope="col">Đơn giá</th>
              <th width="50" scope="col">Khuyến mại</th>
              <th width="250" scope="col">Mô tả</th>-->
              <th width="90" scope="col"><a href="?view=nhom&manhinh=themmoinhom">Thêm nhóm mới</a></th>
            </tr>
          </thead>
          <?php foreach($bang_nhom as $row){?>
          <tbody>
            <tr>
              <td width="34"><label>
                  <input type="checkbox" name="checkbox" id="checkbox" />
                </label></td>
              <td><?php echo $row['manhom']; ?></td>
              <td><?php echo $row['tennhom']; ?></td>
              <!--<td><?php echo $row['manhom']; ?></td>
              <td><?php echo $row['mancc']; ?></td>
              <td><?php echo $row['dongia']; ?></td>
              <td><?php echo $row['khuyenmai']; ?></td>
              <td><?php echo $row['mota']; ?></td>-->
              <td width="90"> <a href="?view=nhom&manhinh=manhinhsuanhom&manhom=<?= $row['manhom'];?>" class="edit_icon" title="Edit"></a>
               <a href="?view=nhom&action=xoanhom&manhom=<?= $row['manhom'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa nhóm SP này không ?')" class="delete_icon" title="Delete"></a></td>
            </tr>
            <?php } ?>
            <tr class="footer">
              <td colspan="4"><a href="#" class="edit_inline">Sửa chữa</a><a href="#" class="delete_inline">Xóa</a></td>
              <td align="right">&nbsp;</td>
              <td colspan="3" align="right"><!--  PAGINATION START  -->
                
                <div class="pagination"> <a href="?view=nhom&page=<?=$page-1;?>" class="next">&laquo; Previous</a> <span class="active">
                  <?php for($i=1; $i<=$tongsotrang; $i++) {?>
                  <a href="?view=nhom&page=<?=$i; ?>" class="<?=($i==$page)? "tranghientai": "page"; ?>">
                  <?=$i; ?>
                  </a>
                  <?php } ?>
                  </span> <a href="?view=nhom&page=<?=$page+1;?>" class="next">Next &raquo;</a> </div>
                
                <!--  PAGINATION END  --></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  </div>
</body>
</html>