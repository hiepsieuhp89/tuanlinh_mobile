
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();

if(isset($_POST['gui'])){
	if($_POST['ma_captcha']==$_SESSION['ma']){
		$ngon="Bạn không phải người máy.";
		}
	else{
		$sai="Bạn là người máy.";
		}
	}


 ?>
<?php 
	if(!empty($sai)) echo ("<div>.$sai.</div>");

	if(!empty($ngon)) echo ("<div>.$ngon.</div>");
?>
<style>
* {
	margin: 0;
	padding: 0;
}
.dangki {
	width: 320px;
	height: auto;
	margin:10px auto;
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
#gui{
	width:70px;
	height:30px;
	float:right;
	margin:40px;
	padding:0;
	border-radius:4px;
	clear:both;}
#gui:hover{
	background:#3d80eb;
	color:#fff;}
.vanban{
	text-align:center;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	font-weight:bold;
	}
#ma_captcha{
	width:100px;
	height:30px;
	padding-left:10px;
	line-height: 30px;
	border: 1px #CCCCCC solid;
	border-radius: 5px;
	float:left;
	}
#ma{
	margin: 0px 0 0 10px;
	}
</style>




<div class="dangki">
<div class="vanban"><p>Đăng kí là thành viên chính thức để nhận được ưu đãi từ trung tâm chúng tôi.</p></div>
  <form action="" method="post">
    <input name="ten" id="ten" type="text" placeholder="Họ tên đầy đủ" value="" required="required" />
    <input name="dangki" id="ten" type="text" placeholder="Tên đăng nhập" required="required" />
    <input name="email" id="ten" type="email" placeholder="Nhập email của bạn" required="required" />
    <input name="pass" id="ten" type="password" placeholder="Mật khẩu" required="required" />
    <input name="nhaplai" id="ten"  type="password" placeholder="Nhập lại mật khẩu" required="required" />
    <input name="ma_captcha" id="ma_captcha"  type="text" />
    <div class="cpt"><img src="macaptcha.php" id="ma" alt="captcha" /></div>
    <input name="gui" id="gui" type="submit" value="Đăng kí" />
  </form>
  
</div>