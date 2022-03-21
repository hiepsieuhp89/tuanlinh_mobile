<?php 


//session_start();
//include("../../KETNOI/ketnoi.php");



$kichthuoctrang=10;
$sql = "SELECT `madh`, `makh`, `ngaydathang`, `tennguoinhan`, `diachinguoinhan`, `dienthoai`, `yeucau`, `trangthai` FROM `dondathang`";
$bang_dh=$pdo->query($sql);
$tongsodong = $bang_dh->rowCount();
$tongsotrang = ceil($tongsodong/$kichthuoctrang);

$page = isset($_GET["page"]) ? $_GET["page"] : 1 ;
	$page = max($page, 1);	//Nếu số trang < 1 thì cho số trang là 1
	$page = min($page, $tongsotrang);	//Nếu số trang > tổng số trang, thì cho bằng tổng số trang
	
	//+ Tính vị trí của dòng bắt đầu
	$dongbatdau = ($page -1)*$kichthuoctrang;
	
	if(isset($_GET["manhinh"]) and $_GET["manhinh"]=="capnhatdh")
		include_once("CT_donhang.php");		
	else if(isset($_GET["manhinh"]) and $_GET["manhinh"]=="manhinhsuadh")
		include_once("MH_suadh.php");

	
	include_once("XL_donhang.php");
$sql = "SELECT `madh`, `makh`, `ngaydathang`, `tennguoinhan`, `diachinguoinhan`, `dienthoai`, `yeucau`, `trangthai` FROM `dondathang`";
$bang_dh=$pdo->query($sql);
?>








  <!-- CONTENT START -->
  <div class="grid_16" id="content"> 
    <!--  TITLE START  -->
    
    <!--RIGHT TEXT/CALENDAR END--> 
    <!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
      <div class="portlet-header fixed"><img src="../quanliad - Copy/images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" />Thành viên quản trị website</div>
      <div class="portlet-content nopadding">
        <form action="" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr>
                <th width="49" scope="col">&nbsp;</th>
                <th width="117" scope="col">Mã đơn hàng</th>
                <th width="227" scope="col">Tên người nhận</th>
                <th width="158" scope="col">địachỉ</th>
                
                <th width="247" scope="col">Điện thoại</th>
                <th width="178" scope="col">Yêu cầu</th>
                <th width="178" scope="col">trạng thái</th>
                <th width="133" scope="col"></th>
              </tr>
            </thead>
            <?php foreach($bang_dh as $row){?>
            <tbody>
              <tr>
                <td width="49"><label>
                    <input type="checkbox" name="checkbox" id="checkbox" />
                  </label></td>
                <td><?php echo $row['madh']; ?></td>
                <td><?php echo $row['tennguoinhan']; ?></td>
                <td><?php echo $row['diachinguoinhan']; ?></td>
                
                <td><?php echo $row['dienthoai']; ?></td>
                <td><?php echo $row['yeucau']; ?></td>
                <td><?php echo $row['trangthai']; ?></td>
                <td width="133">  <a href="?view=donhang&manhinh=manhinhsuadh&amp;maadmin=<?= $row['madh'];?>" class="edit_icon" title="Edit"></a>
                 <a href="?view=donhang&action=xoadh&amp;madh=<?= $row['madh'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không ?')" class="delete_icon" title="Delete"></a><a href="?view=donhang&manhinh=capnhatdh">chi tiết</a></td>
              </tr>
              <?php } ?>
              <tr class="footer">
                <td colspan="4"><a href="#" class="edit_inline">Sửa chữa</a><a href="#" class="delete_inline">Xóa</a></td>
                <td align="right">&nbsp;</td>
                <td colspan="4" align="right"><!--  PAGINATION START  -->
                  
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
 
