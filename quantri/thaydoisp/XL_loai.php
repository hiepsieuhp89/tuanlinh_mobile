<?php 
$thongbao = "";
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch($action)
{
	case "themmoiloai":
		$thongbao = themloaiMoi();
		break;
	case "capnhatloai":
		$thongbao = suaThongtinloai();
		break;
	case "xoaloai":
		 $thongbao = xoaThongtinloai();
		break;		
}

//----------------------------------------------------------------------------
function themloaiMoi()
{
	global $pdo; //sử dụng biến $pdo có bên ngoài hàm (biến toàn cục).
	$tenloai = isset($_POST["tenloai"]) ? $_POST["tenloai"] : "";
	$maloai = isset($_POST["maloai"]) ? $_POST["maloai"] : "";
	$manhom = isset($_POST["manhom"]) ? $_POST["manhom"] : "";
	$sql = "INSERT INTO `loaisp`(`maloai`, `tenloai`, manhom) VALUES ('$maloai','$tenloai', '$manhom')";
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin loại mới đã được cập nhật.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin loại không được cập nhật.')</script>";
}
//----------------------------------------------------------------------------
function suaThongtinloai()
{
	global $pdo;
	$tenloai = isset($_POST["tenloai"]) ? $_POST["tenloai"] : "";
	$maloai = isset($_POST["maloai"]) ? $_POST["maloai"] : "";
	

	$sql = "UPDATE `loaisp` SET `tenloai`='$tenloai' WHERE `maloai`='$maloai'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin loại sản phẩm đã được cập nhật.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin loại sản phẩm không được cập nhật.')</script>";
}
//----------------------------------------------------------------------
function xoaThongtinloai()
{
	global $pdo;
	$maloai = isset($_GET["maloai"]) ? $_GET["maloai"] : "";

	$sql = "DELETE FROM `loaisp` WHERE maloai='$maloai'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin loại sản phẩm đã được xóa.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin loại sản phẩm không được xóa.')</script>";
}
?>
