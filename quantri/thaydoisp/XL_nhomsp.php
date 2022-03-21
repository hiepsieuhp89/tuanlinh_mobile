<?php 
$thongbao = "";
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch($action)
{
	case "themmoinhom":
		$thongbao = themnhomMoi();
		break;
	case "capnhatnhom":
		$thongbao = suaThongtinnhom();
		break;
	case "xoanhom":
		 $thongbao = xoaThongtinnhom();
		break;		
}

//----------------------------------------------------------------------------
function themnhomMoi()
{
	global $pdo; //sử dụng biến $pdo có bên ngoài hàm (biến toàn cục).
	$tennhom = isset($_POST["tennhom"]) ? $_POST["tennhom"] : "";
	$manhom = isset($_POST["manhom"]) ? $_POST["manhom"] : "";
	$sql = "INSERT INTO `nhomsp`(`manhom`, `tennhom`) VALUES ('$manhom','$tennhom')";
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin nhóm mới đã được cập nhật.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin nhóm không được cập nhật.')</script>";
}
//----------------------------------------------------------------------------
function suaThongtinnhom()
{
	global $pdo;
	$tennhom = isset($_POST["tennhom"]) ? $_POST["tennhom"] : "";
	$manhom = isset($_POST["manhom"]) ? $_POST["manhom"] : "";
	

	$sql = "UPDATE `nhomsp` SET `tennhom`='$tennhom' WHERE `manhom`='$manhom'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin nhóm sản phẩm đã được cập nhật.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin nhóm sản phẩm không được cập nhật.')</script>";
}
//----------------------------------------------------------------------
function xoaThongtinnhom()
{
	global $pdo;
	$manhom = isset($_GET["manhom"]) ? $_GET["manhom"] : "";

	$sql = "DELETE FROM `nhomsp` WHERE manhom='$manhom'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin nhóm sản phẩm đã được xóa.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin nhóm sản phẩm không được xóa.')</script>";
}
?>
