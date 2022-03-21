<style>
.phantrang {
	text-align: center;
	margin-right: auto;
	margin-left: auto;
	margin-top: 10px;
	margin-bottom: 10px;
}
.phantrang a {
	margin-left: 2px;
	text-decoration: none;
	padding-top: 2px;
	padding-right: 5px;
	padding-bottom: 2px;
	padding-left: 5px;
	font-weight: bold;
	color: #FFFFFF;
	background-color: #a80000;
}
.phantrang .tranghientai {
	color: #006666;
	background-color: #FFFF99;
}
.price {
	
	font-weight: normal;
	color: #ff6600;/*text-decoration: line-through;*/
}
.price_sale{
	margin-top:10px;
	color:#666;
	text-decoration: line-through;
	font-weight: bold;
	font-size:14px;
	}
.conlai{
	font-weight: normal;
	color: #ff6600;
	font-weight: bold;
	}	
.price span {
	font-weight: bold;
	
}
</style>
<?php 
//include_once("../KETNOI/ketnoi.php");
//trang lien ket voi menu trai
$maloai = isset($_GET["ML1"]) ? $_GET["ML1"] : "" ;
	$dieu_kien = "";
	if ($maloai!= "")
	$dieu_kien = "Where sanpham.maloai = '$maloai'";
	
	
	$tenloai=isset($_GET["TL1"]) ? $_GET["TL1"] : "" ;
	$tensp = "";
	if ($tenloai!= "")
	$tensp="$tenloai";
	else $tensp=" phụ kiện";
	
	
//---------------------------Xử lý phân trang--------------------
	//-----------------------------Xử lý phân trang--------------------
	$kichthuoctrang = 6;
	
	//+ Tính xem có bao nhiêu trang ?
	$sql = "Select masp From sanpham INNER JOIN loaisp ON sanpham.maloai=loaisp.maloai  $dieu_kien and manhom=2; ";
	$bang_sp = $pdo->query($sql);
	$tongsodong = $bang_sp->rowCount();
		
	$tongsotrang = ceil($tongsodong/$kichthuoctrang);
	//+ Hiển thị danh sách thứ tự các trang dưới dạng liên kết
	//	(Xem phía cuối file này)
	
	//+ Nhận số trang được gửi về từ client
	$page = isset($_GET["page"]) ? $_GET["page"] : 1 ;
	$page = max($page, 1);	//Nếu số trang < 1 thì cho số trang là 1
	$page = min($page, $tongsotrang);	//Nếu số trang > tổng số trang, thì cho bằng tổng số trang
	
	//+ Tính vị trí của dòng bắt đầu
	$dongbatdau = ($page -1)*$kichthuoctrang;
	//----------------------------------lay du lieu sp tu csld------------
	//------------------------------------------------------
	$sql = "SELECT `masp`, `tensp`,  `hinhanh`, `dongia`,`khuyenmai`,sanpham.maloai,tenloai FROM `sanpham` INNER JOIN loaisp ON sanpham.maloai=loaisp.maloai  $dieu_kien and manhom=2 LIMIT $dongbatdau, $kichthuoctrang;";
	 
	$bang_sp = $pdo->query($sql);
	
?>


  <!--------hang khuyen mai-------------->
 
  <!--------------phu kien--------->
      <div class="cat_title" ><h3><?=$tensp; ?></h3></div>
      <div class="list_products">
        <div class="hang1">
          <?php foreach($bang_sp as $row){?>
          <div class="sanpham">
            <div class="img"><a href="?view=chitiet&masp=<?= $row["masp"]; ?>"><img src="image_sp/<?= $row["hinhanh"]; ?>" 
                    		width="147" height="141" /></a></div>
              
              
            <div class="name" style="text-align:center"><a href="#">
              <?= $row["tensp"]; ?>
              </a></div>
              <?php $khuyenmai= isset ($row["khuyenmai"])? $row["khuyenmai"] :"";
		 if($khuyenmai!= "")
		 {
			 
			 echo "<div class= \"sale\"> <p>-$khuyenmai%</p></div>";
		 }
		?>  
          <?php  
		   $giakhuyenmai= isset ($row["khuyenmai"])? $row["khuyenmai"] :"0";
		   $giaconlai = $row[("dongia")]-(($row["dongia"]*$row["khuyenmai"])/100);
		  
		   if($giakhuyenmai!="0" or "")
		   {
				echo"<div class=\"price_sale\"><span>".number_format($row[("dongia")]). " VND</span></div>";
				echo"<div class=\"conlai\">".number_format($giaconlai)." VND</div>";
		   }
			else{
				echo"<div class=\"price\"><span>".number_format($row[("dongia")]). " VND</span></div>";
				}
				
          ?>   
            
            <div class="btnban"><a href="?view=giohang&action=themvaogio&masp=<?= $row["masp"]; ?>">
              <input name="ban" type="submit" value="Mua hàng" id="ban" />
            </a></div>
          </div>
           <?php } ?>
      <div style="clear:both"></div>
      <div class="phantrang"> <a href="?page=<?=$page-1;?>" class="page">trang trước</a>
        <?php for($i=1; $i<=$tongsotrang; $i++) {?>
        <a href="?page=<?=$i; ?>" class="<?=($i==$page)? "tranghientai": "page"; ?>">
        <?=$i; ?>
        </a>
        <?php } ?>
        <a href="?page=<?=$page+1;?>" class="page">trang sau</a> </div>
        </div>
      </div>
    
    
     


 
