
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


//--------------------------tim nang cao-------------------
$dieukien="";
$loaisp = isset($_POST["timtheohang"]) ? $_POST["timtheohang"]: "0";

if($loaisp  != "0" )
{
	if ($dieukien=="")
		$dieukien = " maloai='$loaisp' ";
	else
		$dieukien = "$dieukien AND maloai='$loaisp'";
}


$gia = isset($_POST["timtheogia"]) ? $_POST["timtheogia"]: "0";

if($gia  != "0" )
{
	if($gia==1)
		$dieukien = " $dieukien AND `dongia` <5000000 ";
	else if($gia==2)
		$dieukien= " $dieukien AND `dongia` BETWEEN 5000000 AND 10000000";
	else if($gia==3)
		$dieukien= " $dieukien AND `dongia` BETWEEN 10000000 AND 15000000";
	else if($gia==4)
		$dieukien= " $dieukien AND  `dongia` BETWEEN 15000000 AND 20000000";
	else if($gia==5)
		$dieukien= " $dieukien AND `dongia` >20000000";

}




if($dieukien!="")
	$dieukien = " WHERE $dieukien";
//-----------------------------Xử lý phân trang--------------------
//-----------------------------Xử lý phân trang--------------------
$kichthuoctrang = 6;

//+ Tính xem có bao nhiêu trang ?
$sql = "SELECT * FROM sanpham $dieukien; ";


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
$sql = "SELECT  masp ,  tensp , sanpham.maloai ,  dongia ,  khuyenmai ,  mota ,hinhanh
FROM  sanpham  $dieukien LIMIT $dongbatdau, $kichthuoctrang;";

$bang_sp = $pdo->query($sql);

?>

<div id="center">
	<!--------hang khuyen mai-------------->
	<div class="noi_dung_chinh">
		<h3 class="cat_title">Kết quả :
			<?= $tongsodong?>
		</h3>
		<div class="list_products">
			<div class="hang1">
				<?php if($tongsodong==0){echo"không tìm thấy sản phẩm"?>
				<?php }else{?>
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
							<div class="btnban"><a href="#">
									<input name="ban" type="submit" value="Mua hàng" id="ban" />
								</a></div>
						</div>

					<?php } ?>

				<?php }?>
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
	</div>

	<!---- san pham moi------------->

</div>