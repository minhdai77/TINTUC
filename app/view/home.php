<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<?=BASE_URL?>">
<link href="<?=BASE_DIR?>css/c1.css" rel="stylesheet" type="text/css" />
<link href="<?=BASE_DIR?>css/menu.css" rel="stylesheet" type="text/css" />
<script src="<?=BASE_DIR?>css/jquery.js"></script>
<title>Tin tức online</title>



</head>
<body>
<div id="container">
  <div id="header"> <img src="<?=BASE_DIR?>/img/template/banner1.jpg" width="990" height="180">
    <div id="sitetitle"><a id="abc" href="<?=BASE_DIR?>">{SiteTitle}</a></div>
  </div>
  
  <div id="lang"> <!--website đa ngôn ngữ - cờ của đổi ngôn ngữ-->
    <a href="<?=BASE_URL?>vi/"> <img src="<?=BASE_DIR?>/img/template/vi.png" align=left></a>            
    <a href="<?=BASE_URL?>en/"> <img src="<?=BASE_DIR?>/img/template/en.jpg" align=left></a>
    </div>

  <div id="menungang"> <?php require_once("view/menu.php"); ?> </div>
  <?php if ($this->current_action=="index") {?>
  <div id="content1"> <?php include "view/bainoibat.php"; ?></div>
  <div id="info"> </div>
  <div id="content2"><?php include "view/baixemnhieu.php"?> </div>
  <?php }?>
  <div id="content3">
      <div id="userinfo">
	  <?php //var_dump($_SESSION);die();
	  if (!isset($_SESSION['authed_user']))
	   include "view/login_form.php";
      else 
	  include "view/login_chao.php";
	  ?>
</div>

  </div>
  <div id="quangcao"><a href="#"> <img src="<?=BASE_DIR?>/img/template/qc1.jpg" width="400" height="90" align=left> </a> <a href="#"> <img src="<?=BASE_DIR?>/img/template/qc4.gif" width="385" height="90" align=left> </a> </div>
  <div id="content4">
  <?php 
	   if ($this->current_action=="detail") include "view/detail.php";
	   elseif ($this->current_action=="cat") include "view/baitrongloai.php";
	   else include "view/baimoi.php";
	?>
  </div>
  
  
   <div id="templatemo_footer_panel">
        <div id="footer_left">
            <img src="<?=BASE_DIR?>/css/images/mastercard.gif" alt="Master Card" /><img src="<?=BASE_DIR?>/css/images/visa.gif" alt="Visa Card" /><img src="<?=BASE_DIR?>/css/images/paypal.gif" alt="PayPal" /><img src="<?=BASE_DIR?>/css/images/verisignsecured.gif" alt="Verisign Secured" />
        </div>
        <div id="footer_right">
            Copyright © 2016 <a href="http://www.phuongnamdigital.com">PHƯƠNG NAM DIGITAL</a> | Designed by <a href="#" target="_blank">Minh Đại</a>
        </div>
        
        <div class="cleaner">&nbsp;</div>
    </div>
  
  
</div>
<!--container-->
</body>
</html>