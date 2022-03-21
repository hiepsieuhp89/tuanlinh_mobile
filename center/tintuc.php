<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.Productdetails {
	width: 580px;
	border: 1px solid #336699;
	padding: 3px;
	line-height: 25px;
}
.Productdetails .title {
	line-height: 30px;
	font-weight: bold;
	text-transform: capitalize;
	font-size: 20px;
	color: #FF9900;
}
.Productdetails img {
	float: left;
	margin-right: 10px;
	margin-bottom: 0px;
}
.Productdetails span {
	font-weight: bold;
	font-size: 16px;
}
.Productdetails p {
	font-size: 14px;
	line-height: 20px;
}
.Productdetails .datmua {
	color: #EE0000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<?php
	//include_once("../KETNOI/ketnoi.php");

	$sql = "SELECT `matintuc`, `tieude`, `hinhanh`, `noidung`, `ngaythang` FROM `tintuc`";
	$bang_tintuc = $pdo->query($sql);
?>
<?php foreach($bang_tintuc as $row) { ?>
<div class="Productdetails">
		<span class="title"><?= $row["tieude"]; ?></span><br />

		    

		<p align="justify"><?= $row["noidung"]; ?></p>
</div>
<?php } ?>
</body>
</html>
