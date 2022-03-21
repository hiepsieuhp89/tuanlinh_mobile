<?php

$thongbao = "";
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch($action)
{
	case "xoa":
		 $thongbao = xoaThongtinkh();
		break;		
}

function xoaThongtinkh()
{
	global $pdo;
	$makh = isset($_GET["makh"]) ? $_GET["makh"] : "";

	$sql = "DELETE FROM khachhang WHERE makh='$makh'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin khách hàng đã được xóa.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin khách hàng không được xóa.')</script>";
}
?>