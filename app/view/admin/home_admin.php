<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link href="<?=BASE_DIR?>css/c1.css" rel="stylesheet" type="text/css" />
      <link href="<?=BASE_DIR?>css/style_admin.css" rel="stylesheet" type="text/css" />
      <script src="<?=BASE_DIR?>css/jquery.js"></script>
      <title>Admin Page</title>
   </head>
   <body>
      <div id="banner" style="text-align:center;  padding-top:20px;">
      <span style=" font-size:24px;font-weight:bold;color:#FFF;font-family:Arial, Helvetica, sans-serif;">
      TRANG QUẢN TRỊ NỘI DUNG </span></br>
      <div style=" margin-left:500px;width: 350px; text-align: center;">
         <span style="font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#FFE28C; width:100px;">( PHƯƠNG NAM DIGITAL.)</span>
      </div>
      <div id="menu">
         <a href="<?=BASE_DIR?>vi/admin/account_list">
            <div class="box">
               <img src="<?=BASE_DIR?>img/user.png"></br>
               <span>Quản Lý Tài Khoản</span>
            </div>
         </a>
         <a href="<?=BASE_DIR?>vi/admin/loaibaiviet_list">
            <div class="box">
               <img src="<?=BASE_DIR?>img/loaitin.png"></br>
               <span>Quản Lý Loại Tin</span>
            </div>
         </a>
         <a href="<?=BASE_DIR?>vi/admin/baiviet_list">
            <div class="box">
               <img src="<?=BASE_DIR?>img/baiviet.jpg"></br>
               <span>Quản Lý Bài Viết </span>
            </div>
         </a>
         <a href="<?=BASE_DIR?>">
            <div class="box">
               <img src="<?=BASE_DIR?>img/exit_1.png"></br>
               <span>Thoát</span>
            </div>
         </a>
      </div>
      <div id="content">
         <?php
            if(isset($note))
            {
            	echo $note;
            	}
            if($this->current_action=="baiviet_list")
            include "view/admin/article/article_list.php";
             elseif($this->current_action=="baiviet_them")
             include"view/admin/article/article_add.php";
             elseif($this->current_action=="baiviet_sua")
             include"view/admin/article/article_edit.php";
             elseif($this->current_action=="loaibaiviet_list")
             include"view/admin/catagory/catagory_list.php";
             elseif($this->current_action=="loaibaiviet_them")
             include"view/admin/catagory/catagory_add.php";
             elseif($this->current_action=="loaibaiviet_sua")
             include"view/admin/catagory/catagory_edit.php";
              elseif($this->current_action=="account_list")
             include"view/admin/account/account_list.php";
               elseif($this->current_action=="account_edit")
             include"view/admin/account/account_edit.php";
               elseif($this->current_action=="account_add")
             include"view/admin/account/account_add.php";
            ?>
      </div>
      <div id="xoa"></div>
      <div id="footer" style="text-align:center; padding-top:20px;">
         <span style="font-size:18px; font-family:Arial, Helvetica, sans-serif; color:#CCC; font-weight:bold;">PHƯƠNG NAM DIGITAL</span>
      </div>
   </body>
</html>