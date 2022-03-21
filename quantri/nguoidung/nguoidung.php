<?php 


//session_start();
//include("../../KETNOI/ketnoi.php");



$kichthuoctrang=10;
$sql = "SELECT * FROM khachhang";
$bang_kh=$pdo->query($sql);
$tongsodong = $bang_kh->rowCount();
$tongsotrang = ceil($tongsodong/$kichthuoctrang);

$page = isset($_GET["page"]) ? $_GET["page"] : 1 ;
	$page = max($page, 1);	//Nếu số trang < 1 thì cho số trang là 1
	$page = min($page, $tongsotrang);	//Nếu số trang > tổng số trang, thì cho bằng tổng số trang
	
	//+ Tính vị trí của dòng bắt đầu
	$dongbatdau = ($page -1)*$kichthuoctrang;

	
	include_once("XL_nguoidung.php");
$sql = "SELECT * FROM khachhang LIMIT $dongbatdau, $kichthuoctrang";
$bang_kh=$pdo->query($sql);
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
                <th width="136" scope="col">Họ tên</th>
                <th width="102" scope="col">Tên đăng nhập</th>
                <th width="109" scope="col">Ngày sinh</th>
                <th width="109" scope="col">Giới tính</th>
                
                <th width="171" scope="col">E-mail</th>
                <th width="123" scope="col">Số điện thoại</th>
                <th width="109" scope="col">Địa chỉ</th>
                <th width="90" scope="col">Xóa người dùng</th>
              </tr>
            </thead>
            <?php foreach($bang_kh as $row){?>
            <tbody>
              <tr>
                <td width="34"><label>
                    <input type="checkbox" name="checkbox" id="checkbox" />
                  </label></td>
                <td><?php echo $row['hoten']; ?></td>
                <td><?php echo $row['tendangnhap']; ?></td>
                <td><?php echo $row['ngaysinh']; ?></td>
                <td><?php echo $row['gioitinh']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['dienthoai']; ?></td>
                <td><?php echo $row['diachi']; ?></td>
                <td width="90"> 
                 <a href="?view=nguoidung&action=xoa&makh=<?= $row['makh'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này không ?')" class="delete_icon" title="Delete"></a></td>
              </tr>
              <?php } ?>
              <tr class="footer">
                <td colspan="4"><a href="#" class="edit_inline">Sửa chữa</a><a href="#" class="delete_inline">Xóa</a></td>
                <td align="right">&nbsp;</td>
                <td colspan="3" align="right"><!--  PAGINATION START  -->
                  
                  <div class="pagination"> <span class="previous-off">&laquo; Previous</span> <span class="active">1</span> <a href="../cacphankhac/query_41878854" class="next">Next &raquo;</a> </div>
                  
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