<?php
session_start();

if(isset($_POST['gui'])){
	if($_POST['captcha']==$_SESSION['ma']){
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

<form action="" method="post">
<input name="ma_captcha" id="captcha"  type="text" />
    <img src="macaptcha.php" id="ma" alt="captcha" />
    <input name="gui" id="gui" type="submit" value="Đăng kí" />
  </form>