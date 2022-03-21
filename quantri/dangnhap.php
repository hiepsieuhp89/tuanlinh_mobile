<?php 


session_start();
include("../KETNOI/ketnoi.php");
 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | Profi Admin</title>
<link href="css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/text.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/sua.css" rel="stylesheet" type="text/css" media="all" />
</head>
<?php 
$thongbao = "";
if(isset($_POST["action"]) && $_POST["action"]=="dangnhap"){
	$tendn = $_POST["tendn"];
	$matkhau = $_POST["pass"];
	
	$sql = "SELECT maadmin, tendangnhap, hoten, matkhau, dienthoai, email FROM admin 
WHERE tendangnhap = ?
AND matkhau =  ?";

$bang_admin = $pdo->prepare($sql);
		
		$mang_tham_so = array($tendn,$matkhau);
		$bang_admin->execute($mang_tham_so);
		
		$admin = $bang_admin->fetch(PDO::FETCH_OBJ);
if($admin){
	
	$_SESSION["hotenad"]=$admin->hoten;
	$_SESSION["maadmin"]=$admin->maadmin;
	}
else{
	$thongbao = "Tên đăng nhập hoặc mật khẩu sai.";
	}
	}
if(isset($_POST["action"]) && $_POST["action"]=="dangxuat")
	{
		unset($_SESSION["hotenad"]);
		unset($_SESSION["makh"]);
	}
?>


<body>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
    <h1>Đăng nhập tài khoản admin</h1>
    
    <div id="login">
      <form id="form1" name="dangnhap" method="post" action="">
     <input name="action" id="action" type="hidden" value="" />
		<?php if ( ! isset($_SESSION["hotenad"]))  { ?>

        <p>
          <label><strong>Tên đăng nhập</strong>
            <input type="text" name="tendn" class="inputText" id="textfield" />
          </label>
        </p>
        <p>
          <label><strong>Mật khẩu</strong>
            <input type="password" name="pass" class="inputText" id="textfield2" />
          </label>
        </p>
        
        
        <a class="black_button" href="#" onClick=" btnDangnhap_onclick()"><span>Đăng nhập</span></a>
        <label>
          <input type="checkbox" name="checkbox" id="checkbox" />
          Lưu tài khoản</label>
          <span class="thongbao" style="color:red; padding:50px;"><?php echo $thongbao; ?></span>
          <?php } else {?>
				<?php header("location:index.php");?>
			<?php }?>
      </form>
      <br clear="all" />
    </div>
    <div id="forgot"> <a href="#" class="forgotlink"><span>Quên tên đăng nhập hoặc mật khẩu</span></a></div>
  </div>
</div>
<br clear="all" />
</body>
</html>
<script>
	function btnDangnhap_onclick()
	{
		document.getElementById('action').value="dangnhap"
		document.getElementById('form1').submit();
	}
	
	function btnDangxuat_onclick()
	{
		document.getElementById('action').value="dangxuat"
		document.getElementById('form1').submit();
	}
</script>