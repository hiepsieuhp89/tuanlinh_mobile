<?php 
$thongbao = "";
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch($action)
{
	case "themmoitt":
		$thongbao = themTTMoi();
		break;
	case "capnhattt":
		$thongbao = suaThongtinTT();
		break;
	case "xoatt":
		 $thongbao = xoaThongtinTT();
		break;		
}

//----------------------------------------------------------------------------
function themTTMoi()
{
	global $pdo; //sử dụng biến $pdo có bên ngoài hàm (biến toàn cục).
	$matintuc = isset($_POST["matintuc"]) ? $_POST["matintuc"] : "";
	$tieude = isset($_POST["tieude"]) ? $_POST["tieude"] : "";
	$noidung = isset($_POST["noidung"]) ? $_POST["noidung"] : "";
	$date = isset($_POST["date"]) ? $_POST["date"] : "";
	$sql = "INSERT INTO tintuc( tieude, noidung, ngaythang) 
	VALUES ('$tieude','$noidung','$date')";
	if ($pdo->exec($sql))
		echo "<script>alert('Tin tức mới đã được cập nhật.')</script>";
	else
		echo "<script>alert('Có lỗi, tin tức không được cập nhật.')</script>";
}
//----------------------------------------------------------------------------
function suaThongtinTT()
{
	global $pdo;
	$matintuc = isset($_POST["matintuc"]) ? $_POST["matintuc"] : "";
	$tieude = isset($_POST["tieude"]) ? $_POST["tieude"] : "";
	$noidung = isset($_POST["noidung"]) ? $_POST["noidung"] : "";
	$date = isset($_POST["date"]) ? $_POST["date"] : "";

	$sql = "UPDATE tintuc SET tieude='$tieude',noidung='$noidung',ngaythang='$date' WHERE matintuc='$matintuc'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Tin tức đã được cập nhật.')</script>";
	else
		echo "<script>alert('Có lỗi, tin tức không được cập nhật.')</script>";
}
//----------------------------------------------------------------------
function xoaThongtinTT()
{
	global $pdo;
	$matintuc = isset($_GET["matintuc"]) ? $_GET["matintuc"] : "";

	$sql = "DELETE FROM tintuc WHERE matintuc='$matintuc'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Tin tức đã được xóa.')</script>";
	else
		echo "<script>alert('Có lỗi, tin tức không được xóa.')</script>";
}
?>
