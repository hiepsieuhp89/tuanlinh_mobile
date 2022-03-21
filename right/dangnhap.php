<?php
//session_start();
//include("../KETNOI/ketnoi.php"); 
 ?>
<style>
*{
	margin:0;
	padding:0;}

#tendn{
	margin:10px 10px 10px 10px;
	padding-left:5px;
	float:left;
	border-radius:5px;
	height:25px;
	line-height: 1;
}
#pass{
	margin:10px 10px 10px 10px;
	padding-left:5px;
	float:left;
	border-radius:5px;
	height:25px;
	line-height: 1;

}
	

.moi{
	width:80px;
	height:30px;
	margin:35px 10px 10px 10px;
	padding-left:2px;
	float:left;
	border-radius:5px;
	background:#ADD8E6;
	}
.moi a{
	text-decoration:none;
	padding-top:13px;
	float:left;
	color:#000;
	}
.moi:hover{
	background:#3d80eb;
	color:#FFF;}
.moi:hover a{
	color:#fff;}
.quen{
	clear:both;
	margin:10px auto;
	padding-left:40px;}
.quen a{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	text-align:center;
	text-decoration:none;
	color:#333;}
.quen:hover a{
	text-decoration:underline;
	cursor:pointer;
	color:#03F;}
.thongbao{
	width:100%;
	height:auto;
	line-height:30px;
	color:#ab249;
	font:Arial, Helvetica, sans-serif;
	font-size:14px;
	}
.chao{
	width:100%;
	height:auto;
	line-height:30px;
	color:red;
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	padding-left:10px;
	}
#thoat{
	width:70px;
	height:30px;
	margin:10px 34px 10px 10px;
	padding-left:0;
	float:right;
	border-radius:5px;
	}
#thoat:hover{
	background:#3d80eb;
	color:#FFF;}
	
	
	
#btntim{
	width:70px;
	height:30px;
	margin:10px;
	border-radius:5px;
	float:right;
	padding:0;
	text-align:center}
#btntim:hover {
	color:#fff;
	background:#3d80eb;}

</style>

<?php 
$thongbao = "";
if(isset($_POST["action"]) && $_POST["action"]=="dangnhap"){
	$tendn = $_POST["tendn"];
	$matkhau = $_POST["pass"];
	
	$sql = "SELECT  makh , hoten ,  tendangnhap ,  matkhau  
FROM  khachhang 
WHERE tendangnhap = ?
AND matkhau =  ?";

$bang_khach_hang = $pdo->prepare($sql);
		
		$mang_tham_so = array($tendn,$matkhau);
		$bang_khach_hang->execute($mang_tham_so);
		
		$khach_hang = $bang_khach_hang->fetch(PDO::FETCH_OBJ);
if($khach_hang){
	
	$_SESSION["hoten"]=$khach_hang->hoten;
	$_SESSION["makh"]=$khach_hang->makh;
	}
else{
	$thongbao = "Tên đăng nhập hoặc mật khẩu sai.";
	}
	}
if(isset($_POST["action"]) && $_POST["action"]=="dangxuat")
	{
		unset($_SESSION["hoten"]);
		unset($_SESSION["makh"]);
	}
?>

<form action="" name="frmLogin" id="frmLogin" method="post" style="width:200px;height:250px;">
<input name="action" id="action" type="hidden" value="" />
<?php if ( ! isset($_SESSION["hoten"]))  { ?>
  <input type="text" name="tendn" id="tendn" placeholder="User name" size="20" />
  <input type="password" name="pass" id="pass" placeholder="Password" size="20" />
  <span class="thongbao"><?php echo $thongbao; ?></span>
  <div class="moi"><a href="?view=dangki">Đăng kí</a></div>
  
  <div class="moi"><a href="#" onClick=" btnDangnhap_onclick()">Đăng nhập</a></div>
  
  <div class="quen"><a>Bạn quên mật khẩu?</a></div>
<?php } else { ?>
	<span class="chao">Chào bạn <?=$_SESSION["hoten"];?></span>
    <p class="chao">Cảm ơn bạn đã tham gia vào website của chúng tôi</p>
    <div class="moi"><a href="#" onClick="btnDangxuat_onclick()">Đăng xuất</a></div>
<?php }?>
 </form>
<script>
	function btnDangnhap_onclick()
	{
		document.getElementById('action').value="dangnhap"
		document.getElementById('frmLogin').submit();
	}
	
	function btnDangxuat_onclick()
	{
		document.getElementById('action').value="dangxuat"
		document.getElementById('frmLogin').submit();
	}
</script>