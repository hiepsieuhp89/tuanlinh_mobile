<?php
//session_start();
//include_once("XLGioHang.php");

//Lấy dữ liệu giỏ hàng trong Session lưu ra biến cục bộ
$giohang = $_SESSION["giohang"];
$n = $_SESSION["n"];
?>
<style type="text/css">

    <!--

    .CartTable {
        margin-top:2px;
        width: 596px;

        margin:auto;
    }
    .CartTable .caption {
        background:#a80000;
        font-size: 18px;
        font-weight: bold;
        color: #FFF;
        text-align: center;
        padding: 5px;
    }
    a{
        text-decoration:none;
    }
    -->
</style>
<div class="CartTable">
    <div class="caption">GIỎ HÀNG CỦA BẠN CÓ <?= $n; ?> SẢN PHẨM</div>
    <br/>
    <form name="frmGiohang" method="post" action="">
        <table width="590" border="1" cellpadding="0" cellspacing="0">

            <!--DWLayoutTable-->
            <tr>
                <th width="28" height="23" valign="center">STT</th>
                <th width="184" valign="center">Tên hàng </th>
                <th  colspan="2">Số lượng</th>
                <th  width="92">Đơn giá</th>
                <th  width="72">khuyến mại</th>
                <th  width="102">thành tiền</th>
                <td width="22" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
            <?php $tongcong = 0; ?>
            <?php for($i=0; $i < $n ; $i++) { ?>
                <tr>
                    <td height="26" valign="top"><?= $i+1; ?></td>
                    <td valign="top"><?= $giohang[$i][1]; ?></td>
                    <td colspan="2" align="center" valign="middle"><input name="txtsl<?=$i;?>" type="text"  style="width:30px" value="<?= $giohang[$i][2]; ?>" maxlength="2" /></td>
                    <td align="right"><?= number_format($giohang[$i][3]); ?></td>
                    <td align="right"><?= $giohang[$i][4]?>%</td>
                    <td align="right"><?= number_format($giohang[$i][2]*$giohang[$i][3]-($giohang[$i][3]*$giohang[$i][4]/100)); ?></td>
                    <td valign="center"><a href="?view=giohang&action=xoa&masp=<?= $giohang[$i][0]; ?>" >xóa</a></td>
                </tr>
                <?php $tongcong += $giohang[$i][2]*($giohang[$i][2]*$giohang[$i][3]-($giohang[$i][3]*$giohang[$i][4]/100)); ?>
            <?php } ?>
            <tr>
                <td height="23" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td colspan="5" valign="top">Tổng cộng :
                    <?= number_format($tongcong);?>
                    VND </td>
            </tr>
            <tr>
                <td height="23" colspan="8" align="center" valign="top"><a href="#" onclick="frmGiohang_Capnhat_onSubmit('capnhatsoluong')">Cập nhật giỏ hàng</a> |<a href="#" onclick="thanhtoan_onclick()" >Tiếp tục</a></td>
            </tr>
        </table></th>
        </tr>
        </table>
    </form>
    <h1>
        <?= $thongbao; ?>
    </h1>
    <?php
    //ĐOạn mã thực thi khi action=thanhtoan. Đoạn mã thực hiện kiểm tra xem người dùng đã đăng nhập chưa? Nếu chưa đưa ra thông báo chỉ dẫn, ngược lại hiển thị màn hình để điền các thông tin giao hàng
    //Dựa vào Session được lưu lúc đăng nhập để biết người dùng đã đăng nhập hay chưa
    if(isset($_REQUEST["action"]) and $_REQUEST["action"]=="thanhtoan") {
        if(! isset($_SESSION["hoten"]))
            echo "<p>Bạn cần thực hiện đăng nhập để có thể thanh toán, hoặc <a href='?view=dangki'>bấm vào đây để đăng ký thành viên</a> nếu chưa có tài khoản</p>";
        else
            include_once("buoc2.php");
    }
    ?>


    <script language="JavaScript" type="text/javascript">
        function frmGiohang_onSubmit(Masp,hanhdong)
        {
            frmGiohang.masp.value=Masp
            frmGiohang.action = "?view=giohang&action=xoa&ms="+Masp
            frmGiohang.submit()
        }
        function frmGiohang_Capnhat_onSubmit(hanhdong)
        {
            frmGiohang.action="?view=giohang&action=capnhatsoluong"
            frmGiohang.submit()
        }
        function thanhtoan_onclick()
        {
            frmGiohang.action="?view=giohang&action=thanhtoan"
            frmGiohang.submit()
        }
    </script>
</div>
