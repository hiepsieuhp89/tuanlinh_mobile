<?php 


//session_start();
//include("../../KETNOI/ketnoi.php");



$kichthuoctrang=10;
$sql = "SELECT maadmin, tendangnhap, hoten, ngaysinh, matkhau, dienthoai, email FROM admin";
$bang_ad=$pdo->query($sql);
$tongsodong = $bang_ad->rowCount();
$tongsotrang = ceil($tongsodong/$kichthuoctrang);

$page = isset($_GET["page"]) ? $_GET["page"] : 1 ;
	$page = max($page, 1);	//Nếu số trang < 1 thì cho số trang là 1
	$page = min($page, $tongsotrang);	//Nếu số trang > tổng số trang, thì cho bằng tổng số trang
	
	//+ Tính vị trí của dòng bắt đầu
	$dongbatdau = ($page -1)*$kichthuoctrang;
	
	if(isset($_GET["manhinh"]) and $_GET["manhinh"]=="themmoiad")
		include_once("MH_themad.php");		
	else if(isset($_GET["manhinh"]) and $_GET["manhinh"]=="manhinhsuaad")
		include_once("MH_suaad.php");

	
	include_once("XL_admin.php");
$sql = "SELECT maadmin, tendangnhap, hoten, ngaysinh, matkhau, dienthoai, email FROM admin LIMIT $dongbatdau, $kichthuoctrang";
$bang_ad=$pdo->query($sql);
?>








  <!-- CONTENT START -->
  <div class="grid_16" id="content"> 
    <!--  TITLE START  -->
    
    <!--RIGHT TEXT/CALENDAR END--> 
    <!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
      <div class="portlet-header fixed"><img src="images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" />Thành viên quản trị website</div>
      <div class="portlet-content nopadding">
        <form action="" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr>
                <th width="34" scope="col">&nbsp;</th>
                <th width="136" scope="col">Tên</th>
                <th width="102" scope="col">Tên đăng nhập</th>
                <th width="109" scope="col">Ngày sinh</th>
                
                <th width="171" scope="col">E-mail</th>
                <th width="123" scope="col">Số điện thoại</th>
                <th width="90" scope="col"><a href="?manhinh=themmoiad">Thêm admin</a></th>
              </tr>
            </thead>
            <?php foreach($bang_ad as $row){?>
            <tbody>
              <tr>
                <td width="34"><label>
                    <input type="checkbox" name="checkbox" id="checkbox" />
                  </label></td>
                <td><?php echo $row['hoten']; ?></td>
                <td><?php echo $row['tendangnhap']; ?></td>
                <td><?php echo $row['ngaysinh']; ?></td>
                
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['dienthoai']; ?></td>
                <td width="90">  <a href="?manhinh=manhinhsuaad&maadmin=<?= $row['maadmin'];?>" class="edit_icon" title="Edit"></a>
                 <a href="?action=xoaad&maadmin=<?= $row['maadmin'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa ADMIN này không ?')" class="delete_icon" title="Delete"></a></td>
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
    <!--  END #PORTLETS --> 
  </div>
 
