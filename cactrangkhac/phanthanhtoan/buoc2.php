<html>
<link rel="stylesheet" href="bootrap">
</html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
* {
	margin: 0;
	padding: 0;
}
.buoc2 {
	width: 596px;
	height: auto;
	margin: 10px auto;
}
.buoc2 h3 {
	width: 100%;
	float:left;
	height: 30px;
	line-height: 30px;
	background: #a80000;
	border-radius: 5px;
	text-align: center;
	color: #fff;
}




.donhang{
	width:345px;
	height:500px;
	float:right;
	margin-top:10px;
	border:1px solid #eeeeee;}
.donhang h4{
	width:100%;
	height:30px;
	text-align:center;
	background:#CCC;
	line-height:30px;
	font-family:"Times New Roman", Times, serif;
	font-size:14px;
	
	}
#tble{
	width:340px;
	height:auto;
	margin:10px auto;
	border:1px dotted #eeeeee;
	text-align:center;}
#tble span{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;}
	
#tble td{
	height:30px;}
	
.giaohang {
	width: 650px;
	height: 550px;
	margin: 10px 0 0 0;
	border: 1px solid #eeeeee;
	float:left;
}	
.formemail {
	width: 600px;
	height: 500px;
	margin: 20px auto;
	line-height: 30px;
}
#txthoten {
	width: 300px;
	height: 30px;
	border-radius: 2px;
	padding-left: 10px;
	margin-left: 130px;
	float:left;
}
#txtemail{
	width: 300px;
	height: 30px;
	border-radius: 2px;
	padding-left: 10px;
	margin-left: 130px;
	clear:both;
	margin-top:10px;
}
#btntiep {
	width: 300px;
	height: 40px;
	background: #1E90FF;
	clear: both;
	margin-left: 130px;
	margin-top: 20px;
	color: #fff;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	font-weight: bold;
}
#btntiep:hover {
	background: #a800000;
}
.giaohang p{
	padding-left:125px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	}
#txtdiachi{
	width: 300px;
	border-radius: 2px;
	padding-left: 10px;
	margin-left: 130px;
	clear:both;
	margin-top:10px;}
#txtyeucau{
	width: 300px;
	border-radius: 2px;
	padding-left: 10px;
	margin-left: 130px;
	clear:both;
	margin-top:10px;}
#txtsdt{
	width: 300px;
	border-radius: 2px;
	padding-left: 10px;
	margin-left: 130px;
	clear:both;
	margin-top:10px;}
</style>


<div class="buoc2">
	<h3>Giao hàng và thanh toán</h3>
	<div class="giaohang">
    
    <form action="?view=giohang&action=thanhtoan" method="post" class="formemail" name="frmMuahang">
    
    	<input name="txthoten" id="txthoten" type="text" placeholder="Họ và tên" required/>
        <input name="txtemail" id="txtemail" type="email" placeholder="email@mail.com" required/>
        <input name="txtsdt" id="txtsdt" type="tell" placeholder="Số điện thoại của bạn" required/>
        <textarea name="txtdiachi" cols="5" rows="5" required="required" id="txtdiachi" placeholder="Địa chỉ"></textarea>
        <textarea name="txtyeucau" rows="5" id="txtyeucau" placeholder="yêu cầu của bạn"></textarea><br>
		<input type="radio" name="gh" value="giaohang" style="margin-left: 129px"> Giao tận nơi
		<input type="radio" name="gh" value="nhanhang" style="margin-left: 73px"> Nhận ở cửa hàng
		<input id="btntiep" name="btnGuidonhang" type="submit" value="Đặt hàng" />
    </form>
    
    </div>
	
</div>
