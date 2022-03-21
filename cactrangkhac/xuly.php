<?php 
//include_once("../KETNOI/ketnoi.php");
//dùng hàm addslashes() và md5 để tránh cớm.
if(isset($_POST["gui"])){
$ten = $_POST["ten"];
$em = addslashes($_POST["email"]);
$sdt = addslashes($_POST["sdt"]);
$diachi = addslashes($_POST["diachi"]);
$ngay = addslashes($_POST["ngay"]);
$thang = addslashes($_POST["thang"]);
$nam = addslashes($_POST["nam"]);
$tdn = addslashes($_POST["tdn"]);
$pass = md5(addslashes($_POST["pass"]));
$nhaplai = md5(addslashes($_POST["nhaplai"]));
$gioitinh = (int) $_POST["gioitinh"];
//kiểm tra các thông tin ở trên nếu có bất kì thông tin nào chưa điền thì báo lỗi
if(!$ten || !$em || !$diachi || !$sdt || !$ngay || !$thang || !$nam || !$_POST['pass'] || !$_POST['nhaplai'] || !$gioitinh){
	echo "Xin vui lòng nhập đầy đủ thông tin <a href='javascript:history.go(-1)'>Trở về</a>";
	exit;
	}
	//kiểm tra xem tên người dùng đã nhập chưa
	else	if($pass != $nhaplai){
			echo "Mật khảu không giống nhau <a href='javascript:history.go(-1)'>Trở về</a>";
			}
	else{
		$sql = "INSERT INTO khachhang(
		makh,
		hokh,
		tenkh,
		diachi,
		tendangnhap,
		matkhau,
		ngaysinh,
		gioitinh,
		dienthoai,
		email,
		ngaydk) VALUES (NULL,'$ten','','$diachi','$tdn','$pass','',$gioitinh,$sdt,'$em','') ";
		$pdo->query($sql);
		echo "Chúc mừng bạn đã đăng kí thành công.";
		}
			
}
?>