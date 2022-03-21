<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tuấn Linh Mobile</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<?php
session_start(); 
include_once("KETNOI/ketnoi.php");
include_once("cactrangkhac/phanthanhtoan/addcart.php");

?>

<body>
<div class="like">
  <?php include("like/like.php"); ?>
</div>
<div id="main"> 
  <!----phần banner-----> 
  <img src="menu/11112.jpg" width="1000" height="210" />
  <div id="banner"></div>
  <!----phần menu----->
  <div id="menu">
    <?php include("menu/menu.php"); ?>
  </div>
  
  <!----phần center----->
  <div id="main_center">
    
    <!----phần left_center----->
    <div id="left" style="margin-top: -20px">
      <?php include("left/left.php"); ?>
    </div>
    
    <!----phần nội dung chính----->
    <div id="main_right"> 
      
      <!----phần nội dung----->
      <div id="center" style="margin-top: -10px">
<!--          ---------slide---------->
          <!DOCTYPE html>
          <html lang="en">
          <head>
              <title>Bootstrap Example</title>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
              <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
              <style>
                  .carousel-inner > .item > img,
                  .carousel-inner > .item > a > img {
                      width: 70%;
                      margin: auto;
                  }

              </style>
          </head>
          <body>

          <div class="container">
              <br>
              <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-left: -10px">
                  <!-- Indicators -->
                  <ol class="carousel-indicators" style="left: 27%; bottom: 0px">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                      <li data-target="#myCarousel" data-slide-to="3"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox" style="width: 600px">
                      <div class="item active">
                          <img src="//cdn2.tgdd.vn/qcao/27_04_2016_09_48_49_TGDD-Apple-800-300.jpg" style="height: 230px">
                      </div>

                      <div class="item">
                          <img src="//cdn1.tgdd.vn/qcao/23_05_2016_10_00_09_TGDD-HTC-10-800-300.jpg" style="height: 230px">
                      </div>

                      <div class="item">
                          <img src="//cdn2.tgdd.vn/qcao/20_05_2016_17_06_01_TGDD-Sony-Xperia-800-300-6.jpg" style="height: 230px">
                      </div>

                      <div class="item">
                          <img src="//cdn4.tgdd.vn/qcao/21_05_2016_00_35_03_TGDd-Ipad-800-300.jpg" style="height: 230px">
                      </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="width: 8%">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="width: 8%; margin-right: 557px">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                  </a>
              </div>
          </div>

          </body>
          </html>

          <!--          ----------slide--------->
        <?php 
             
             if($view = isset($_REQUEST["view"]) ? $_REQUEST["view"]: "" )
                switch($view){
				case "tintuc":
					include("center/tintuc.php");
					break;
            			case "lienhe":
					include("cactrangkhac/lienhe.php");
					break;
				case "khuyenmai":
					include("center/khuyen mai.php");
					break;
				case "chitiet":
					include("cactrangkhac/chitiet/chitiet.php");
					break;
				case "dangki":
					include_once("cactrangkhac/dangki.php");
                    			break;
                case "TIMKIEM":		
                        
                    if(isset($_POST["tim"]))
                        include_once("menu/kq_tim.php");
                    if(isset($_POST["btntim"]))
                            include_once("right/kq_timnangcao.php");
                    break;
				case "giohang":
					      include_once("cactrangkhac/phanthanhtoan/buoc1.php");
                    break;
				default:
             	include_once("center/noidung.php");
                    
            }
            else
            include_once("center/noidung.php");	
            
            
         ?>
      </div>
      <!----phần right----->
      <div id="right" style="margin-top: 0px">
        <?php include("right/right.php"); ?>
      </div>
    </div>
  </div>
  <!----phần foodter----->
  <div id="foodter">
    <?php include("cactrangkhac/foodter.php"); ?>
  </div>
</div>
<div class="chat"> 
  <script lang="javascript">
(function() {var _h1= document.getElementsByTagName('title')[0] || false;
var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';
ga.src = "//live.vnpgroup.net/js/web_client_box.php?hash=1f0df002b799f98e77d5ae87cab02b9a&data=eyJzc29faWQiOjI3Mjg4MDUsImhhc2giOiI4OWY1YzYxMmM4M2RiYjZhOWMxODUyYjlkODcwN2MwOCJ9&pname="+product_name;
var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script> 
</div>
</body>
</html>