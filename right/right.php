
<?php //include("../KETNOI/ketnoi.php");


	//session_start();
	//include_once("addcart.php");
	
	//Lấy dữ liệu giỏ hàng trong Session lưu ra biến cục bộ
	$giohang = $_SESSION["giohang"];
	$n = $_SESSION["n"];


?>
<div class="right">
  <div class="giohang">
    <ul>
      <li><a href="?view=giohang"><img src="right/giohang.png" width="50" height="50" />giỏ hàng</a></li>
    </ul>
    <div id="tien">
      <p>
        <?= $n; ?>
        Sản phẩm</p>
      
    </div>
  </div>
  <div class="account">
    <?php include("dangnhap.php"); ?>
  </div>
  <div class="banchay">
    <h3>Tìm kiếm nâng cao</h3>
    <div class="gia">
      <form name="gia_1" id="gia_1" method="post" action="?view=TIMKIEM">
        <h4>Tìm theo sản phẩm:</h4>
        <?php 
			$sql="SELECT * FROM  `loaisp`";
			$bang_hangsp = $pdo->query($sql);	
		?>
        <select name="timtheohang"  >
          <option value="0">---- Chọn sản phẩm -----</option>
          <?php foreach($bang_hangsp as $row) { ?>
          <option value="<?= $row["maloai"]; ?>">
            <?= $row["tenloai"]; ?>
          </option>
          <?php } ?>
        </select>
        <h4>Tìm theo giá:</h4>
        <?php 
			$sql1="SELECT * FROM `sanpham`";
			$bang_gia = $pdo->query($sql);	
		?>
        <select name="timtheogia" id="tintheogia">
          <option value="0" >-------- Chọn giá --------</option>
          <option value="1">Giá dưới 5 triệu</option>
          <option value="2">Giá từ 5 triệu đến 10 triệu</option>
          <option value="3">Giá từ 10 triệu đến 15 triệu</option>
          <option value="4">Giá từ 15 triệu đến 20 triệu</option>
          <option value="5">Giá lớn hơn 20 triệu</option>
        </select>
        <input name="btntim" id="btntim" type="submit" value="Tìm kiếm" />
      </form>
    </div>
  </div>
</div>
