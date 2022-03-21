<?php 
$thongbao = "";
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch($action)
{
	case "themmoisp":
		$thongbao = themSPMoi();
		break;
	case "capnhatsp":
		$thongbao = suaThongtinSP();
		break;
	case "xoasp":
		 $thongbao = xoaThongtinSP();
		break;		
}

//----------------------------------------------------------------------------
function themSPMoi()
{
	global $pdo; //sử dụng biến $pdo có bên ngoài hàm (biến toàn cục).
	$tensp = isset($_POST["tensp"]) ? $_POST["tensp"] : "";
	$dongia = isset($_POST["dongia"]) ? $_POST["dongia"] : "";
	$mota = isset($_POST["mota"]) ? $_POST["mota"] : "";
	$tenloai = isset($_POST["tenloai"]) ? $_POST["tenloai"] : "";
	$tenncc = isset($_POST["tenncc"]) ? $_POST["tenncc"] : "";
	$khuyenmai = isset($_POST["khuyenmai"]) ? $_POST["khuyenmai"] : "";
	$sql = "INSERT INTO `sanpham`( `tensp`, `maloai`, `mancc`, `hinhanh`, `dongia`, `khuyenmai`, `mota`) 
	VALUES ('$tensp','$tenloai','$tenncc','','$dongia','$khuyenmai','$mota')";
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin sản phẩm mới đã được cập nhật.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin sản phẩm không được cập nhật.')</script>";
}
//----------------------------------------------------------------------------
function suaThongtinSP()
{
	global $pdo;
	$masp = isset($_POST["masp"]) ? $_POST["masp"] : "";
	$tensp = isset($_POST["tensp"]) ? $_POST["tensp"] : "";
	$dongia = isset($_POST["dongia"]) ? $_POST["dongia"] : "";
	$mota = isset($_POST["mota"]) ? $_POST["mota"] : "";
	$maloai = isset($_POST["maloai"]) ? $_POST["maloai"] : "";
	$mancc = isset($_POST["mancc"]) ? $_POST["mancc"] : "";
	$khuyenmai = isset($_POST["khuyenmai"]) ? $_POST["khuyenmai"] : "";

	$sql = "UPDATE `sanpham` SET `tensp`='$tensp',`maloai`='$maloai',mancc='$mancc',dongia='$dongia',khuyenmai='$khuyenmai',mota='$mota' WHERE `masp`='$masp'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin sản phẩm đã được cập nhật.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin sản phẩm không được cập nhật.')</script>";
}
//----------------------------------------------------------------------
function xoaThongtinSP()
{
	global $pdo;
	$masp = isset($_GET["masp"]) ? $_GET["masp"] : "";

	$sql = "DELETE FROM sanpham WHERE masp='$masp'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin sản phẩm đã được xóa.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin sản phẩm không được xóa.')</script>";
}
?>
