<style>
#left{
	height:auto;
	}
</style>
<?php 
	//include_once("../KETNOI/ketnoi.php");
	
	$sql = "SELECT  `maloai` ,  `tenloai` ,  `manhom` FROM  `loaisp` WHERE `manhom` =1";
	$bang_lap_top = $pdo->query($sql);
	$sql1 = "SELECT  `maloai` ,  `tenloai` ,  `manhom` FROM  `loaisp` WHERE `manhom` =2";
	$bang_phu_kien = $pdo->query($sql1);
		 
?>
<div id="left">

    <div class="menu_doc">
      <h3>Điện Thoại</h3>
      <ul>
	  <?php foreach($bang_lap_top as $row) { ?>
      
			<li><span>&#x27a3;</span><a href="?ML=<?=$row["maloai"];?>&TL=<?=$row["tenloai"];?>">Điện thoại <?=$row ["tenloai"];?></a></li>
		
     	<?php } ?>
       
      </ul>
    </div>
    <div class="menu_doc">
      <h3>Phụ kiện điện thoại</h3>
      <ul>
      <?php
	
	  foreach($bang_phu_kien as $row) { ?>
      
        <li><span>&#x27a3;</span><a href="?ML1=<?=$row["maloai"];?>&TL1=<?=$row["tenloai"];?>"><?=$row ["tenloai"];?></a></li> 
		
     	<?php } ?>
      </ul>
    </div>
</div>

