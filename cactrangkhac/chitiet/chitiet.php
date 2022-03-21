
<style>
* {
	margin: 0;
	padding: 0;
}
#center {
	width: 600px;
	height: auto;
	margin:auto;
	padding: 0px;
	display: block;
	overflow: hidden;
	float: left;
}
.anh {
	width: 598px;
	height: auto;
	display: block;
	overflow: hidden;
	margin: 5px auto;
}
.anh1 {
	width: 292px;
	height: 350px;
	float: left;
}
#ban{
	width:100px;
	height:30px;
	border-radius:5px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:15px;
	font-weight:bold;
	float:right;}
#ban:hover{
	background:#3d80eb;
	color:#fff;
	}
.sanphamchitiet {
	width: 590px;
	height: auto;
	margin: 20px 30px;
	padding: 0;
}
.sanphamchitiet td{
	text-align:center;}
.sanphamchitiet li {
	padding-left: 20px;
	list-style: none;
	text-align:center;
	height:40px;
	line-height:40px;
}
.soluoc{
	width:280px;
	height:auto;
	float:right;
	margin:20px auto;
	line-height:20px;
	padding:10px;
	}
.tensp{
	font-family:Arial, Helvetica, sans-serif;
	font-size:15px;
	font-weight:bold;}
.mota1{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	}
#mota1{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #9bb342;}
.mota{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	}
.mota2{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	font-weight:bold;
	}
.dathang{
	float: left;
	margin-left:30px;
	}
</style>
<?php
	
	$masp = isset($_GET["masp"]) ? $_GET["masp"] : "" ;
	$dieu_kien = "";
	if ($masp!= "")
	$dieu_kien = "Where masp = '$masp'";
		$sql =" SELECT masp, tensp, maloai, mancc, hinhanh, dongia, khuyenmai, mota FROM sanpham $dieu_kien";
	$bang_ct = $pdo->query($sql);
	
 ?>
<div id="center">
<div class="anh">
<?php foreach($bang_ct as $row){?>
  <div class="anh1">
    <img src="image_sp/<?= $row["hinhanh"];?>" width="250" height="270" />
    
   </div>
  <div class="soluoc">
  	<span class="tensp"><?= $row["tensp"];?></span>
        
        <hr />
    <p class="mota"> <?= $row["mota"];?></p>
   
    <p class="mota2">Đơn giá:<?= number_format($row["dongia"]);?> VNĐ</p>
  </div>
  <div class="dathang"><a href="?view=giohang&action=themvaogio&masp=<?= $row["masp"]; ?>"><input type="submit" id="ban" value="Đặt hàng >>"  /></a></div>
</div>
<?php }?>
</div>
