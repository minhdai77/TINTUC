<script type="text/javascript" src="<?=BASE_DIR?>/script/ckeditor/ckeditor.js"></script>
<div class="left">
   <form action="<?=BASE_DIR?>vi/admin/account_edit/?id=<?php echo $row['idUser']?>" method="post">
      <table width="1024px" border="0">
         <tr>
            <td height="35" colspan="3">
               <div align="center">CHỨC NĂNG SỬA ĐỔI TÀI KHOẢN</div>
            </td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Họ Tên</div>
            </td>
            <td colspan="2"><input type="text" name="HoTen" value="<?php echo $row['HoTen']; ?>"/></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Tên Đăng Nhập</div>
            </td>
            <td colspan="2"><input type="text" name="Username" value="<?php echo $row['Username']; ?>" /></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Mật Khẩu</div>
            </td>
            <td colspan="2"><input type="text" name="Password" value="<?php echo $row['Password']; ?>" /></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Điện Thoại</div>
            </td>
            <td colspan="2"><input type="text" name="Dienthoai" value="<?php echo $row['Dienthoai']; ?>"/></td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Email</div>
            </td>
            <td colspan="2"><input type="text" name="Email" value="<?php echo $row['Email']; ?>"/>
            </td>
         </tr>
         <tr>
            <td width="90" height="31">
               <div align="left">Mức Phân Quyền</div>
            </td>
            <td>
               <select name="idGroup">
                  <option id="1" value="1">1</option>
                  <option id="0" value="0" <?php if($row['idGroup']==0){ ?>
                     selected
                     <?php } ?> >0</option>
               </select>
            </td>
         </tr>
         <tr>
            <td height="35">&nbsp;</td>
            <td width="73">
               <input type="hidden" name="action" value="update"/>
               <input name="btnedit" type="submit" id="btnedit" value="Cập Nhật Tài Khoản"/>
            </td>
         </tr>
      </table>
   </form>
</div>