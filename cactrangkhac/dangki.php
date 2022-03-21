
<?php //include("../KETNOI/ketnoi.php"); ?>
<?php 
//include_once("../KETNOI/ketnoi.php");
//dùng hàm addslashes()
if(isset($_POST["gui"])){
$ten = $_POST["ten"];
$em = addslashes($_POST["email"]);
$sdt = addslashes($_POST["sdt"]);
$diachi = addslashes($_POST["diachi"]);
$ngaysinh = addslashes($_POST["txtDate"]);

$tdn = addslashes($_POST["tdn"]);
$pass = addslashes($_POST["pass"]);
$nhaplai = addslashes($_POST["nhaplai"]);
$gioitinh = (int) $_POST["gioitinh"];
//kiểm tra các thông tin ở trên nếu có bất kì thông tin nào chưa điền thì báo lỗi
if(!$ten || !$em || !$diachi || !$sdt || !$_POST['pass'] || !$_POST['nhaplai']/* || !$gioitinh*/){
	echo "Xin vui lòng nhập đầy đủ thông tin <a href='javascript:history.go(-1)'>Trở về</a>";
	exit;
	}
	//kiểm tra xem tên người dùng đã nhập chưa
	else	if($pass != $nhaplai){
			echo "Mật khau không giống nhau <a href='javascript:history.go(-1)'>Trở về</a>";
			}
	else{
		$sql = "INSERT INTO khachhang(
		makh,
		hoten,
		
		diachi,
		tendangnhap,
		matkhau,
		ngaysinh,
		gioitinh,
		dienthoai,
		email,
		ngaydk) VALUES (NULL,'$ten','$diachi','$tdn','$pass','$ngaysinh',$gioitinh,$sdt,'$em',NOW()) ";
		$pdo->query($sql);
		
		echo "Chúc mừng bạn đã đăng kí thành công.";
		}
			
}
?>
<?php
//session_start();

if(isset($_POST['gui'])){
	if($_POST['ma_captcha']==$_SESSION['ma']){
		$ngon="Bạn không phải người máy.";
		}
	else{
		$sai="Bạn là người máy.";
		}
	}
?>
<style>
* {
	margin: 0;
	padding: 0;
}
.dangki {
	width: 320px;
	height: auto;
	margin: 10px auto;
	padding: 0;
	display: block;
	overflow: hidden;
}
#ten {
	width: 300px;
	height: 30px;
	margin: 10px auto;
	padding: 0 0 0 10px;
	line-height: 30px;
	border: 1px #CCCCCC solid;
	border-radius: 5px;
}
#diachi {
	width: 300px;
	height: auto;
	margin: 10px auto;
	padding: 0 0 0 10px;
	line-height: 30px;
	border: 1px #CCCCCC solid;
	border-radius: 5px;
}
#gui {
	width: 70px;
	height: 25px;
	float: right;
	margin: 20px;
	padding: 0;
	border-radius: 4px;
	clear: both;
}
#gui:hover {
	background: #3d80eb;
	color: #fff;
}
.vanban {
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
#date {
	border: solid 1px #999999;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	height: 30px;
	padding: 5px;
	text-align: center;
}
.gtinh {
	clear: both;
}
#ma_captcha {
	width: 100px;
	height: 30px;
	padding-left: 10px;
	line-height: 30px;
	border: 1px #CCCCCC solid;
	border-radius: 5px;
	float: left;
}
#ma {
	margin: 0px 0 0 10px;
}
</style>

<div class="dangki">
  <div class="vanban">
    <p>Đăng kí là thành viên chính thức để nhận được ưu đãi từ trung tâm chúng tôi.</p>
  </div>
  <form action="" method="post">
    <input name="ten" id="ten" type="text" placeholder="Họ tên đầy đủ" required />
    <input name="email" id="ten" type="email" placeholder="Nhập email của bạn" required />
    <input name="sdt" id="ten" type="text" placeholder="Số điện thoại" patern="^0*[1||9][0-9]{8,9}$" title="Hãy nhập đúng số điện thoại " required />
    <textarea name="diachi" cols="10" rows="3" required="required" id="diachi" placeholder="Địa chỉ"></textarea>
    <span>
    Ngày sinh:<input name="txtDate" type="date" id="txtDate" />
    </span> <span class="gtinh">
    <input name="gioitinh" type="radio" value="0" />
    <label class="gt">Nữ</label>
    <input name="gioitinh" type="radio" value="1" />
    <label class="gt">Nam</label>
    </span>
    <input name="tdn" id="ten" type="text" placeholder="Tên đăng nhập" required />
    <input name="pass" id="ten" type="password" placeholder="Mật khẩu" required/>
    <input name="nhaplai" id="ten"  type="password" placeholder="Nhập lại mật khẩu" required  />
    <?php 
	if(!empty($sai)) echo ("<div>.$sai.</div>");

	if(!empty($ngon)) echo ("<div>.$ngon.</div>");
?>
    <input name="ma_captcha" id="ma_captcha"  type="text" />
    <div class="cpt"><img src="cactrangkhac/captcha/macaptcha.php" id="ma" alt="captcha" /></div>
    <input name="gui" id="gui" type="submit" value="Đăng kí" />
  </form>
</div>
