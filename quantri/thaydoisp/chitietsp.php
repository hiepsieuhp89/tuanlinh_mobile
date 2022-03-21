
<?php 


//session_start();
//include("../../KETNOI/ketnoi.php");



$kichthuoctrang=5;
$sql = "SELECT masp, tensp, maloai, mancc,  dongia, khuyenmai, mota FROM sanpham";
$bang_sp=$pdo->query($sql);
$tongsodong = $bang_sp->rowCount();
$tongsotrang = ceil($tongsodong/$kichthuoctrang);

$page = isset($_GET["page"]) ? $_GET["page"] : 1 ;
	$page = max($page, 1);	//Nếu số trang < 1 thì cho số trang là 1
	$page = min($page, $tongsotrang);	//Nếu số trang > tổng số trang, thì cho bằng tổng số trang
	
	//+ Tính vị trí của dòng bắt đầu
	$dongbatdau = ($page -1)*$kichthuoctrang;


	//include_once("../KETNOI/ketnoi.php");
	
	if(isset($_GET["manhinh"]) and $_GET["manhinh"]=="themmoisp")
		include_once("MH_thaydoisp.php");		
	else if(isset($_GET["manhinh"]) and $_GET["manhinh"]=="manhinhsuasp")
		include_once("MH_SUASP.php");

	
	include_once("XL_thaydoisp.php");
	

	$sql = "SELECT masp, tensp, maloai, mancc,  dongia, khuyenmai, mota FROM sanpham LIMIT $dongbatdau, $kichthuoctrang";
$bang_sp=$pdo->query($sql);
?>
<div class="grid_16" id="content">
<div class="portlet">
    <div class="portlet-header fixed"><img src="images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" />Thành viên quản trị website</div>
    <div class="portlet-content nopadding">
      <form action="" method="post">
        <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
          <thead>
            <tr>
              <th width="34" scope="col">&nbsp;</th>
              <th width="50" scope="col">Mã sản phẩm</th>
              <th width="100" scope="col">Tên sản phẩm</th>
              
              <th width="100" scope="col">Đơn giá</th>
              <th width="50" scope="col">Khuyến mại</th>
              <th width="250" scope="col">Mô tả</th>
              <th width="90" scope="col"><a href="?view=chitiet&manhinh=themmoisp">Thêm sản phẩm</a></th>
            </tr>
          </thead>
          <?php foreach($bang_sp as $row){?>
          <tbody>
            <tr>
              <td width="34"><label>
                  <input type="checkbox" name="checkbox" id="checkbox" />
                </label></td>
              <td><?php echo $row['masp']; ?></td>
              <td><?php echo $row['tensp']; ?></td>
              <td><?php echo $row['dongia']; ?></td>
              <td><?php echo $row['khuyenmai']; ?></td>
              <td><?php echo $row['mota']; ?></td>
              <td width="90"></a> <a href="?view=chitiet&manhinh=manhinhsuasp&masp=<?= $row['masp'];?>" class="edit_icon" title="Edit"></a> 
              <a href="?view=chitiet&action=xoasp&masp=<?= $row['masp'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa SP này không ?')" class="delete_icon" title="Delete"></a></td>
            </tr>
            <?php } ?>
            <tr class="footer">
              <td colspan="4"><a href="#" class="edit_inline">Sửa chữa</a><a href="#" class="delete_inline">Xóa</a></td>
              <td align="right">&nbsp;</td>
              <td colspan="3" align="right"><!--  PAGINATION START  -->
                
                <div class="pagination"> <a href="?view=chitiet&page=<?=$page-1;?>" class="next">&laquo; Previous</a> <span class="active">
                  <?php for($i=1; $i<=$tongsotrang; $i++) {?>
                  <a href="?view=chitiet&page=<?=$i; ?>" class="<?=($i==$page)? "tranghientai": "page"; ?>">
                  <?=$i; ?>
                  </a>
                  <?php } ?>
                  </span> <a href="?view=chitiet&page=<?=$page+1;?>" class="next">Next &raquo;</a> </div>
                
                <!--  PAGINATION END  --></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>