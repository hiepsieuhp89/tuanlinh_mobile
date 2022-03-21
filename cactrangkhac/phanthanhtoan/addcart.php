<?php


//include_once("../KETNOI/ketnoi.php");
//------------------------------------------------
$thongbao = "";
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch($action)
{
	case "themvaogio":
		ThemSpVaoGio();
		break;
	case "capnhatsoluong":
		CapNhatSoLuong();
		break;
	case "xoa":
		XoaSpTrongGio();
		break;	
	case "thanhtoan":
		if(isset($_POST["btnGuidonhang"]))
			$thongbao = LuuDonhang();
		break;		
}

//--------------------------------------------------------------//
//Tạo một mảng để lưu trữ Giỏ hàng
if( ! isset($_SESSION["giohang"]))
{
	$giohang = array();
	$n = 0;	//Lưu số sản phẩm đang có trong giỏ
	
	//Lưu giỏ hàng vào session
	$_SESSION["giohang"] = $giohang;
	$_SESSION["n"] = $n;
}

//------Thu tuc Them mot san pham vao gio hang
function ThemSpVaoGio()
{
	global $pdo;
	//Lấy giỏ hàng từ Session lưu ra biến cục bộ
	$giohang=$_SESSION["giohang"] ;
	$n= $_SESSION["n"];
	
	//Nhận mã sản phẩm do người dùng chọn mua được gửi về từ client
	$masp = isset($_REQUEST["masp"]) ? $_REQUEST["masp"] : "" ;
	if($masp !="")
	{	
		//Kiểm tra xem trong giỏ hàng đã có mã sản phẩm này chưa
		$vitri = -1;
		for($i = 0; $i<$n ; $i++)
			if($giohang[$i][0] == $masp)
			{
				$vitri = $i;
				break;
			}
		//Nếu không tìm thấy (biến $vitri có giá trị bằng -1) thì thêm vào cuối
		if($vitri==-1)
		{
			//Lấy thông tin tên sản phẩm và đơn giá từ csdl;
			$sql = "SELECT masp, tensp,  dongia,khuyenmai  FROM sanpham WHERE masp = '$masp' ";
			$bangsp = $pdo->query($sql);
			$sanpham = $bangsp->fetch(PDO::FETCH_OBJ);
			
			//Thêm thông tin sản phẩm vào cuối của giỏ hàng (thêm vào vị trí n)
			$giohang[$n] = array($sanpham->masp, $sanpham->tensp, 1, $sanpham->dongia,$sanpham->khuyenmai);
			$n++;
		}
		else
		{
			//Tăng số lượng của sản phẩm có mã nhận được thêm một
			$giohang[$vitri][2]++;
		}
	}
	
	//Lưu giỏ hàng vào session sau khi đã xử lý
	$_SESSION["giohang"] = $giohang;
	$_SESSION["n"] = $n;
}
//------Thu Tuc  Cap nhat so luong cac san pham cua gio hang
function CapNhatSoLuong()
{	
	$giohang=$_SESSION["giohang"] ;
	$n= $_SESSION["n"];
	
	for($i = 0; $i<$n ; $i++)
	{
		$giohang[$i][2]= $_POST["txtsl{$i}"];
	}
	
	//Lưu giỏ hàng vào session sau khi đã xử lý
	$_SESSION["giohang"] = $giohang;
	$_SESSION["n"] = $n;
}

//------------Thu tuc Xoa mot san pham trong gio hang
function XoaSpTrongGio()
{
	
	//Lấy giỏ hàng từ Session lưu ra biến cục bộ
	$giohang=$_SESSION["giohang"] ;
	$n= $_SESSION["n"];
	
	$masp = isset($_REQUEST["masp"]) ? $_REQUEST["masp"] : "" ;
	//Xác định vị trí của sản phẩm cần xóa khỏi giỏ dựa vào mãsp nhận được
	$vtxoa = -1;	
	for($i = 0; $i<$n ; $i++)
		if($giohang[$i][0] == $masp)
		{
			$vtxoa = $i;
			break;
		}
		
	//Thực hiện xóa nếu tìm thấy sản phẩm có trong giỏ ($vtxoa > -1)	
	if($vtxoa > -1)
	{	
		for($i=$vtxoa; $i < $n-1 ; $i++)
			$giohang[$i] = $giohang[$i+1];
		$n = $n - 1;
	}
	
	//Lưu giỏ hàng vào session sau khi đã xử lý
	$_SESSION["giohang"] = $giohang;
	$_SESSION["n"] = $n;
	
}
//------Thu tuc Lap hoa don (Luu gio hang thanh hoa don trong csld)
function LuuDonhang()
{	
	global $pdo;
	//Lấy giỏ hàng từ Session lưu ra biến cục bộ
	$giohang=$_SESSION["giohang"] ;
	$n= $_SESSION["n"];
	
	$makh = $_SESSION["makh"];
	
	
	$txtHoten = $_POST["txthoten"];
	$txtEmail = $_POST["txtemail"];
	$txtDienthoai = $_POST["txtsdt"];
	$txtDiachi = $_POST["txtdiachi"];
	$txtYeucau = $_POST["txtyeucau"];
	
	
	//Chèn vào bảng đơn đặt hàng
	$sql = "INSERT INTO `dondathang`(`madh`,`makh`, `ngaydathang`, `tennguoinhan`, `diachinguoinhan`, `dienthoai`,
	 `yeucau`, `trangthai`) VALUES (?,?,?,?,?,?,?,?)";
		
	$thamso = array('',$makh,"NOW()",$txtHoten,$txtDiachi,$txtDienthoai,$txtYeucau, 0 );
//	echo $sql;
	$ps = $pdo->prepare($sql);
	
	if ($ps->execute($thamso))
	{
		//Nếu chèn vào bản đơn đặt hàng thành công, thì lấy SDH của hóa đơn vừa chèn, và chèn toàn bộ giỏ hàng vào bảng chi tiết hóa đơn
		$madh = $pdo->lastInsertId();		
		$sql = "INSERT INTO `ctdondathang`(`masp`, `madh`, `soluong`, `dongia`, `khuyenmai`) VALUES (?,?,?,?,?)";
		$ps = $pdo->prepare($sql);
		
		for($i=0; $i<$n; $i++)
		{
			$thamso = array( $giohang[$i][0],$madh, $giohang[$i][2],$giohang[$i][3],$giohang[$i][4]);
			$ps->execute($thamso)	;		
		}
		$n = 0; //xóa giỏ hàng
		
	}
	
	
	$_SESSION["giohang"] = $giohang;
	$_SESSION["n"] = $n;
	
	 return "Đặt hàng thành công";	
}

?>