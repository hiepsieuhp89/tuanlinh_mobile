<?php 
$thongbao = "";
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch($action)
{
	case "themmoict":
		$thongbao = themMoict();
		break;
	case "capnhatct":
		$thongbao = suaThongtinct();
		break;
	case "xoact":
		 $thongbao = xoaThongtinct();
		break;		
}

//----------------------------------------------------------------------------
function themMoict()
{
	global $pdo; //sử dụng biến $pdo có bên ngoài hàm (biến toàn cục).
	
	$hoten = isset($_POST["hoten"]) ? $_POST["hoten"] : "";
	$sanpham = isset($_POST["sanpham"]) ? $_POST["sanpham"] : "";
	$tong = isset($_POST["tong"]) ? $_POST["tong"] : "";
	$sdt = isset($_POST["sdt"]) ? $_POST["sdt"] : "";
	$sql = "INSERT INTO `admin`( `tendangnhap`, `hoten`, `ngaysinh`, `matkhau`, `dienthoai`, `email`)
	 VALUES ('$tendn','$tenad','$ngay','$mk','$sdt','$email')";
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin admin mới đã được cập nhật.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin admin không được cập nhật.')</script>";
}
//----------------------------------------------------------------------------
function suaThongtinad()
{
	global $pdo;
	$maadin = isset($_POST["maadmin"]) ? $_POST["maadmin"] : "";
	$tenad = isset($_POST["tenad"]) ? $_POST["tenad"] : "";
	$tendn = isset($_POST["tendn"]) ? $_POST["tendn"] : "";
	$mk = isset($_POST["mk"]) ? $_POST["mk"] : "";
	$sdt = isset($_POST["sdt"]) ? $_POST["sdt"] : "";
	$ngay = isset($_POST["ngay"]) ? $_POST["ngay"] : "";
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	$sql = "UPDATE `admin` SET `tendangnhap`='$tendn',`hoten`='$tenad',`ngaysinh`='$ngay',
	`matkhau`='$mk',`dienthoai`='$sdt',`email`='$email'
	 WHERE maadmin='$maadmin'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin admin đã được cập nhật.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin admin không được cập nhật.')</script>";
}
//----------------------------------------------------------------------
function xoaThongtinad()
{
	global $pdo;
	$maadmin = isset($_GET["maadmin"]) ? $_GET["maadmin"] : "";

	$sql = "DELETE FROM admin WHERE maadmin='$maadmin'";
	
	
	if ($pdo->exec($sql))
		echo "<script>alert('Thông tin admin đã được xóa.')</script>";
	else
		echo "<script>alert('Có lỗi, thông tin admin không được xóa.')</script>";
}
?>
